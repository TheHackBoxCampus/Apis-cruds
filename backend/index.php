<?php
    namespace Home; 
    require_once "./vendor/autoload.php";
    require_once "./routes/routes.php"; 
    use Dotenv\Dotenv;

    function loadVars() {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

?>