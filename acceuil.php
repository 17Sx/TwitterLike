<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="acceuil.css">

</head>
<body>

<?php

//Permet de demarrer la session en fonction de l'id


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pseudo = $_SESSION['pseudo'];
?>


<header>
    <h1>Bienvenue,</h1> <h1 class="pseudo"><?php echo $pseudo; ?> </h1> <h1>!</h1>

    <nav>
        <ul>
            <li><a href="acceuil.php">Accueil</a></li>
            <li><a href="new-tweet.php">Nouveau Tweet</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>

<main>

    
    <section>
        <form action="" method="GET">
            <input type="search" name="q" placeholder="Recherche...">
            <input class="btnrech" type="submit" value="Rechercher">
        </form>

        <section>
        <form action="traitement_tweet.php" method="post">
            <label for="tweet_content">Votre tweet :</label>
            <textarea placeholder="Quoi de neuf ?!" name="tweet_content" id="tweet_content" cols="30" rows="5"></textarea>
            <button class="btnform" type="submit">Publier</button>
        </form>

        <h2>Derniers Tweets</h2>
        <ul class="tweet">
            <?php

//Requête SQL pour récupérer tous les tweets (barre de recherche)

            require 'database.php';

            if(isset($_GET['q']) && !empty($_GET['q'])) {
                $search_query = $_GET['q'];
                    $tweets = $database->prepare("SELECT tweet.id, tweet.user_id, user.pseudo, user.email, tweet.content, tweet.creea
                FROM tweet
                JOIN user ON tweet.user_id = user.id
                WHERE tweet.content LIKE ? OR user.pseudo LIKE ?
                ORDER BY tweet.creea DESC");
                $tweets->execute(["%$search_query%", "%$search_query%"]);
            } else {
                $tweets = $database->query("SELECT tweet.id, tweet.user_id, user.pseudo, user.email, tweet.content, tweet.creea
                FROM tweet
                JOIN user ON tweet.user_id = user.id
                ORDER BY tweet.creea DESC");
            }

//permet d'afficher les tweets dans un tableau

            foreach ($tweets as $tweet) {
                echo '<li class= "twt">';
                echo '<span class="pseudo1">' . $tweet['pseudo'] . '</span>'; 
                echo '<span class="date">' . date_format(date_create($tweet['creea']), 'd F Y \à H:i') . '</span>';
                echo '<p>' . $tweet['content'] . '</p>';

//permet de supprimer un tweet
                
                if ($tweet['user_id'] == $_SESSION['user_id']) {
                    echo '<form action="delete.php" method="POST">';
                    echo '<input type="hidden" name="tweetid" value="' . $tweet['id'] . '">';
                    echo '<button type="submit" class="button_secondary">Supprimer</button>';
                    echo '</form>';
                }
                
                echo '</li>';
            }
            ?>
        </ul>
    </section>
</main>

<footer>
    <p>&copy; 2024 Twitter. Tous droits réservés.</p>
</footer>
</body>
</html>
