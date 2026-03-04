<?php
session_start();
require_once 'config.php'; // permet de chercher et d'inclure le fichier config.php si cela n'a pas déjà été fait

if (isset($_SESSION['user_id'])) { // permet de savoir si l'utilisateur est déjà connecté
    header("Location: exo16-dashboard.php"); // si oui, redirection vers la page d'apres connexion
    exit; // permet de stopper le script de cette page apres la redirection (sinon le script continue de s'executer en arriere plan donc faille de sécurité et bugs possibles)
}

$error = ''; // le "$success" n'est pas necessaire car en cas de reussite, il y a une redirection donc pas besoin de définir un message de reussite sur la page si on ne reste pas dessus

// ----Vérification des entrées de connexion ---- 
 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email= filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? ''; // htmlspecialchars s'utilise dans le html et pas en php, on evite de modifier un mdp avant de le hasher

    $stmt = $pdo -> prepare ("SELECT * FROM users WHERE email = :email");
    $stmt -> execute (['email' => $email]);
    $users = $stmt -> fetch(); // verif et recup d'une adresse mail dans la table

    // var_dump($users);
    if ($users && password_verify($password, $users['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $users['id'];
        $_SESSION['user_name'] = $users['prenom'] . '' . $users['nom'];
        $_SESSION['user_role'] = $users['role'];
        header("location: exo16/exo16-dashboard.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
 }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <header> Connexion Pixel Bay </header>
    <main>
            <form action="#" method="post">
                <div>
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email" placeholder="Votre email" value="<?= $email ?? '' ?>" required>
                </div>
                <div>
                    <label for="password">Mot de passe <span>*</span></label> <br>
                    <input type="password" id="password" name="password" placeholder="Abcde12!:é" value="<?= $password ?? '' ?>" required>
                </div>
                <div>
                    <button type="submit"> Se connecter </button>
                </div>
            </form>
    </main>
    <footer></footer>
</body>
</html>