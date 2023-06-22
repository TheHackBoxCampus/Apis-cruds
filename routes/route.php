<?php 
    namespace Routes; 

    $router = new \Bramus\Router\Router();

    $router->get("work_reference/", function() {
        echo "rute Api"; 
    }); 
  
    $router->run(); 
?>