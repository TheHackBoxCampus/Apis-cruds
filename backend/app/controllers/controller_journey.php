<?php
    namespace App\controllers;
    use App\models\model_journey; 
    use PDOException; 

    class controller_journey {
        //get data from journey 
        public function getDataAll() {
            try {
                $Mdl = new model_journey;
                print_r($Mdl->getDataJourney()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from journey 
        public function postData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_journey($data['id'], $data['name_journey'], $data['check_in'], $data['check_out']);
                $Mdl->postDataJourney(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from journey 
        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_journey($data['id'], $data['name_journey'], $data['check_in'], $data['check_out']);
                $Mdl->putDataJourney(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // delete data from journey 
        public function deleteData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_journey($data['id']); 
                $Mdl->deleteDataJourney(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }

?>