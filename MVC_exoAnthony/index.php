<link rel="stylesheet" href="/styles/index.css">

<?php
include_once 'models/db.php';

$do = $_GET['do'] ?? '';

switch ($do) {
    case 'users':
        include 'controllers/UserController.php';
        break;
    default:
        http_response_code(404);
        include 'views/notfound.php';
        break;
}
?>