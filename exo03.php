<?php 
$chiffreAffaire = 35000;

if ($chiffreAffaire>5000){
    echo 'Le chiffre d\'affaire de jour est de '. $chiffreAffaire.'<br>';
    echo "Journée exceptionnelle! Commander de nouveaux stocks.";
} elseif ($chiffreAffaire>=2000) {
    echo 'Le chiffre d\'affaire de jour est de '. $chiffreAffaire.'<br>';
    echo "Bonne journée. Maintenir la strategie actuelle.";
} elseif ($chiffreAffaire>=500) {
    echo 'Le chiffre d\'affaire de jour est de '. $chiffreAffaire.'<br>';
    echo "Journée moyenne. Lancer une promotion sur les reseaux sociaux.";
} else {
    echo 'Le chiffre d\'affaire de jour est de '. $chiffreAffaire.'<br>';
    echo "Journée difficile. Organiser un evenement en magasin.";
}
?>