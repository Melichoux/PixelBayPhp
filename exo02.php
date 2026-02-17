<?php 
$jeux = array('Pop', 'GoW', 'WoW', 'LoL', 'DK');

echo 'Le deuxieme jeu du catalogue est '.$jeux[1].'<br>';
$jeux[2] = 'Clair Obscur';
// var_dump($jeux);
echo 'Le nouveau troisieme jeu est '. $jeux[2].'<br>';
$jeuStar= ['titre' => 'Cyber Race', 'prix' => 49.99, 'genre' => 'Course', 'stock' => 30];

echo '--- Jeu Star --- <br>';
foreach ($jeuStar as $key => $value) {
    echo $key . ' : ' .$value.'<br>';
}
?>