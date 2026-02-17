<?php 
$collection = [
    [
        "titre" => "Cyber Race",
        "prix" => 49.99,
        "genre" => "Course",
        "stock" => 30,
        "scores" => [85, 90, 78, 92, 88]
    ],
    [
        "titre" => "GoW",
        "prix" => 59.99,
        "genre" => "Adventure",
        "stock" => 20,
        "scores" => [95, 90, 88, 92, 98]
    ],
    [
        "titre" => "Tetris",
        "prix" => 29.99,
        "genre" => "Logique",
        "stock" => 33,
        "scores" => [75, 90, 100, 92, 88]
    ],
    [
        "titre" => "Pop",
        "prix" => 49.99,
        "genre" => "Action",
        "stock" => 14,
        "scores" => [95, 91, 75, 92, 88]
    ],

    ];

function afficherJeu($array, $index) {
    foreach ($array[$index] as $key => $value) {
            echo $key . ' : ' .$value.'<br>';
        }
    }

afficher
?>