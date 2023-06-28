<?php 
    namespace App\models; 
    use Config\connection; 
    use PDO; 

    class model_team_educators {
        protected $message; 

        public function __construct(public $id = 1, public $name_rol = "teacher") {
            $this->id = $id; 
            $this->name_rol = $name_rol; 
        }

        // get data from table team_educator 
        public function getDataTeamEducators() {
            try {
                $db = new connection; 
                $query = 'SELECT * FROM team_educators'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute();
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC);  
                if(empty($res)) {
                    echo "No hay registros"; 
                }
                $db->disconnect(); 
                return ["Message" => $res]; 
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // post data from table team_educators 
        public function postDataTeamEducators() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO team_educators (id, name_rol) VALUES (?, ?)'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id,
                    $this->name_rol
                ]);
                $this->message = ["status" => 200+$stamento->rowCount(), "message" => "Data Saved"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PODException $err) {
                echo $err->getMessage() ; 
            }
        }

        // put data from table team_educators 
        public function putDataTeamEducators() {
            try {
                $db = new connection; 
                $query = 'UPDATE team_educators SET name_rol = ? WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->name_rol,
                    $this->id
                ]); 
                $this->message = ["status" => 200, "message" => "Data updated"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMesage(); 
            }
        }

        // deleted data from team_educators 
        public function deleteDataTeamEducators() {
            try { 
                $db = new connection; 
                $query = 'DELETE FROM team_educators WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]); 
                $this->message = ["status" => 200, "message" => "Data deleted"]; 
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    
    }
?>