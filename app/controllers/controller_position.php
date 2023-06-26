<?php
    namespace App\controllers;
    use App\models\model_position;
    use PDOException; 

    class controller_position {
        // get data from table position 
        public function getDataAll() {
            try {
                $Mdl = new model_position;
                print_r($Mdl->getDataPosition()); 
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from table position 
        public function postData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_position($data['id'], $data['name_position'], $data['arl']);
                $Mdl->postDataPosition(); 
            }catch (\PDOException $err) {
                $err->getMessage();
            }
        }

        // put data from table position
        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_position($data['id'], $data['name_position'], $data['arl']);
                $Mdl->putDataPosition();
            }catch (\PDOException $err){
                echo $err->getMessage(); 
            }
        }

        public function deleteData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true);
                $Mdl = new model_position($data['id']);
                $Mdl->deleteDataPosition(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }
?>