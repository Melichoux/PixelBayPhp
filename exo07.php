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

echo "Afficher un jeu du tableau associatif<hr>";
// function afficherJeu($array, $index) {
//     foreach ($array[$index] as $key => $value) {
//         if ($key=="scores") {
//             echo "$key : ";
//             for ($i=0; $i < count($value) ; $i++) { 
//                 echo "$value[$i], ";
//             };
//         } else {
//             echo $key . ' : ' .$value.'<br>';
//         }
//     }
// }

// Alternative avec la fonction implode (transforme toute les valeurs d'un array avec un separateur de notre choix)
// function afficherJeu($array, $index) {
//     foreach ($array[$index] as $key => $value) {
//         if ($key == "scores") {
//             $scoresString = implode(", ", $value);  //ici le " ," defini le séparateur entre chaque valeur du array
//             echo "scores : " . $scoresString . "<br>";
//         } else {
//             echo $key . ' : ' . $value . '<br>';
//         }
//     }
// }

// afficherJeu($collection, 1);

echo "Calculer et retourner la moyenne des scores d'un jeu<hr>";

function moyenneScore ($array) {
    $moyenne = array_sum($array)/ count($array);
    return $moyenne;
}
?>