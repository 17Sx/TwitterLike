<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="acceuil.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="acceuil.php">Accueil</a></li>
            <li><a href="new-tweet.php">Nouveau Tweet</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>

<form action="traitement_tweet.php" method="post">
            <label for="tweet_content">Votre tweet :</label>
            <textarea placeholder="Quoi de neuf ?!" name="tweet_content" id="tweet_content" cols="30" rows="5"></textarea>
            <button class="btnform" type="submit">Publier</button>
        </form>
</body>
</html> 