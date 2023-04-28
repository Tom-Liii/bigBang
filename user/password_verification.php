<?php
include 'dbconfig.php';
// start a user session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    $old_psw = $_SESSION['crt_pwd'];
    $userid = $_SESSION['userid'];

    $authentification = false;

    $stmt = $conn->prepare("SELECT userpsw, username FROM users WHERE userid = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    // get the result of the query
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $username = $row['username'];
    if (1) {
        if (!strcmp($row['userpsw'], $userpsw)) {
            $authentification = true;
            
            // $update_login_t = "UPDATE users SET login_t = NOW() WHERE userid = $userid";
            if ($conn->query($update_login_t) === True) {
                echo "Last login time updated successfully";
            }
            // insert login time into the database
        } else {
            $authentification = false;
        }
    }

    $_SESSION['userid'] = $userid;
    $_SESSION['userpsw'] = $userpsw;
    $_SESSION['userpsw_au'] = $row['userpsw'];

    $stmt->close();
    
    $conn->close();
    if ($authentification) {
        // header('Location: welcome.php');
        
        // header('Location: .html?userid='.urlencode($userid).'&username='.urlencode($username));
        header('Location: ChangePwd.php?userid='. urlencode($userid) .'&auth=1&username='.urlencode($username));
        exit;
    } else {
        // echo "<p style='color: red'>Authentication failed. Please try again.</p>";
        // $_SESSION['login_error'] = 1;
        // header('Location: Login.html?login_error=1');
        header('Location: ChangePwd.php?userid='. urlencode($userid) .'&wrongpwd=1'.'&username='.urlencode($username));
        // header('Location: welcome.php');
        exit;
    }
}    
?>
