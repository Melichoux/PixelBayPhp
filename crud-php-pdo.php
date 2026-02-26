<?php
// CODE minimaliste à adapter


// ETAPE 1 : CONNEXION À LA BASE DE DONNÉES AVEC PDO

// new ignifie qu'on instancier un objet PDO
// localhost = adresse de la BDD, ⚠️ dans le cas de docker c'est "mysql-server" et pas "localhost"
// dbname = nom de la BDD
// charset = encodage des caractères

try {
    $pdo = new PDO(
        "mysql:host=mysql-server;dbname=crud_php;charset=utf8mb4",
        "root",
        "root"
    );
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


try {
    $stmt = $pdo->prepare(
        "INSERT INTO cp_user (first_name, last_name, email, role)
     VALUES (:first_name, :last_name, :email, :role)"
    );
    $stmt->execute([
        ':first_name' => 'Toto',
        ':last_name' => 'Dupond',
        ':email' => 'toto@email.com',
        ':role' => 'user'
    ]);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO cp_user (first_name, last_name, email, role)
     VALUES (:first_name, :last_name, :email, :role)"
    );
    $stmt->execute([
        ':first_name' => 'Titi',
        ':last_name' => 'Dupond',
        ':email' => 'titi@email.com',
        ':role' => 'user'
    ]);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}


// Ce code permet de connaitre l'id de la dernière insertion

// $id = $pdo->lastInsertId();
// echo "ID créé : " . $id; // 6

function readAllUsers($pdo)
{
    try {
        $stmt = $pdo->prepare(
            "SELECT cp_user_id, first_name, last_name, email, role FROM cp_user"
        );
        $stmt->execute();
        // Fonctionne comme un foreach
        echo "<br><hr>";
        var_dump($stmt);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        throw new Exception("pas de données users"); //Permet d'ajouter une erreur en cas d'erreur voulu, par exemple si users est vide et on attend des données => renvoi au catch avec message d'erreur
        echo "<br><hr>";
        var_dump($users);

        echo "<br><hr>";
        echo $users[0]['email'];

        foreach($users as $user) {
            echo "<a href=''>" . $user['email'] . "</a>"; 
        } 

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

try {
    $stmt = $pdo->prepare(
        "SELECT cp_user_id, first_name, last_name, email, role FROM cp_user"
    );
    $stmt->execute();
    // Fonctionne comme un foreach
    echo "<br><hr>";
    var_dump($stmt);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<br><hr>";
    var_dump($users);

    echo "<br><hr>";
    echo $users[0]['email'];
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
($pdo);


// SELECT * FROM cp_user WHERE id =1;

try {
    $stmt = $pdo->prepare(
        "SELECT * FROM cp_user WHERE cp_user_id = :cp_user_id"
    );
    $stmt->execute([':cp_user_id' => 3]);

    echo "<br><hr>";
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($users);
    echo "<br><hr>";
} catch (\Throwable $th) {
    echo "Exception :", $th->getMessage(), "\n";
}


try {
    $stmt = $pdo->prepare(
        "UPDATE cp_user
     SET first_name = :first_name, email = :email
     WHERE cp_user_id = :id"
    );
    $stmt->execute([
        ':first_name' => 'Marie-Claire',
        ':email' => 'mc.dupont@email.com',
        ':id' => 1
    ]);
    echo $stmt->rowCount() . " modifié(s)";
} catch (\Throwable $th) {
    echo $th->getMessage(), "\n";
}


try {
    $stmt = $pdo->prepare(
        "DELETE FROM cp_user WHERE cp_user_id = :id"
    );
    $stmt->execute([':id' => 4]);

    echo $stmt->rowCount() . " supprimé(s)";
} catch (\Throwable $th) {
    echo $th->getMessage(), "\n";
}
