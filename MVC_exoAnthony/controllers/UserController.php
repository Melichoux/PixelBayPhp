<?php

include_once 'models/User.php';

$act = $_GET['act'] ?? '';
$pageStyles = ['/styles/users.css'];
$userModel = new UserModel($pdo);

switch ($act) {
    case 'list':
        $users = $userModel->getUserList();
        include 'views/users/list.php';
        break;
    case 'detail':
        $id = (int) ($_GET['id'] ?? 0);
        $user = $userModel->getUserById($id);

        if ($user === null) {
            http_response_code(404);
            include 'views/notfound.php';
            break;
        }

        include 'views/users/detail.php';
        break;
    default:
        http_response_code(404);
        include 'views/notfound.php';
        break;
}
