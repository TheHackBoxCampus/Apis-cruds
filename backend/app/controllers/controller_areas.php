<?php 
    namespace App\controllers; 
    use App\models\model_areas;
    use PDOException;

    class controller_areas {
        // get data from areas 
        public function getDataAll() {
            try {
                $Mdl = new model_areas; 
                print_r($Mdl->getDataAreas()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from areas
        public function postData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_areas($data['data']['id'], $data['data']['name_area']); 
                print_r($Mdl->postDataAreas()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from areas 
        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_areas($data['data']['id'], $data['data']['name_area']); 
                print_r($Mdl->putDataAreas()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // delete data from areas
        public function deleteData() {
            try{
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_areas($data['data']['id']); 
                print_r($Mdl->deleteDataAreas()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

    }
?>