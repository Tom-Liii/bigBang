<?php
include 'dbconfig.php';
// start a user session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    // get parameters from the form
    $userid = $_POST['userid'];
    $userpsw = $_POST['userpsw'];

    $authentification = false;

    $stmt = $conn->prepare("SELECT userpsw, username FROM users WHERE userid = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    // get the result of the query
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $username = $row['username'];
    if (1) {
        if (!strcmp($row['userpsw'], $userpsw)) { // if the password matches
            $authentification = true;
            
            $update_login_t = "UPDATE users SET login_t = NOW() WHERE userid = $userid";
            if ($conn->query($update_login_t) === True) { // if the password matches
                echo "Last login time updated successfully";
            }
            // insert login time into the database
        } else { // if the password does not match
            $authentification = false;
        }
    }
    // store the user id and password in the session
    $_SESSION['userid'] = $userid;
    $_SESSION['userpsw'] = $userpsw;
    $_SESSION['userpsw_au'] = $row['userpsw'];

    $stmt->close();
    
    $conn->close();
    if ($authentification) { // if the user is authenticated
        // header('Location: welcome.php');
        if ($userid <= 99999) { // if the user is an admin
            header('Location: Admin.php?userid='.urlencode($userid));
        }
        else{ // if the user is a normal user
            header('Location: StartPage.html?userid='.urlencode($userid).'&username='.urlencode($username));
        }
        exit;
    } else { // if the user is not authenticated
        // echo "<p style='color: red'>Authentication failed. Please try again.</p>";
        // $_SESSION['login_error'] = 1;
        header('Location: Login.html?login_error=1');
        
        // header('Location: welcome.php');
        exit;
    }
}    
?>
