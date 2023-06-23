<?php 
    namespace Routes; 
    $router = new \Bramus\Router\Router();

    $router->mount("/table/work_reference", function() use($router) {
        $router->get("/", "App\controllers\controller_work@getDataAll"); 
        $router->post("/post", "App\controllers\controller_work@postData");
        $router->put("/put", "App\controllers\controller_work@putData"); 
        $router->delete("/delete", "App\controllers\controller_work@deleteData"); 
    });
  
    $router->mount("/table/working_info", function() use($router) {
        $router->get("/", "App\controllers\controller_working_info@getDataAll"); 
    });

    $router->run(); 
?>