<?php 
    namespace App\models; 
    use Config\connection; 
    use PDO; 

    class model_journey {
        protected $message; 

        public function __construct(public $id = 1, public $name_journey = "America", public $check_in = 1, public $check_out = 1) {
            $this->id = $id;
            $this->name_journey = $name_journey;
            $this->check_in = $check_in;
            $this->check_out = $check_out; 
        }

        // get data from table journey 
        public function getDataJourney() {
            try {
                $db = new connection; 
                $query = 'SELECT * FROM journey'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute();
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC); 
                if(empty($res)) {
                    echo "No hay registros \n\n"; 
                }
                $db->disconnect(); 
                return ["message" => $res]; 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from table journey 
        public function postDataJourney() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO journey (id, name_journey, check_in, check_out) 
                VALUES (?, ?, ?, ?)';
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id, 
                    $this->name_journey,
                    $this->check_in,
                    $this->check_out
                ]);
                $this->message = ["status" => 200+$stamento->rowCount(), "message" => "Data saved"];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        //put data from table journey 
        public function putDataJourney() {
            try {
                $db = new connection; 
                $query = 'UPDATE journey SET name_journey = ?, check_in = ?, check_out = ? WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->name_journey,
                    $this->check_in,
                    $this->check_out,
                    $this->id
                ]);
                $this->message = ['status' => 200, 'message' => "Data updated"];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }       
        
        // delete data from table journey
        public function deleteDataJourney(){
            try {
                $db = new connection;
                $query = 'DELETE FROM journey WHERE id = ?'; 
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