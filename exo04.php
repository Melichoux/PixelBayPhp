<?php
$code = "R";
switch ($code) {
    case 'A':
        echo "Rayon Action-Aventure - Allée 1";
        break;

    case 'R':
        echo "Rayon RPG - Allée 2";
        break;

    case 'S':
        echo "Rayon Sport - Allée 3";
        break;

    case 'C':
        echo "Rayon Course - Allée 4";
        break;

    case 'P':
        echo "Rayon Puzzle - Allée 5";
        break;

    default:
        echo "!Erreur! Ce code ne correspond à aucun jeu!";
        break;
}
?>