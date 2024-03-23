<?php

// Démarrage de la session pour gérer les sessions utilisateur


session_start();
require 'database.php';

// Vérification si la méthode de la requête est POST (lorsque le formulaire est soumis)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $stmt = $database->prepare("SELECT id, pseudo, password FROM user WHERE pseudo = :pseudo");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['pseudo'] = $user['pseudo'];  


// Vérification si un utilisateur correspondant a été trouvé et si le mot de passe soumis correspond au mot de passe enregistré dans la base de données

        if ($user && $_POST['password'] === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: acceuil.php");
            exit();
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="text" name="pseudo" id="pseudo" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
