<?php 
$commande = [
    ["nom" => "Cyber Race", "prix_unitaire" => 49.99, "quantite" => 2],
    ["nom" => "Manette Pro", "prix_unitaire" => 59.99, "quantite" => 1],
    ["nom" => "Carte Mémoire 128Go", "prix_unitaire" => 24.99, "quantite" => 3]
];
$tva = 20;

function calculerTTC ($prixHT, $tva){
    $prixTTC = [];
    foreach ($array as $key => $prixHT) {
        $prixTTC = $prixHT - ($prixHT * $tva / 100);
    }
    return $prixTTC;
}
// echo calculerTTC();
?>