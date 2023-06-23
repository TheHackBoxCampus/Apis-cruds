<?php
    namespace App\models; 
    use Config\connection; 
    use PDO;

    class model_work_reference{     
        protected $message;

        public function __construct(public $id = 1,public $full_name = "Javier",  public $cell_number = 33223,  public $position = "admin", public $company = "seguros") {
            $this->id = $id; 
            $this->full_name = $full_name;
            $this->cell_number = $cell_number;
            $this->position = $position;
            $this->company = $company;            
        }   

        // get data from table Work_Reference 

        public function getAllDataWorkReference() {
            try {
                $db = new connection; 
                $query = 'SELECT * FROM work_reference'; 
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

        // post data from table Work_Reference 

        public function postDataWorkReference() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO work_reference (id, full_name, cel_number, position, company) VALUES (?, ?, ?, ?, ?);';
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id,
                    $this->full_name,
                    $this->cell_number,
                    $this->position, 
                    $this->company
                ]); 
                $this->message = ["status" => 200+$stamento->rowCount(), "Message", "Data saved"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch(\PDOException $e) {
                echo $e->getMessage(); 
            }
        }
        
        // update register from table Work_Reference
        
        public function putDataWorkReference() {
            try {
                $db = new connection; 
                $query = 'UPDATE work_reference SET full_name = ?, cel_number = ?, position = ?, company = ? WHERE id = ?';
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->full_name,
                    $this->cell_number,
                    $this->position, 
                    $this->company,
                    $this->id
                ]); 
                $this->message = ["status" => 200, "Message", "Data updated"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $e) {
                echo $e->getMessage(); 
            }
        }   

        // delete register from table Work_Reference
        public function deleteDataWorkReference() {
            try {
                $db = new connection; 
                $query = 'DELETE FROM work_reference WHERE id = ?';
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]); 
                $this->message = ["status" => 200, "Message", "Data deleted"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $e) {
                echo $e->getMessage(); 
            } 
        }
    }



  
?>