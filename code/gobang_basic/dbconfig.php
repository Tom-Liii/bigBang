<?php
    $servername = "34.225.43.131";
    $dbusername = "remote";
    $dbpassword = "000000";
    $dbname = "bigbang";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>