<?php
$host = 'mysql-server';
$dbname = 'pixelbay';
$username = 'root';
$password = 'root';

try {
     $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
           [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /* gestion d'erreur en creant une exception (par throw) qui sera captée par le catch*/
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
} catch (PDOException $e) { // class specifiquement adapté dans la récup d'erreur pdo
        die( "Erreur : " . $e->getMessage()); /* die "tue" le script a partir du moment ou il est executé, tout a fait adapté dans cette situation car un echo ne bloquerai pas le script et le reste du code serai interprété créant d'autres erreur encore plus fatal en essayant d'utiliser un pdo qui n'existe pas*/
}

