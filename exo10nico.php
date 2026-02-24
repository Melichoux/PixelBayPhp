<?php
$erreurs = [];
$succes = false;
$nom = '';
$email = '';
$sujet = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage
    $nom = trim($_POST['nom'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation
    if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caractères.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide.";
    }

    if (empty($sujet)) {
        $erreurs[] = "Veuillez sélectionner un sujet.";
    }

    if (empty($message) || strlen($message) < 10) {
        $erreurs[] = "Le message doit contenir au moins 10 caractères.";
    }

    if (empty($erreurs)) {
        $succes = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - PixelBay</title>
    <style>
        .erreur { color: red; }
        .succes { color: green; font-weight: bold; }
        form { max-width: 500px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
    <h1>Contactez PixelBay</h1>

    <?php if ($succes): ?>
        <p class="succes">Votre message a bien été envoyé. Merci !</p>
    <?php else: ?>

        <?php if (!empty($erreurs)): ?>
            <ul class="erreur">
                <?php foreach ($erreurs as $erreur): ?>
                    <li><?= $erreur ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"
                   value="<?= htmlspecialchars($nom) ?>" required minlength="2" maxlength="50">

            <label for="email">Email :</label>
            <input type="email" name="email" id="email"
                   value="<?= htmlspecialchars($email) ?>" required>

            <label for="sujet">Sujet :</label>
            <select name="sujet" id="sujet" required>
                <option value="">-- Choisir un sujet --</option>
                <option value="Question" <?= $sujet === 'Question' ? 'selected' : '' ?>>Question</option>
                <option value="Réclamation" <?= $sujet === 'Réclamation' ? 'selected' : '' ?>>Réclamation</option>
                <option value="Partenariat" <?= $sujet === 'Partenariat' ? 'selected' : '' ?>>Partenariat</option>
                <option value="Autre" <?= $sujet === 'Autre' ? 'selected' : '' ?>>Autre</option>
            </select>

            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="5"
                      required minlength="10"><?= htmlspecialchars($message) ?></textarea>

            <button type="submit">Envoyer</button>
        </form>
    <?php endif; ?>
</body>
</html>
