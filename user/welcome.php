<?php
// start the session
// session_start();

// // check if the user is logged in


session_start();

if (!isset($_SESSION['userid'])) {
    // redirect to the login page
    header('Location: login.html');
    exit;
}
$value = 0;

if (isset($_SESSION["login_error"])) {
    $value = $_SESSION["login_error"];
    // will output "hello"
} else {
    $value = 0;
    header('Location: debug.html');
}

// get the user information from the session variables
$userid = $_SESSION['userid'];
$userpsw = $_SESSION['userpsw'];
$userpsw_au = $_SESSION['userpsw_au'];

echo "<p>value: $value<br></p>";
if ($value) {
    echo "<p>Fail<br></p>";
} else {
    echo "<p>Succeed<br></p>";
}

// display the user information
echo "<p>User ID: $userid!</p>";
echo "<p>User Password: $userpsw!</p>";
echo "<p>User Real Password:  $userpsw_au!</p>";
echo "<p>end</p>"



// perform other actions that require authentication here
?>
