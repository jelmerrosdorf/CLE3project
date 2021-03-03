<?php

echo "CLE 3 Project";

?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <a href="index.php"></a>

</head>

<header></header>
<body>


<main>
    <section>
        <div class="user-login">
            <h1>Inloggen</h1>
            <form action="index.php" method="post">
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="test12345@mail.com" required>
                </div>

                <div>
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" required>
                </div>

                <p>
                    Nog geen account? Maak <a style="color: black" href="aanmelden.html"><u>hier</u></a> een account aan.
                </p>

                <div>
                    <button type="submit"> Inloggen</button>
                </div>
            </form>
        </div>
    </section>


</main>
<footer>
     <a href="https://bird-rotterdam.nl/">BIRD Home page</a><br>
     <a href="https://twitter.com/Bird_Rdam">Twitter</a> | <a href="https://www.instagram.com/birdrotterdam/">Instagram</a> | <a href="https://www.facebook.com/BIRDrotterdam">Facebook</a>
</footer>


</body>
</html>