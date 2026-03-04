<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <?php if (!empty($pageStyles) && is_array($pageStyles)): ?>
        <?php foreach ($pageStyles as $style): ?>
            <link rel="stylesheet" href="<?php echo $style; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body class="page page-users">
    <main class="container">
        <section class="card users-card">
            <a href="/" class="btn users-back-link">Retour à l'accueil</a>
            <h1 class="users-title">Utilisateurs</h1>

            <?php if (count($users) === 0): ?>
                <p class="users-empty">Aucun utilisateur trouvé.</p>
            <?php else: ?>
                <div class="users-table-wrapper">
                    <table class="users-table">
                        <thead class="users-table-head">
                            <tr class="users-table-row">
                                <th class="users-table-header">ID</th>
                                <th class="users-table-header">Rôle</th>
                                <th class="users-table-header">Nom</th>
                                <th class="users-table-header">Prénom</th>
                                <th class="users-table-header">Email</th>
                                <th class="users-table-header">Actif</th>
                                <th class="users-table-header">Créé le</th>
                                <th class="users-table-header">Détail</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-body">
                            <?php foreach ($users as $user): ?>
                                <tr class="users-table-row">
                                    <td class="users-table-cell"><?php echo $user['id']; ?></td>
                                    <td class="users-table-cell"><?php echo $user['role']; ?></td>
                                    <td class="users-table-cell"><?php echo $user['lastname']; ?></td>
                                    <td class="users-table-cell"><?php echo $user['firstname']; ?></td>
                                    <td class="users-table-cell"><?php echo $user['email']; ?></td>
                                    <td class="users-table-cell"><?php echo $user['is_active'] ? 'Oui' : 'Non'; ?></td>
                                    <td class="users-table-cell"><?php echo $user['created_at']; ?></td>
                                    <td class="users-table-cell">
                                        <a class="users-link" href="/?do=users&act=detail&id=<?php echo $user['id']; ?>">Voir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
