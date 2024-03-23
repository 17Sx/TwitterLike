<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['tweet_content'])) {
        $tweet_content = $_POST['tweet_content'];

        require 'database.php';

// Préparation de la requête SQL pour insérer un nouveau tweet dans la table 'tweet'


        $stmt = $database->prepare("INSERT INTO tweet (user_id, content) VALUES (:user_id, :content)");


// Liaison des valeurs de l'identifiant de l'utilisateur et du contenu du tweet
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':content', $tweet_content);


//Execution de la requête SQL
        if ($stmt->execute()) {
            header("Location: acceuil.php");
            exit();
        } else {
            echo "Une erreur s'est produite lors de la publication du tweet.";
        }
    } else {
        echo "Le champ de contenu du tweet est vide.";
    }
}
?>
