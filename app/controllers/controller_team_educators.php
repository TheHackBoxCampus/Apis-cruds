<?php 
    namespace App\controllers; 
    use App\models\model_team_educators; 
    use PDOException; 

    class controller_team_educators {
        // get data from team_educators 
        public function getDataAll() {
            try {
                $Mdl = new model_team_educators; 
                print_r($Mdl->getDataTeamEducators());
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from team_Educators 
        public function postData() {
            try {   
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_team_educators($data['id'], $data['name_rol']); 
                $Mdl->postDataTeamEducators(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from team_educators 
        public function putData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_team_educators($data['id'], $data['name_rol']);
                $Mdl->putDataTeamEducators(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // deleted data from team_educators 
        public function deleteData() {
            try {
                $data = json_decode(file_get_contents("php://input"), true); 
                $Mdl = new model_team_educators($data['id']);
                $Mdl->deleteDataTeamEducators(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }

?>