<?php

/** @var $db */
/** @var $users */

require_once "includes/database.php";

//Variables
$firstname = "firstname";
$lastname = "lastname";
$email = "email";
$phone = "phone";
$date = "date";
$time = "time";

    if (empty($errors)) {

        $query = "UPDATE reservation.users  SET firstname = '$firstname', lastname = '$lastname',
        email = '$email', phone = '$phone', date = '$date', time ='$time'  WHERE id = '$users'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: read.php');
            exit;
        } else {
            $errors[] = 'Er is een fout opgetreden met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }
    }

    else if (isset($_GET['id'])) {
    $users = $_GET['id'];

    $query = "SELECT * FROM reservation.users WHERE id = " . mysqli_escape_string($db, $users);
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $users = mysqli_fetch_assoc($result);
    } else {
        header('Location: read.php');
        exit;
    }
    } else {
        header('Location: read.php');
        exit;
    }

// Close db connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rami's Afspraken</title>
        <link   rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<h1>Wijzig afspraak</h1>
<form action="" method="post">
    <div>
        <label for="firstname">Voornaam:</label>
        <input id="firstname" type="text" name="firstname" value="<?= htmlentities($users['firstname']) ?>"/>
        <span class="errors"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
    </div>
    <div>
        <label for="lastname">Achternaam:</label>
        <input id="lastname" type="text" name="lastname" value="<?= htmlentities($users['lastname']) ?>"/>
        <span class="errors"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
    </div>
    <div>
        <label for="email">E-mailadres:</label>
        <input id="email" type="text" name="email" value="<?= htmlentities($users['email']) ?>"/>
        <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="phone">Telefoon:</label>
        <input id="phone" type="text" name="phone" value="<?= htmlentities($users['phone']) ?>"/>
        <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
    </div>
    <div>
        <label for="date">Datum:</label>
        <input id="date" type="text" name="date" value="<?= htmlentities($users['date']) ?>"/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>
    <div>
        <label for="time">Tijd:</label>
        <input id="time" type="text" name="time" value="<?= htmlentities($users['time']) ?>"/>
        <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
    </div>
    <div>
        <input type="hidden" name="id" value="<?=$users?>"/>
        <input type="submit" name="submit" value="Opslaan"/>
    </div>
</form>

</body>
</html>
