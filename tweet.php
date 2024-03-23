<?php 
require 'database.php'; 


// Préparation de la requête SQL pour sélectionner tous les tweets avec les informations utilisateur correspondantes

$tweets = $database->prepare('SELECT * FROM tweet inner JOIN user ON TWEET.user_id = user.id'); 

$tweets->execute();

// Récupération de tous les résultats de la requête sous forme de tableau


$tweet = $tweets->fetchAll(PDO::FETCH_ASSOC);

print_r($tweet);








?>