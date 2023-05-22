<?php

use Core\Database;
use Core\App;

// $config = require base_path('config.php');
// $db = new Database($config['database']); //replacing with code next line

$db = App::resolve(Database::class);

$heading = 'Note';

/**
 * fetch all the notes with a particular id
 * open note if it is the user 
 * dont open note of another user with different id
 */

$currentUserId = 13;


$note = $db->query('select * from notes where id = :id', [
      'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
