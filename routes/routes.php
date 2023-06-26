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

    $router->mount("/table/personal_ref", function() use($router) {
        $router->get("/", "App\controllers\controller_personal_ref@getDataAll"); 
        $router->post("/post", "App\controllers\controller_personal_ref@postData");
        $router->put('/put', "App\controllers\controller_personal_ref@putData"); 
        $router->delete("/delete", "App\controllers\controller_personal_ref@deleteData");
    }); 

    $router->mount("/table/team_educators", function() use($router) {
        $router->get("/", "App\controllers\controller_team_educators@getDataAll"); 
        $router->post("/post", "App\controllers\controller_team_educators@postData"); 
        $router->put("/put", "App\controllers\controller_team_educators@putData"); 
        $router->delete("/delete", "App\controllers\controller_team_educators@deleteData"); 
    }); 

    $router->mount("/table/areas", function() use($router){
        $router->get("/", "App\controllers\controller_areas@getDataAll"); 
        $router->post("/post", "App\controllers\controller_areas@postData"); 
        $router->put("/put", "App\controllers\controller_areas@putData"); 
        $router->delete("/delete", "App\controllers\controller_areas@deleteData"); 
    }); 

    $router->mount("/table/position", function() use($router) {
        $router->get("/", "App\controllers\controller_position@getDataAll"); 
        $router->post("/post", "App\controllers\controller_position@postData"); 
        $router->put("/put", "App\controllers\controller_position@putData"); 
        $router->delete("/delete","App\controllers\controller_position@deleteData"); 
    }); 

    $router->mount("/table/journey", function() use($router) {
        $router->get("/", "App\controllers\controller_journey@getDataAll");
        $router->post("/post", "App\controllers\controller_journey@postData"); 
        $router->put("/put", "App\controllers\controller_journey@putData"); 
        $router->delete("/delete", "App\controllers\controller_journey@deleteData"); 
    });

    $router->run(); 
?>