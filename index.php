<?php
    namespace Home; 
    require_once "./vendor/autoload.php";
    use Config\connection; 
    use Dotenv\Dotenv;

    function loadVars() {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

?>