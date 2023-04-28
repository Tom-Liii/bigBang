<?php
include 'dbconfig.php';
// start a user session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    $userid = $_SESSION['userid'];
    $uname = $_SESSION['username'];
    
  
    include 'dbconfig.php';
    $new_pwd = mysqli_real_escape_string($conn, $new_pwd);
    $userid = mysqli_real_escape_string($conn, $userid);
    try {
        // $sql = "DELETE FROM users WHERE userid = $uid_delete;";

        $update_pwd = "UPDATE users SET userpsw = '$new_pwd' WHERE userid = $uid'";
        if ($conn->query($update_pwd) === True) {
          echo "Succeed";
          header('Location: ChangePwd.php?userid='. urlencode($uid) .'&success=1&username='.$uname);
        }else {
        header('Location: ChangePwd.php?userid='. urlencode($uid) .'&fail=1&username='.$uname);
        }
    } catch (Exception $e) {
        echo "Fail";
        echo "mysql error no.: ".mysqli_errno($conn);
        // handle duplicate entry error
        // display error message to user or redirect to appropriate page
        header('Location: ChangePwd.php?userid='. urlencode($uid) .'&fail=1');
    
    }
    
}    
?>
