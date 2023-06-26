<?php 
    namespace App\models;
    use Config\connection; 
    use PDO; 

    class model_position {
        protected $message; 

        public function __construct(public $id = 1, public $name_position = "admin", public $arl = "Compañia de seguros Santander") {
            $this->id = $id; 
            $this->name_position = $name_position; 
            $this->arl = $arl; 
        }

        // get data from table position 
        public function getDataPosition() {
            try{
                $db = new connection; 
                $query = 'SELECT * FROM position'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute(); 
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC); 
                if(empty($res)){
                    echo "No hay registros \n"; 
                }
                $db->disconnect(); 
                return ["message" => $res]; 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        //post data from table position 
        public function postDataPosition() {
            try {
                $db = new connection;
                $query = 'INSERT INTO position (id, name_position, arl) VALUES (?, ?, ?)';
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id,
                    $this->name_position,
                    $this->arl
                ]); 
                $this->message = ["status" => 200+$stamento->rowCount(), "message" => "Data saved"];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage();
            }
        }

        // put data from table position
        public function putDataPosition() {
            try {
                $db = new connection; 
                $query = 'UPDATE position SET name_position = ?, arl = ? WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query);
                $stamento->execute([
                    $this->name_position,
                    $this->arl, 
                    $this->id
                ]); 
                $this->message = ["status" => 200, "Message" => "Data updated"];
                print_r($this->message);
                $db->disconnect(); 
            } catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        //delete data from table position 
        public function deleteDataPosition() {
            try {
                $db = new connection; 
                $query = 'DELETE FROM position WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]);
                $this->message = ['status' => 200, 'message' => "Data deleted"];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }
    
?>