<?php
$erreurs = [];
$succes = false;
//ATTENTION LE REQUIRED DANS LES INPUTS SE MET EN DERNIER!!!!!!!!!
//------------------------------------------------------------------
// Initialise les variables et permettra le stockage des données du formulaires
$name = "";
$email= "";
$sujet = "";
$message = "";

// var_dump($sujet);
$name_lenght = mb_strlen($name,"UTF-8"); /* On crée cette variable pour ne pas lancer la fonction deux fois à l'appel de $name. mb_strlen permet de compter le nombre exact de caractere dans la saisie (a l'inverse de strlen qui compte le poids des caracteres en octets, donc pour l'alphabet francais on priviligie la fonction mb_stlen)*/

//------------------------------------------------------------------
//verifier que le formulaire est bien envoyé en POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Vérifier si le paramètre existe et n'est pas vide + "nettoyage" cad mise en forme anti-XSS

$name = htmlspecialchars(trim($_POST['lastName'] ?? ''));
$email= filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$sujet = htmlspecialchars(trim($_POST['filter'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

// Validation de la saisie

if(empty($name)|| $name_lenght<2 || $name_lenght>50){ // On appliquera toutes les contraintes de saisie (= sécurité) dans le php et pas dans le html
    $erreurs[] = "le nom est obligatoire.";}

if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erreurs[] = "L'adresse email n'est pas valide.";}

if(empty($message) || mb_strlen($message)<10){
    $erreurs[] = "Vous n'avez pas saisie de message ou il ne contient pas assez de caractere.";}

if(empty($erreurs)){
    $succes = true;}
}

var_dump($name);
var_dump($email);
var_dump($sujet);
var_dump($message);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - PixelBay</title>
</head>
<body>
    <header><h1>Contactez PixelBay</h1></header>
    <main>
    <?php if ($succes): ?>
    <p class="succes">Votre message a bien été envoyé !</p>

    <?php else: ?>
    <?php if (!empty($erreurs)): ?>
            <ul>
                <?php foreach ($erreurs as $erreur): ?>
                <li><?= $erreur ?></li>
                <?php endforeach; ?>
            </ul>

    <?php endif; ?>

     <div>
            <form action="#" method="post">
                <div>
                    <label for="lastName"> Nom <span>*</span></label> <br>
                    <input type="text" id="lastName" name="lastName" placeholder="Votre nom" value="<?= $name ?? '' ?>">
                </div>
                <div>
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email" placeholder="Votre email" value="<?= $email ?? '' ?>" required>
                </div>
                <div>
                    <label for="filter" class="color-w"> Filtrer les actualités 
                        <select name="filter" id="filter" placeholder="--Séléctionner un filtre--">
                            <option value="default">--Séléctionner un sujet--</option>
                            <option value="question" <?= $sujet === "question" ? 'selected' : '' ?>>Question</option>
                            <option value="reclamation"<?= $sujet === "reclamation" ? 'selected' : '' ?>>Reclamation</option>
                            <option value="partenariat"<?= $sujet === "partenariat" ? 'selected' : '' ?>>Partenariat</option>
                            <option value="autre"<?= $sujet === "autre" ? 'selected' : '' ?>>Autre</option>
                        </select>            
                    </label>    
                </div>
                <div>
                    <label for="message">Votre message :<span>*</span></label><br>
                    <textarea id="message" name="message" placeholder="Écrivez votre message ici..." value="<?= $message ?? '' ?>" maxlength="1000" minlength="10" required> </textarea><br>
                </div>
                <div>
                    <button type="submit"> Envoyer </button>
                </div>

            </form>
        </div>
        <?php endif; ?>
    </main>
    <footer></footer>

</body>
</html>
