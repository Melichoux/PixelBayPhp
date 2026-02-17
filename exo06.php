<?php 
$prix = 59.99;
$nomJeu = "Cyber Punk";

function promoEte ($prix) {
    return $prix = $prix - ($prix * 0.2);
}
// echo "Le prix apres application de la promotion d'été est ". promoEte($prix) ."<br>";

function promoHiver ($prix) {
    return $prix = $prix - ($prix * 0.3);
}
// echo "Le prix apres application de la promotion d'hiver est ". promoHiver($prix) ."<br>";

function promoSpeciale ($prix, $pourcentage = 0) {
    return $prix = $prix - ($prix * $pourcentage /100);
}
// echo "Le prix apres application de la promotion est ". promoSpeciale($prix) ."<br>";

function afficherPrix($nomJeu, $prixOriginal, $prixReduit, $labelPromo) {
    return $nomJeu." : ".$prixOriginal." -> ".round($prixReduit, 2)." euro ". ($labelPromo) . '<br>';
}

echo afficherPrix($nomJeu, $prix, promoEte($prix), 'Promo été -20%');
echo afficherPrix($nomJeu, $prix, promoHiver($prix),'Promo hiver -30%');
echo afficherPrix($nomJeu, $prix, promoSpeciale($prix, 15), 'Promo spéciale -15%');

?>