<?php
session_start();
require_once __DIR__ . '/../exo16/config.php';

// on verifie que le panier n'existe pas, si oui on créé un panier
if (!isset($_SESSION['panier'])) { 
    $_SESSION['panier'] = [];
}

// Ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $idJeu = intval($_POST['ajouter']); // permet de convertir la quantité en nombre car php le traite comme un string

    $stmt = $pdo->prepare("SELECT * FROM jeux WHERE id = :id AND stock > 0");
    $stmt->execute(['id' => $idJeu]);
    $jeu = $stmt->fetch();

    if ($jeu) {
        $trouve = false;
        for ($i = 0; $i < count($_SESSION['panier']); $i++) { // le panier est vide et on va verifier pour chaque valeur du compteur si il y a un id de jeu qui y correspond
            if ($_SESSION['panier'][$i]['id'] === $idJeu) { // si le jeu est dans le panier: 
                if ($_SESSION['panier'][$i]['quantite'] < $jeu['stock']) { //on verifie que la quantite demandée n'est pas superieure au stock disponible
                    $_SESSION['panier'][$i]['quantite']++;// on ajouter 1 au compteur pour etre pret a chercher un nouveau jeu dans le panier
                }
                $trouve = true;
                break;
            }
        }

        if (!$trouve) {
            $_SESSION['panier'][] = [
                'id' => $jeu['id'],
                'titre' => $jeu['titre'],
                'prix' => $jeu['prix'],
                'quantite' => 1
            ];
        }
    }
    header("Location: exo18-boutique.php");
    exit;
}

// Récupérer tous les jeux
$stmt = $pdo->query("SELECT * FROM jeux ORDER BY titre");
$catalogue = $stmt->fetchAll();

$nbArticles = 0;
foreach ($_SESSION['panier'] as $article) {
    $nbArticles += $article['quantite'];
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Boutique - PixelBay</title>
        <style>
            .catalogue { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; max-width: 800px; }
            .jeu { border: 2px solid #333; padding: 15px; border-radius: 8px; }
        .rupture { opacity: 0.5; }
        .panier-lien { background: #4CAF50; color: white; padding: 10px 20px;
                       text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 20px; }
        button { padding: 8px 15px; background: #2196F3; color: white; border: none;
                 border-radius: 4px; cursor: pointer; }
        button:disabled { background: #9E9E9E; cursor: not-allowed; }
    </style>
</head>
<body>
    <h1>Boutique PixelBay</h1>
    <a class="panier-lien" href="exo18-panier.php">Panier (<?= $nbArticles ?>)</a>

    <div class="catalogue">
        <?php foreach ($catalogue as $jeu): ?>
            <div class="jeu <?= $jeu['stock'] <= 0 ? 'rupture' : '' ?>">
                <h3><?= htmlspecialchars($jeu['titre']) ?></h3>
                <p><?= $jeu['prix'] ?> €</p>
                <p>Stock : <?= $jeu['stock'] ?></p>
            <p><em><?= htmlspecialchars($jeu['genre']) ?></em></p>
            <form action="" method="POST">
                <button type="submit" name="ajouter" value="<?= $jeu['id'] ?>"
                    <?= $jeu['stock'] <= 0 ? 'disabled' : '' ?>>
                    <?= $jeu['stock'] <= 0 ? 'Rupture de stock' : 'Ajouter au panier' ?>
                </button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
