<?php 
    namespace Config;

    class connection {
        protected $host; 
        private $user; 
        private $password; 
        private $dbname; 

        public function __construct() {
            $this->host = $_ENV["HOST"];
            $this->user = $_ENV["USER"];
            $this->password = "";
            $this->dbname = $_ENV["DBNAME"]; 
        }

        public function connect() {
            return $this->user; 
        }
    }

?>