<?php
    namespace App\models; 
    use PDO; 
    use Config\connection; 

    class Work extends connection{    
        public $id; 
        public $full_name; 
        public $cell_number;
        public $position; 
        public $company; 
        protected $message;

        public function __construct() {
            parent::__construct();
            $this->id = $id; 
            $this->full_name = $full_name;
            $this->cell_number = $cell_number;
            $this->position = $position;
            $this->company = $company;            
        }   

        public function getAllDataWorkReference() {
            try {

            }catch (\PDOException $e) {

            }finally {

            }
        }
    }

?>