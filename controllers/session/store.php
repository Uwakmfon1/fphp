<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db =App::resolve(Database::class);

$email=$_POST['email'];
$password = $_POST['password'];
$errors=[];

if(!Validator::email($email)){
    $errors['email']='please provide a valid email adddress.';
}

if(!Validator::string($password)){
    $errors['password'] = 'please provide a valid password.';
}

if(! empty($errors)){
    return view('session/create.view.php',[
        'errors'=>$errors
    ]);
}

$user=$db->query('select * from user where email=:email',[
    'email'=>$email
])->find();

if($user){
    if(password_verify($password,$user['password'])){
        login([
            'email'=>$email
        ]);

        header('location: /');
        exit();
    }
}

return view('session/create.view.php',[
    'errors'=>[
        'email'=>'No matching account found for that email address and password.'
    ]
]);