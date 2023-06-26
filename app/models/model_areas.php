<?php
    namespace App\models; 
    use Config\connection; 
    use PDO; 

    class model_areas {
        protected $message;     
        public function __construct(public $id = 1, public $name_area = "Metrapolitana") {
            $this->id = $id;
            $this->name_area = $name_area; 
        }

        // get data from table areas
        public function getDataAreas() {
            try {
                $db = new connection; 
                $query = 'SELECT * FROM areas'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute(); 
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC); 
                if(empty($res)) {
                    echo "No hay registros"; 
                }
                $db->disconnect(); 
                return ["message" => $res]; 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from table areas 
        public function postDataAreas() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO areas (id, name_area) VALUES (?, ?)'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id,
                    $this->name_area
                ]);
                $this->message = ["status" => 200+$stamento->rowCount(), "message" => "Data Saved"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from table areas
        public function putDataAreas() {
            try {
                $db = new connection; 
                $query = 'UPDATE areas SET name_area = ? WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->name_area,
                    $this->id
                ]);
                $this->message = ["status" => 200, "message" => "Data updated"];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // delete data from areas
        public function deleteDataAreas() {
            try {
                $db = new connection;
                $query = 'DELETE FROM areas WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]); 
                $this->message = ["status" => 200, "message" => "Data Deleted"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }
?>