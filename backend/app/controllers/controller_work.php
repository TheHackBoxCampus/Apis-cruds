<?php 
    namespace App\controllers; 
    use App\models\model_work_reference;
    use PDOException;

    class controller_work {
        // getData from table work_reference
        public function getDataAll() {
            try {
                $Mdl = new model_work_reference; 
                print_r($Mdl->getAllDataWorkReference()); 
                
            }catch(\PDOException $e) {
                echo $e->getMessage(); 
            }
        }

        // post from table work_reference 

        public function postData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_work_reference($data['id'], $data['full_name'], $data['cell_number'], $data['position'], $data['company']); 
                print_r($Mdl->postDataWorkReference()); 
                
            }catch(\PDOException $e) {
                echo $e->getMessage(); 
            }
        }

        // update data from table work_reference 

        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_work_reference($data['id'], $data['full_name'], $data['cell_number'], $data['position'], $data['company']); 
                print_r($Mdl->putDataWorkReference()); 
            }catch(\PDOException $e) {
                echo $e->getMessage(); 
            }
        }
        
        
        // delete data from table work_reference

        public function deleteData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_work_reference($data['id']); 
                print_r($Mdl->deleteDataWorkReference()); 
            }catch(\PDOException $e) {
                echo $e->getMessage(); 
            }
        }
    }

?>