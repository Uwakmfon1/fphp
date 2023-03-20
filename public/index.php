<?php

const BASE_PATH = __DIR__.'/../';

// require BASE_PATH.'function.php';
require_once './../function.php';






// require base_path("Database.php"); 
// require base_path("Response.php");
// require base_path("router.php");

// $config = require(BASE_PATH."config.php");

// $uri = parse_url($_SERVER['REQUEST_URI'])['path']; 


// $db = new Database($config['database']); 


// if(array_key_exists($uri, $routes)){
//     require $routes[$uri];
// }else{
//  abort("./views/404");  
// }

spl_autoload_register(function($class){
    require base_path("Core/" .$class . '.php');
});

require base_path('router.php');

