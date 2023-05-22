<?php
use Core\App;
use Core\Database;

// $config = require base_path('config.php');

// $db = new Database($config['database']);  //replacing with code next line
$db=App::resolve(Database::class); 



$heading = 'Note';
$currentUserId = 13;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


authorize($note['user_id'] === $currentUserId);
    
$db->query('DELETE from notes WHERE id= :id', [
        'id' => $_POST['id']
    ]);

header('location: /notes');
exit();

