<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$email = $_POST["email"];
$password = $_POST["password"];

// validate the form inputs
$errors=[];

if(!Validator::email($email)){
    $errors['email'] = 'please provide a valid email address';
}


if(!Validator::string($password,7,255)){
    $errors['password'] = 'please provide a password of at least 7 characters';
}


if(! empty($errors)){
    return view('registration/create.view.php',[
        'errors'=>$errors
    ]);
}

// dd($errors);

// check if account already exists
$user =$db->query('select * from user where email = :email',[
    'email'=>$email
])->find();

// dd($user);

    // if yes, redirect to login page
if($user){
    header('location: /');
    exit();
}else{
    // if no, save to database and redirect to login page
    $db->query('INSERT INTO user(email, password) VALUES(:email, :password)',[
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_BCRYPT)
    ]);

    // $_SESSION['user']=[
    //     'email'=>$email
    // ];
    
    login($user);

    header('location: /');
    exit();
}