<?php
    namespace App\models;
    use Config\connection; 
    use PDO; 

    class model_levels {
        protected $message;
        
        public function __construct(public $id = 1, public $name_level = "level 2", public $group_level = "Levels") {
            $this->name_level = $name_level;
            $this->id = $id;
            $this->group_level = $group_level;  
        }

        // get data from table levels
        public function getDataLevels() {
            try {
                $db = new connection;
                $query = 'SELECT * FROM levels'; 
                $stamento = $db->connect()->prepare($query);
                $stamento->execute(); 
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC);
                if(empty($res)) {
                    echo "No hay registros \n\n";
                }
                $db->disconnect(); 
                return ['message' => $res]; 
            }catch (\PDOException $err) {
                echo $err->getMessage();
            }
        }

        //post data from table levels 
        public function postDataLevels() {
            try {
                $db = new connection; 
                $query = 'INSERT INTO levels (id, name_level, group_level) 
                VALUES (?, ?, ?)';
                $stamento = $db->connect()->prepare($query);
                $stamento->execute([
                    $this->id, 
                    $this->name_level,
                    $this->group_level
                ]);
                $this->message = ['status' => 200+$stamento->rowCount(), 'message' => 'Data saved'];
                print_r($this->message);
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // put data from table levels
        public function putDataLevels() {
            try {
                $db = new connection;
                $query = 'UPDATE levels SET name_level = ?, group_level WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->name_level,
                    $this->group_level,
                    $this->id
                ]);
                $this->message = ['status' => 200, 'message' => 'Data updated'];
                print_r($this->message); 
                $db->disconnect(); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }

        // delete data from table levels
        public function deleteDataLevels() {
            try{
                $db = new connection; 
                $query = 'DELETE FROM levels WHERE id = ?'; 
                $stamento = $db->connect()->prepare($query); 
                $stamento->execute([
                    $this->id
                ]);
                
            }catch (\PDOException $err){
                echo $err->getMessage(); 
            }
        }
    }

?>