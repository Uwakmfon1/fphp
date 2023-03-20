<?php

$db = new Database($config['database']); 

// $config = require('config.php');
$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 13;
$heading = 'Note';

/**
 * fetch all the notes with a particular id
 * open note if it is the user 
 * dont open note of another user with different id
 */


// $note = $db->query('select * from notes where id = :id', ['id'=> $_GET['id'],
// ])->find();

$note = $db->query('select * from notes where id = :id', ['id'=> $_GET['id'],
])->findOrFail();

authorize($note['user_id']==$currentUserId);


require "views/notes/show.view.php";

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);


