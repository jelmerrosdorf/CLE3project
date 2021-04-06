<?php
// this is the update page. Here you can edit your credentials if you've already made an account.

//fixed undefined variables
/** @var $db */
/** @var $users */

//require the database
require_once "includes/database.php";

//Variables for credentials. Mysqli function to add security
$firstname = mysqli_escape_string($db, $_POST['firstname']);
$surname = mysqli_escape_string($db, $_POST['surname']);
$email = mysqli_escape_string($db, $_POST['email']);
$password = mysqli_escape_string($db, $_POST['password']);

//if there are no errors...
    if (empty($errors)) {

        //set query to update credentials into database
        $query = "UPDATE myvrchat.users  SET firstname = '$firstname', surname = '$surname',
        email = '$email', password = '$password'  WHERE id = '$users'";
        $result = mysqli_query($db, $query);

        //When everything is in order, go back to read
        if ($result) {
            header('Location: read.php');
            echo "The account has been updated";
            exit;
        } else {
            $errors[] = 'Er is een fout opgetreden met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }
    }

    // otherwise if id is set, get id
    else if (isset($_GET['id'])) {
    $users = $_GET['id'];

    // Select all data from user with set id
    $query = "SELECT * FROM myvrchat.users WHERE id = " . mysqli_escape_string($db, $users);
    $result = mysqli_query($db, $query);

    //if the result is 1 row, fetch the array with data
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
        <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Edit account</h1>

<form action="" method="post">
    <div id="register">
        <label for="firstname">Name:</label>
        <input id="firstname" type="text" name="firstname" value="<?= htmlentities($users['firstname']) ?>"/>
        <span class="errors"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
    </div>
    <div>
        <label for="lastname">Surname:</label>
        <input id="lastname" type="text" name="lastname" value="<?= htmlentities($users['surname']) ?>"/>
        <span class="errors"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
    </div>
    <div>
        <label for="email">Email:</label>
        <input id="email" type="text" name="email" value="<?= htmlentities($users['email']) ?>"/>
        <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="pwd">Password:</label>
        <input id="phone" type="text" name="phone" value="<?= htmlentities($users['password']) ?>"/>
        <span class="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
    </div>
    <div>
        <input type="hidden" name="id" value="<?=$users?>"/>
        <input type="submit" name="submit" value="Opslaan"/>
    </div>
</form>

</body>
</html>
