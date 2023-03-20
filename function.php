<?php

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}



function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($value=404){
    http_response_code(404);
    require "./views/{$value}.php";
    die();
}


function aborting(){
    require "./views/404.php";
    die();
}


function authorize($condition, $status=Response::FORBIDDEN ){
    
    if(! $condition){
        abort($status);
    }

}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/'. $path);
}

