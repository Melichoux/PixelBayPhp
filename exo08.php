<?php 
$commande = [
    ["nom" => "Cyber Race", "prix_unitaire" => 49.99, "quantite" => 2],
    ["nom" => "Manette Pro", "prix_unitaire" => 59.99, "quantite" => 1],
    ["nom" => "Carte Mémoire 128Go", "prix_unitaire" => 24.99, "quantite" => 3]
];
$tva = 20;

function calculerTTC($prixHT, $tva){
    
    return round($prixHT *(1+$tva/100),2);
}

$totalHT = 0;
foreach ($commande as $article) {
    $totalHT += $article['prix_unitaire'] * $article['quantite']; // += signifie $totalHT = $totalHT + (pour eviter d'ecrire deux fois la variables)
}
$montantTVA = round($totalHT * $tva / 100, 2);
$totalTTC = calculerTTC($totalHT, $tva);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>resultat exo8</title>
    </head>
    <body>
        <header></header>
        <main>
            <!-- <?php foreach ($commande as $article): ?>
            <?= $article['nom']. "<br>" ?>
            <?= $article['prix_unitaire']. "€ <br>" ?>
            <?= "quantité".$article['quantite'] . "<br>"?>
            <?= "Total HT".round($article['prix_unitaire'] * $article['quantite'], 2)."€ <br>"?>
        <?php endforeach; ?>

          <tr>
            <td colspan="3">Total HT</td>
            <td><?= round($totalHT, 2) ?> €</td>
        </tr> -->
          <table>
        <tr>
            <th>Article</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Sous-total</th>
        </tr>
        <?php foreach ($commande as $article): ?>
        <tr>
            <td><?= $article['nom'] ?></td>
            <td><?= $article['prix_unitaire'] ?> €</td>
            <td><?= $article['quantite'] ?></td>
            <td><?= round($article['prix_unitaire'] * $article['quantite'], 2) ?> €</td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Total HT</td>
            <td><?= round($totalHT, 2) ?> €</td>
        </tr>
        <tr class="total">
            <td colspan="3">TVA (<?= $tva ?>%)</td>
            <td><?= $montantTVA ?> €</td>
        </tr>
        <tr class="total">
            <td colspan="3">Total TTC</td>
            <td><?= $totalTTC ?> €</td>
        </tr>
    </table>
        </main>
        <footer></footer>
    </body>
</html>