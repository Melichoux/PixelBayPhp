<?php
$erreurs = [];
$succes = false;
//------------------------------------------------------------------
// Initialise les variables et permettra le stockage des données du formulaires
$name = "";
$email= "";
$sujet = [$question = [],
          $reclamation = [],
          $partenariat = [],
          $autre = []];
$message = "";

// var_dump($sujet);
$name_lenght = mb_strlen($name); /* On crée cette variable pour ne pas lancer la fonction deux fois à l'appel de $name. mb_strlen permet de compter le nombre exact de caractere dans la saisie (a l'inverse de strlen qui compte le poids des caracteres en octets, donc pour l'alphabet francais on priviligie la fonction mb_stlen)*/

//------------------------------------------------------------------
//verifier que le formulaire est bien envoyé en POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {}

// Vérifier si le paramètre existe et n'est pas vide + "nettoyage" cad mise ne forme anti XSS

$name = htmlspecialchars(trim($_POST['lastName'] ?? ''));
$email= filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$sujet = 
$message = "";
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
     <div>
            <form action="#" method="post">
                <div>
                    <label for="lastName"> Nom <span>*</span></label> <br>
                    <input type="text" id="lastName" name="lastName" placeholder="Votre nom" maxlength="50" minlength="2" required>
                </div>
                <div>
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div>
                    <label for="filter" class="color-w"> Filtrer les actualités 
                        <select name="filter" id="filter" placeholder="--Séléctionner un filtre--">
                            <option value="default">--Séléctionner un sujet--</option>
                            <option value="Question">Question</option>
                            <option value="Reclamation">Reclamation</option>
                            <option value="Partenariat">Partenariat</option>
                            <option value="Autre">Autre</option>
                        </select>            
                    </label>    
                </div>
                <div>
                    <label for="message">Votre message :<span>*</span></label><br>
                    <textarea id="message" name="message" placeholder="Écrivez votre message ici..." maxlength="1000" minlength="10" required> </textarea><br>
                </div>
                <div>
                    <button type="submit"> Envoyer </button>
                </div>

            </form>
        </div>
    </main>
    <footer></footer>

</body>
</html>
