<?php 
const NOM_BOUTIQUE = 'PixelBay<br>';

$stock_init = 500;
$prix_moyen = 45;
// var_dump($stock, $prix_moyen);
$stock_vendu = ($stock_init * 25) / 100;
$stock_maj = $stock_init - $stock_vendu;
$chiffre_a = $stock_vendu * $prix_moyen;
echo 'Boutique: '. NOM_BOUTIQUE;
echo 'Stock initial: '. $stock_init.'<br>';
echo 'Jeux vendus: ' . $stock_vendu.'<br>';
echo 'Nouveau stock: ' . $stock_maj .'<br>';
echo 'Chiffre d\'affaires: ' . $chiffre_a.' euro<br>';
?>