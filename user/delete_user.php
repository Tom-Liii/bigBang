<!-- this is delete_user.php -->
<?php
// file for deleting user from database that is called by Admin.php
$userid_delete = $_GET['userid'];
echo "The value of var is: " . $userid_delete;

include 'dbconfig.php';

$userid_delete = mysqli_real_escape_string($conn, $userid_delete);

try {
    $sql = "DELETE FROM users WHERE userid = $userid_delete;";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        header('Location: Admin.php?delete_user=' . urlencode($userid_delete));
    } 
} catch (Exception $e) { // if there is an error with the query, redirect to the error page
    header('Location: Admin.php?delete_fail=1');
}
?>