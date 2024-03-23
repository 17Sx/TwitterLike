<?php

//permet de ce connecter a la base de données

try {
    $database = new PDO('mysql:host=localhost;dbname=twittertp', 'root', '');
} catch (PDOException $e) {
    die('Site Indisponible pour le moment.');
}


//permet de s'enregistrer dans la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form']) && $_POST['form'] == 'ajout') {
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];

// Prépare une requête d'insertion dans la table user avec les valeurs récupérées


        $requete = $database->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)");
        $requete->bindParam(':pseudo', $pseudo);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':password', $password);

// Exécute la requête


        if ($requete->execute()) {
            echo '<script type="text/javascript">alert("Compte crée !");</script>'; //permet de mettre du JS dans le php
            header("Location: login.php");
        } else {
            echo '<script type="text/javascript">alert("Votre compte n/a pas pus etre crée !");</script>';  
            header("Location: register.php");      }
    } else {
        echo '<script type="text/javascript">alert("Veuiller a remplir tout les champs SVP !");</script>';
        header("Location: register.php"); 
    }
}

?>
