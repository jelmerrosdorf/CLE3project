<?php
// defined variables
/** @var $db */
/** @var $account */

// require database
require_once "includes/database.php";

// if 'Submit' is pressed
if (isset($_POST['submit'])) {

    // delete data where id is the one that got posted
    $query = "DELETE FROM accounts WHERE id = " . mysqli_escape_string($db, $_POST['id']);

    mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

    // Close connection database
    mysqli_close($db);

    // Back to read page after php is executed
    header("Location: read.php");

}
//otherwise...
else if(isset($_GET['id'])) {
    // get the given parameter for id. Set variable
    $accountId = $_GET['id'];

    // Select everything from accounts where id is the earlier defined variable
    $query = "SELECT * FROM accounts WHERE id = " . mysqli_escape_string($db, $accountId);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    if(mysqli_num_rows($result) == 1)
    {
        $account = mysqli_fetch_assoc($result);
    }
    else {
        // Redirect to 'read' page when result is not 1
        header('Location: read.php');
        exit;
    }
} else {
    // this gets executed if id was not present in the url or the form was not submitted
    header('Location: read.php');
    exit;
}
?>