<?php



$_SESSION['name'] = "ima";

require base_path('./views/partials/head.php');

// require base_path('./views/partials/banner.php');


require base_path('./views/partials/footer.php');

view("index.view.php", [
    'heading' => 'Home',
]);
