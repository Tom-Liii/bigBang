<?php
session_start();
// generate userid
$userid_n = rand(100000, 999999);
$username_n = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$userpsw_n = filter_input(INPUT_POST, 'userpsw', FILTER_SANITIZE_STRING);
$checkpsw_n = filter_input(INPUT_POST, 'checkpsw', FILTER_SANITIZE_STRING);

$_SESSION['temp_userid'] = $userid_n;
$_SESSION['temp_username'] = $username_n;
$_SESSION['temp_userpsw'] = $userpsw_n;



require_once('dbconfig.php');
$userid_n = mysqli_real_escape_string($conn, $userid_n);
$username_n = mysqli_real_escape_string($conn, $username_n);
$userpsw_n = mysqli_real_escape_string($conn, $userpsw_n);
try {
    $sql = "INSERT INTO users (userid, username, userpsw) VALUES ('$userid_n', '$username_n', '$userpsw_n')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        header('Location: SignUp.html?userid=' . urlencode($userid_n));
    } 
} catch (Exception $e) {
    if (mysqli_errno($conn) == 1062) {
        // handle duplicate entry error
        // display error message to user or redirect to appropriate page
        header('Location: SignUp.html?duplicate_name=1');
    } 
}


$conn->close();


?>