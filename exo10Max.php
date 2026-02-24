<?php
$erreurs = [];
$succes = false;

$nom = '';
$email = '';
$sujet = '';
$message = '';


// filter_var($variable(obligatoire), $filtre(optionnel), $options(optionnel));

// FILTER_VALIDATE_EMAIL Valide une adresse e-mail
// FILTER_SANITIZE_EMAIL Supprime les caractères illégaux d'un e-mail
// Plutot que trim, utiliser "explode" OU str_split

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = strtolower(trim($_POST['nom'] ?? ''));
    $email = filter_var(strtolower(trim($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL);
    $sujet = strtolower(trim($_POST['sujet'] ?? ''));
    $message = trim($_POST['message'] ?? '');

    if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom est obligatoire et doit contenir entre 2 et 50 caractères";
    }

    if (empty($email)) {
        $erreurs[] = "L'email est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide";
    }

    if (empty($sujet)) {
        $erreurs[] = "Veuillez choisir un sujet";
    }

    if (empty($message) || strlen($message) < 10) {
        $erreurs[] = "Le message doit contenir au minimum 10 caractères";
    }

    if (empty($erreurs)) {
        $succes = true;
    }
}

var_dump($nom);
var_dump($email);
var_dump($sujet);
var_dump($message);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contact - PixelBay</title>
    <style>
        .erreur {
            color: red;
        }

        .succes {
            color: green;
            font-weight: bold;
        }

        form {
            max-width: 500px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <h1>Contactez PixelBay</h1>

    <?php if ($succes): ?>
        <p class="succes">Votre message a bien été envoyé ! </p>

    <?php else: ?>

        <?php if (!empty($erreurs)): ?>
            <ul class="erreur"><?php foreach ($erreurs as $erreur): ?>
                    <li><?= $erreur ?></li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

        <form action="#" method="POST">
            <div>
                <label for="nom">Nom :</label>
                <input type="text"
                    id="nom"
                    name="nom" value="<?= htmlspecialchars($nom ?? '') ?>">
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email"
                    id="email"
                    name="email" value="<?= htmlspecialchars($email ?? '') ?>">
            </div>

            <div>
                <label for="sujet">Sujet :</label>
                <select id="sujet" name="sujet">
                    <option value="" disabled>Choisissez une option</option>

                    <option value="Question"
                        <?php
                        if ($sujet === 'Question') {
                            echo 'selected';
                        } else {
                            echo '';
                        }
                        ?>>Question</option>

                    <option value="Réclamation"
                        <?php
                        if ($sujet === 'Réclamation') {
                            echo 'selected';
                        } else {
                            echo '';
                        }
                        ?>>Réclamation</option>

                    <option value="Partenariat"
                        <?php
                        if ($sujet === 'Partenariat') {
                            echo 'selected';
                        } else {
                            echo '';
                        }
                        ?>>Partenariat</option>

                    <option value="Autre"
                        <?php
                        if ($sujet === 'Autre') {
                            echo 'selected';
                        } else {
                            echo '';
                        }
                        ?>>Autre</option>

                </select>
            </div>

            <div>
                <label for="message">Message :</label>
                <textarea id="message"
                    name="message"><?= htmlspecialchars($message ?? '') ?></textarea>
            </div>

            <button type="submit">Envoyer le message</button>
        </form>

    <?php endif; ?>


</body>

</html>