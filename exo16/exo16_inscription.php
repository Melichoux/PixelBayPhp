<?php 
$errors = [];
$success = false;

//------------------------------------------------------------------
//verifier que le formulaire est bien envoyé en POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Vérifier si le paramètre existe et n'est pas vide + "nettoyage" cad mise en forme anti-XSS
    
    $last_name = (trim($_POST['lastName'] ?? ""));
    $first_name = (trim($_POST['firstName'] ?? ''));
    $email= filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = (trim($_POST['password'] ?? '')); // htmlspecialchars s'utilise dans le html et pas en php
    $confirm_password = (trim($_POST['confirm_password'] ?? ''));
    $age = $_POST['age'] ?? '';
    $cgu = isset($_POST['cgu']);
    
    /* On crée cette variable pour ne pas lancer la fonction deux fois à l'appel de $name. mb_strlen permet de compter le nombre exact de caractere dans la saisie (a l'inverse de strlen qui compte le poids des caracteres en octets, donc pour l'alphabet francais on priviligie la fonction mb_stlen)*/ 
    $l_name_lenght =mb_strlen($last_name, "UTF-8");
    $f_name_lenght = mb_strlen($first_name, "UTF-8");
    $password_lenght = mb_strlen($password, "UTF-8");
    $confirm_password_lenght = mb_strlen($confirm_password, "UTF-8");

    // Validation de la saisie => On appliquera toutes les contraintes de saisie (= sécurité) dans le php et pas dans le html

if(empty($last_name)|| $l_name_lenght<2 || $l_name_lenght>30){
$errors['lastName'] = "le nom est obligatoire."; /* en nommant les clés on créé un tableau associatif avec une clé nommée que l'on pourra appeler plus tard dans le code (sous le champs concerné par le message d'erreur) contrairement à juste "$errors[]" qui correspond a un tableau indexé automatiquement et sur lequel il faudrait faire une boucle pour afficher tous les messages d'erreurs à la suite au meme endroit 
---- ATTENTION ---- le champs renseigné entre les crochets correspond au "name" de l'input html*/
    }

if(empty($first_name)|| $f_name_lenght<2 || $f_name_lenght>30){ 
    $errors ['firstName'] = "le prénom est obligatoire.";}

if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "L'adresse email n'est pas valide.";
    }

if(empty($password) || $password_lenght<8){
    $errors['password'] = "Mot de passe de 8 caracteres obligatoire.";
    }
if(empty($confirm_password) || $password != $confirm_password){ //On verifie directement les saisies utilisateurs et pas les saisies "traitées".
    $errors['confirm_password'] = "La saisie est différente du mot de passe.";
    }

if (empty($age) || $age < 16 || $age > 120) {
    $errors['age'] = "L'âge doit etre renseigné.";
    }

if(!$cgu){
    $errors['cgu'] = "Vous devez accepter les conditions générales.";
    }

if(empty($errors)){
    $success = true;
    echo "Votre formulaire a été envoyé avec succes.<br>". "Vous etes $last_name $first_name.<br> Votre email -- $email -- <br> Mot de passe : **** <br> Vous avez $age ans.";}
// Pas besoin de else car les messages d'erreur s'affichent directement à coté des inputs concernés.
    
    // var_dump($last_name);
    // var_dump($first_name);
    // var_dump($email);
    // var_dump($password);
    // var_dump($confirm_password);
    // var_dump($age);
    // var_dump($cgu);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo 11 PHP</title>
</head>
<body>
    <header>Formulaire d'inscription</header>
    <main>
         <div>
            <form action="#" method="post">
                <div>
                    <label for="lastName"> Nom <span>*</span> </label> <br>
                    <input type="text" id="lastName" name="lastName" placeholder="Votre nom" value="<?= $last_name ?? '' ?>" required>
                        <?php if (!empty($errors['lastName'])) : ?>
                                <?= htmlspecialchars($errors['lastName']) ?>
                        <?php endif; ?>
                </div>
                <div>
                    <label for="firstName"> Prénom <span>*</span></label> <br>
                    <input type="text" id="firstName" name="firstName" placeholder="Votre prénom" value="<?= $first_name ?? '' ?>" required>
                        <?php if (!empty($errors['firstName'])) : ?>
                            <?= htmlspecialchars($errors['firstName']) ?>
                        <?php endif; ?>

                </div>
                <div>
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email" placeholder="Votre email" value="<?= $email ?? '' ?>" required>
                        <?php if (!empty($errors['email'])) : ?>
                            <?= htmlspecialchars($errors['email']) ?>
                        <?php endif; ?>

                </div>
                <div>
                    <label for="password">Mot de passe <span>*</span></label> <br>
                    <input type="password" id="password" name="password" placeholder="Abcde12!:é" value="<?= $password ?? '' ?>" required>
                        <?php if (!empty($errors['password'])) : ?>
                                <?= htmlspecialchars($errors['password']) ?>
                        <?php endif; ?>
                </div>
                <div>
                    <label for="confirm_password">Confirmation du mot de passe <span>*</span></label> <br>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Abcde12!:é" value="<?= $confirm_password ?? '' ?>" required>
                        <?php if (!empty($errors['confirm_password'])) : ?>
                                <?= htmlspecialchars($errors['confirm_password']) ?>
                        <?php endif; ?>
                </div>
                <div>
                    <label for="age">Âge</label> <br>
                    <select name="age" id="age" required>
                        <option value="">-- Sélectionnez votre âge --</option>
                        <?php for ($i = 16; $i <= 120; $i++): // Permet de faire une boucle pour afficher les ages de 16 à 120 ans?>
                            <option value="<?= $i ?>"> <?= $i ?> ans </option>
                        <?php endfor; ?>
                    </select>
                        <?php if (!empty($errors['age'])) : ?>
                                <?= htmlspecialchars($errors['age']) ?>
                        <?php endif; ?>

                </div>
                <div>
                    <input type="checkbox" id="cgu" name="cgu" value=true/>
                    <label for="cgu"> J'accepte les conditions générales</label>
                        <?php if (!empty($errors['cgu'])) : ?>
                                <?= htmlspecialchars($errors['cgu']) ?>
                        <?php endif; ?>
                </div>
                <div>
                    <button type="submit"> Envoyer </button>
                </div>

            </form>
        </div></main>
    <footer></footer>
</body>
</html>
?>