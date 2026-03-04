<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail utilisateur</title>
    <?php if (!empty($pageStyles) && is_array($pageStyles)): ?>
        <?php foreach ($pageStyles as $style): ?>
            <link rel="stylesheet" href="<?php echo $style; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body class="page page-users">
    <main class="container">
        <section class="card users-card users-detail-card">
            <a href="/?do=users&act=list" class="btn users-back-link">Retour à la liste</a>
            <h1 class="users-title">Détail utilisateur</h1>

            <div class="users-detail-list">
                <div class="users-detail-item">
                    <span class="users-detail-label">ID</span>
                    <span class="users-detail-value"><?php echo $user['id']; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Rôle</span>
                    <span class="users-detail-value"><?php echo $user['role']; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Nom</span>
                    <span class="users-detail-value"><?php echo $user['lastname']; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Prénom</span>
                    <span class="users-detail-value"><?php echo $user['firstname']; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Email</span>
                    <span class="users-detail-value"><?php echo $user['email']; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Actif</span>
                    <span class="users-detail-value"><?php echo $user['is_active'] ? 'Oui' : 'Non'; ?></span>
                </div>
                <div class="users-detail-item">
                    <span class="users-detail-label">Créé le</span>
                    <span class="users-detail-value"><?php echo $user['created_at']; ?></span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
