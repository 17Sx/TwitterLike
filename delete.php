<?php


    require 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tweetid=$_POST['tweetid'];
    $requete= $database-> prepare("DELETE FROM tweet WHERE id = :tweetid");
    $result = $requete->execute(['tweetid' => $tweetid]);

    header("Location: acceuil.php");
}
    ?>