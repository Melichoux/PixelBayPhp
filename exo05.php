<?php 
$stockActuel = 12;
$stockCible = 100;
$stockLivraison = 8;
$compteur = 0;

echo "--- Reapprovisionnement ---<br>";
while ($stockActuel < $stockCible) {
    $stockActuel = $stockActuel + $stockLivraison;
    $compteur ++;
    echo "Livraison $compteur: stock = $stockActuel<br>";
}
echo "Nombre total de livraisons: $compteur.<br><hr>";

$mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
         "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
$jeuxPhares = ["Cyber Race", "Pixel Quest", "Block Master", "Sky Pilot",
               "Dungeon Crawl", "Mystic Lands", "Battle Arena", "Escape Room",
               "Neural Rush", "Horror House", "Festival Games", "Winter Sports"];


?>