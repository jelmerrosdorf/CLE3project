<?php
/** @var $db */

// DB required
require_once "includes/database.php";

// Get the information from the database
$query = "SELECT * FROM users";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

// Loop through the information and put it in an array
$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

// Close db connection
mysqli_close($db);
?>