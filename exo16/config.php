<?php
$host = 'mysql-server';
$dbname = 'pixelbay';
$username = 'root';
$password = 'root';

try {
     $pdo = new PDO(
        "mysql:host=mysql-server;dbname=crud_php;charset=utf8mb4",
        "root",
        "root");
} catch (\Throwable $th) {
    //throw $th;
}

?>
