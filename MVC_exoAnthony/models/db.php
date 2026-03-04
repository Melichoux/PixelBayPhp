<?php

define('DB_HOST', '151.80.235.39:3306');
define('DB_NAME', 'mvc_afpa');
define('DB_USER', 'mvc_afpa');
define('DB_PASS', 'ldp9Hl0It&xlA5@i');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
