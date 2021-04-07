<?php

//Create page. Here you can register for an account.

// fix undefined variable
/** @var $db */

//require the database
require_once "includes/database.php";

//if submit is pressed
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // array for errors
    $errors = [];
    if (empty($firstname)) {
        $errors[] = 'First name is required.';
    }
    if (empty($surname)) {
        $errors[] = 'Surname is required.';
    }
    if (empty($email)) {
        $errors[] = 'Email is required.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    //if there are no errors, post to the database
    if (empty($errors)){


        $query = "INSERT INTO myvrchat.users (firstname, surname, email, password)
                  VALUES ('$firstname', '$surname', '$email', '$password')";
        $result = mysqli_query($db, $query);


        if ($result) {
            header("Location: /hrfiles/CLE3-project-website/read.php?firstname=$firstname&surname=$surname&email=$email&password=$password");
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
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>

<header>
    <nav>
        <div class="dropdown">
            <img src="https://res.cloudinary.com/yungdorf/image/upload/v1617715167/dropdownmenu_g4qw1b.png">
            <div class="dropdown-content">
                <a href="slideshow.php">Album Collection</a>
                <a href="register.php">Register</a>
                <a href="https://bird-rotterdam.nl/support-bird/">Donate</a>
                <a href="#donate">Contact</a>
            </div>
        </div>
    </nav>
    <h1>VR Chatroom BIRD Rotterdam</h1>
</header>

<main>
    <section>
        <div id="register">
        <h1>Make your account</h1><br>
            <?php if(isset($errors)) { ?>

                <ul class="errors">
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>

            <form action="" method="post">

            <div><label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php if (isset($firstname)) { echo $firstname; } ?>"/></div>

            <div><label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="<?php if (isset($surname)) { echo $surname; } ?>"/></div>

            <div><label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($email)) { echo $email; } ?>"/></div>

                <div><label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php if (isset($password)) { echo $password; } ?>"/></div>

                <div> <input type="submit" name="submit" value="Submit"/></div>

        </form>
        </div>
    </section>
</html>