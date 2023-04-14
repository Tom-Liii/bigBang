<?php
include 'dbconfig.php';
// start a user session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    $userid = $_POST['userid'];
    $userpsw = $_POST['userpsw'];

    $authentification = false;

    $stmt = $conn->prepare("SELECT userpsw FROM users WHERE userid = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    // get the result of the query
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $username = $row['username'];
    if (1) {
        if (!strcmp($row['userpsw'], $userpsw)) {
            $authentification = true;
            
            $update_login_t = "UPDATE users SET login_t = NOW() WHERE userid = $userid";
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
        if ($userid <= 99999) {
            header('Location: Admin.php?userid='.urlencode($userid));
        }
        else{
            header('Location: StartPage.html?userid='.urlencode($userid).'&username='.urlencode($row['userpsw']));
        }
        exit;
    } else {
        // echo "<p style='color: red'>Authentication failed. Please try again.</p>";
        // $_SESSION['login_error'] = 1;
        header('Location: Login.html?login_error=1');
        
        // header('Location: welcome.php');
        exit;
    }
}    
?>