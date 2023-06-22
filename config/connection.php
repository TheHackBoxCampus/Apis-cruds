<?php 
    namespace Config;
    \Home\loadVars();
    use PDO;
    use PDOException; 

    class connection {
        protected $host;
        private $user;
        private $password;
        protected $dbname;
        protected $pdoc; 
        
        public function __construct() {
            $this->host = $_ENV["HOST"];
            $this->user = $_ENV["DB_USER"];
            $this->password = $_ENV["PASSWORD"];
            $this->dbname = $_ENV["DBNAME"];
        }

        public function connect() {
            try {
                $this->pdoc = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password); 
                $this->pdoc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(\PDOException $er) {
                echo $er->getMessage(); 
            }
        }

        public function disconnect() {
            $this->pdoc = null; 
            return $this->pdoc; 
        } 
    }

?>