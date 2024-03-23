    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>


    <h2>S'enregistrer </h2>
        <form action="database.php" method="POST">
            <input type="hidden" name="form" value="ajout">


            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" id="pseudo">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <label for="password">Password</label>
            <input type="text" name="password" id="password">

            <button type="submit">Envoyer</button>

            

        </form>





    </body>


    </html>