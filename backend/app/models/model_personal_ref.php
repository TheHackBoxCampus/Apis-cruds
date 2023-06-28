<?php
    namespace App\models; 
    use Config\connection; 
    use PDO; 

    class model_personal_ref {
        protected $message; 

        public function __construct(public $id = 1, public $full_name = "Miller", public $cel_number = "123459", public $relationship = "example", public $occupation = "developer") {
            $this->id = $id;
            $this->full_name = $full_name;
            $this->cel_number = $cel_number;
            $this->relationship = $relationship;
            $this->occupation = $occupation;
        }
        
        // get data from table personal_ref 
        
        public function getDataPersonalRef() {
            try {
                $db = new connection; 
                $query = 'SELECT * FROM personal_ref'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute(); 
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC); 
                $db->disconnect(); 
                if(empty($res)) {
                    echo "No hay registros"; 
                }
                return ["data" => $res]; 
            }catch (\PDOException $e) {
                echo $e->getMessage(); 
            }
        }

        //post data from table personal_ref 

        public function postDataPersonalRef() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO personal_ref (id, full_name, cel_number, relationship, occupation) 
                VALUES (?, ?, ?, ?, ?)';
                $stamento = $db->connect()->prepare($query);
                $stamento->execute([
                    $this->id, 
                    $this->full_name,
                    $this->cel_number,
                    $this->relationship,
                    $this->occupation
                ]); 
                $this->message = ['status' => 200+$stamento->rowCount(), "message" => "Data Saved"]; 
                print_r($this->message);
                $db->disconnect();  
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from table personal_ref

        public function putDataPersonalRef() {
            try {
                $db = new connection; 
                $query = 'UPDATE personal_ref SET full_name = ?, cel_number = ?, relationship = ?, occupation = ? WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query);
                $stamento->execute([
                    $this->full_name,
                    $this->cel_number,
                    $this->relationship,
                    $this->occupation,
                    $this->id
                ]); 
                $this->message = ['status' => 200, 'Message' => 'Data updated']; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        //delete data from table personal_ref

        public function deleteDataPersonalRef() {
            try {
                $db = new connection; 
                $query = 'DELETE FROM personal_ref WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]); 
                $this->message = ['status' => 200, 'message' => "Data deleted"];
                print_r($this->message); 
                $db->disconnect();  
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }

?>