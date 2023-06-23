<?php
    namespace App\controllers; 
    use App\models\model_personal_ref;
    use PDOException;

    class controller_personal_ref {
        // get data from table personal_ref 
        public function getDataAll(){
            try {
                $Mdl = new model_personal_ref; 
                print_r($Mdl->getDataPersonalRef()); 
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }


        // post data from table personal_ref 
        public function postData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_personal_ref($data['id'], $data['full_name'], $data['cel_number'], $data['relationship'], $data['occupation']);
                $Mdl->postDataPersonalRef();
            }catch(\PDOException $err) {
                echo $err->getMessage();
            }
        }
        
        // put data from table personal_ref 
        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_personal_ref($data['id'], $data['full_name'], $data['cel_number'], $data['relationship'], $data['occupation']);
                $Mdl->putDataPersonalRef(); 
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        //delete data from table personal_ref
        public function deleteData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_personal_ref($data['id']);
                $Mdl->deleteDataPersonalRef(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }

    

?>

