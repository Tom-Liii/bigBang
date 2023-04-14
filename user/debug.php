<?php
session_start();
$de_useid = $_SESSION['temp_userid'];
$de_usename = $_SESSION['temp_username'];
$de_userpsw = $_SESSION['temp_userpsw'];


echo "Userid: " . $de_useid . "<br>";
echo "Username: " . $de_usename . "<br>";
echo "Password: " . $de_userpsw . "<br>";
?>
