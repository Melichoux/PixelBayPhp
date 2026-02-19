<?php
$catalogue = [
    ["titre" => "Cyber Race", "prix" => 49.99, "genre" => "Course"],
    ["titre" => "Dungeon Crawl", "prix" => 39.99, "genre" => "RPG"],
    ["titre" => "Battle Arena", "prix" => 29.99, "genre" => "Action"],
    ["titre" => "Pixel Quest", "prix" => 19.99, "genre" => "Aventure"],
    ["titre" => "Cyber Punk 2084", "prix" => 59.99, "genre" => "RPG"],
    ["titre" => "Racing Thunder", "prix" => 34.99, "genre" => "Course"]
];

// Vérifier si le paramètre existe et n'est pas vide
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $recherche = $_GET['search'];
    echo "Vous recherchez : " . htmlspecialchars($recherche);
} else {
    echo "Aucun terme de recherche fourni.";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - PixelBay</title>
</head>
<body>
    <h1>Recherche PixelBay</h1>
    <form action="#" method="GET">
        <input type="text" name="search" placeholder="Rechercher un jeu..."
               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"> <!-- Cette ligne affiche le resultat de la requete $_GET avec l'operateur de coalescence nulle qui recupere soit la valeur du $_GET soit renvoi une chaine vide (par exemple pour eviter des erreurs a l'arrivée sur la page avec le champs input vide)  -->
        <button type="submit">Rechercher</button>
    </form>

    <!-- Affiche les resultats de la recherche et vérif qu'elle correspond a un element du tableau (avec anti-casse) -->
<?php 
    $found= [];
if (str_contains(strtolower($catalogue[$titre]), strtolower($recherche))) { // str_contains => permet de chercher dans le premier element si le deuxieme element est present
    $found []= $titre;
    echo "Résultat(s) trouvée(s): " . count($found);
} else { echo "Ce titre n'existe pas!";}
?>
</body>
</html>
