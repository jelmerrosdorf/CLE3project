<?php

/** @var $db */
require_once "includes/database.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $errors = [];
    if (empty($firstname)) {
        $errors[] = 'Het veldnaam met "Voornaam" mag niet leeg zijn.';
    }
    if (empty($lastname)) {
        $errors[] = 'Het veldnaam met "Achternaam" mag niet leeg zijn.';
    }
    if (empty($email)) {
        $errors[] = 'Het veldnaam met "Email" mag niet leeg zijn.';
    }
    if (empty($phone)) {
        $errors[] = 'Het veldnaam met "Telefoon" mag niet leeg zijn.';
    }
    if (empty($date)) {
        $errors[] = 'Het veldnaam met "Datum" mag niet leeg zijn.';
    }
    if (empty($time)) {
        $errors[] = 'Het veldnaam met "Tijd" mag niet leeg zijn.';
    }

    if (empty($errors)){


        $query = "INSERT INTO users (firstname, lastname, email, phone, date, time)
                  VALUES ('$firstname', '$lastname', '$email', '$phone', '$date', '$time')";
        $result = mysqli_query($db, $query);


        if ($result) {
            header("Location: /hrfiles/CLE2-project-ramie/confirmation.php?firstname=$firstname&lastname=$lastname&email=$email&phone=$phone&date=$date&time=$time");
            exit;
        } else {


            // To control if there is an error, without sending it to the user.
            die(mysqli_error($db));
        }

        // Close the db connection
        mysqli_close($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rami's Kapsalon</title>
    <link   rel="stylesheet" href="css/stylesheet.css">

</head>

<header></header>

<body>
<nav>
    <a href="home.php"><div>Home</div></a>
    <a href="appointment.php"><div>Afspraak</div></a>
    <a href="prices.php"><div>Tarieven</div></a>
    <a href="contact.php"><div>Contact</div></a>
    <a href="login.php"><div>Login</div></a>
</nav>

<main>
    <section>
        <div class=" user-login">
        <h1>Afspraak maken</h1><br>
            <?php if(isset($errors)) { ?>

                <ul class="errors">
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>

            <form action="" method="post">

            <div><label for="firstname">Voornaam:</label>
            <input type="text" id="firstname" name="firstname" value="<?php if (isset($firstname)) { echo $firstname; } ?>"/></div>

            <div><label for="middlename">Tussenvoegsel:</label>
            <input type="text" id="middlename" name="middlename"></div>

            <div><label for="lastname">Achternaam:</label>
            <input type="text" id="lastname" name="lastname" value="<?php if (isset($lastname)) { echo $lastname; } ?>"/></div>

            <div><label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($email)) { echo $email; } ?>"/></div>

            <div><label for="phone">Telefoon:</label>
            <input type="text" id="phone" name="phone" value="<?php if (isset($phone)) { echo $phone; } ?>"/></div>

            <div><label for="date">Datum:</label>
            <input type="date" id="date" name="date" min="2021-01-01" max="2025-12-31" value="<?php if (isset($date)) { echo $date; } ?>"/></div>>

            <div><label for="time">Tijd:</label>
                <input type="time" id="time" name="time" value="<?php if (isset($time)) { echo $time; } ?>"/></div>

            <div> <input type="submit" name="submit" value="Submit"/></div>

        </form>
        </div>
    </section>

    <section>
    <h1>Gallery</h1><br>
        <div class="img-slider">
            <div class="img-container">
            <div class="slide active">
                <img src="images/gallery-pic1.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic2.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic3.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic4.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic5.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

                <div class="slide">
                <img src="images/gallery-pic6.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

                <div class="slide">
                <img src="images/gallery-pic7.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic8.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

                <div class="slide">
                <img src="images/gallery-pic9.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic10.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic11.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

            <div class="slide">
                <img src="images/gallery-pic12.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>

                <div class="slide">
                <img src="images/gallery-pic13.jpeg" alt="">
                <div class="info">
                    <h2></h2>
                </div>
            </div>
            </div>

            <div class="navigation">
                <div class="btn active"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
            </div>
        </div>
    </section>

</main>
<script src="./js/imageslider.js"></script>
</body>
<footer>
    <a href="#">Twitter</a> | <a href="https://www.instagram.com/ramiskapsalon/?hl=nl">Instagram</a> | <a href="https://www.facebook.com/ramiskapsalon/">Facebook</a>
</footer>
</html>