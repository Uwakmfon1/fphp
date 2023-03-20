<?php
require base_path('router.php');
$heading = "Create A Note";
require "./Validator.php";

if(! Validator::email('basseybassey@yahoo.com'))
{
   dd("that is not a valid email");
}


if($_SERVER["REQUEST_METHOD"] === 'POST'){
   
   $errors=[];

   $validator = new Validator();

   if(! Validator::string($_POST['body'], 1, 1000)){
      $errors['body']="A body not greater than 1000 is required";
   }

   
   if(empty($errors)){
      $db->query("INSERT into notes(body,user_id) VALUES(:body, :user_id)",[
         'body'=>$_POST['body'],
         'user_id'=>13
      ]);
   }
 
}

view("notes/create.view.php", [
   'heading' => 'Create Note',
   'errors' => $errors
]);

// require "./views/notes/create.view.php";

