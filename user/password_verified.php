<?php
include 'dbconfig.php';
// start a user session
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // if the user is authenticated

    session_start();

    $userid = $_SESSION['userid'];
    $uname = $_SESSION['username'];
    
  
    include 'dbconfig.php';
    $new_pwd = mysqli_real_escape_string($conn, $new_pwd);
    $userid = mysqli_real_escape_string($conn, $userid);
    try { // if there is no error with the query

        $update_pwd = "UPDATE users SET userpsw = '$new_pwd' WHERE userid = $uid'";
        if ($conn->query($update_pwd) === True) { // if the query is successful
          echo "Succeed";
          header('Location: ChangePwd.php?userid='. urlencode($uid) .'&success=1&username='.$uname);
        }else { // if the query is not successful
        header('Location: ChangePwd.php?userid='. urlencode($uid) .'&fail=1&username='.$uname);
        }
    } catch (Exception $e) { // if there is an error with the query, redirect to the error page
        echo "Fail";
        echo "mysql error no.: ".mysqli_errno($conn);
        // handle duplicate entry error
        // display error message to user or redirect to appropriate page
        header('Location: ChangePwd.php?userid='. urlencode($uid) .'&fail=1&username='.$uname);
    
    }
    
}    
?>
