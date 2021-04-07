<?php
/** @var $db */

// DB required
require_once "includes/database.php";

// SELECT query. get information from the table
$query = "SELECT * FROM myvrchat.users";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

// set empty array for accounts.
$accounts= [];

// fill in the accounts array with information through a loop
while ($row = mysqli_fetch_assoc($result)) {
    $accounts[] = $row;
}

// close connection with database
mysqli_close($db);
?>

<!doctype html>
<html lang="nl">
<head>
    <title>BIRD User Accounts</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Surname</th>
        <th>E-mail</th>
        <th>Password</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($accounts as $account) { ?>
        <tr>
            <td><?= $account['id'] ?></td>
            <td><?= $account['firstname'] ?></td>
            <td><?= $account['surname'] ?></td>
            <td><?= $account['email'] ?></td>
            <td><?= $account['password'] ?></td>
            <td><a href="delete.php?id=<?= $account['id'] ?>">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<br><a href="homepage.php">Back</a>
</body>
</html>

