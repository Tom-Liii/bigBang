<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="ChangeName.css">
    <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <title>bigBang</title>
    <script>
      function getURLParameter(paramName) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(paramName);
      }
      const userid = getURLParameter('userid');
      const username = getURLParameter('username');

      console.log('User name: ', username);
      console.log('User id: ', userid);
    </script>
</head>

<body>
<div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form has been submitted
    $uid = $_GET['userid'];
    session_start();
    $uname = $_SESSION['uname'];
    echo $mySessionVar;
    $name = $_POST['accName'];
    echo "Username: ".$name."\n";
    echo "Userid: ".$uid."\n";
    // $email = $_POST['email'];
    // Process the data as needed
    // ...
    include 'dbconfig.php';

    $name = mysqli_real_escape_string($conn, $name);

    try {
        // $sql = "DELETE FROM users WHERE userid = $uid_delete;";
        $update_name = "UPDATE users SET username = '$name' WHERE userid = $uid";
        if ($conn->query($update_name) === True) {
          echo "Succeed";
          header('Location: ChangeName.php?userid='. urlencode($uid) .'&username_changed=1&username='.$update_name);
        }
    } catch (Exception $e) {
      if (mysqli_errno($conn) == 1062) {
        // handle duplicate entry error
        // display error message to user or redirect to appropriate page
        header('Location: ChangeName.php?userid='. urlencode($uid) .'&duplicate_name=1&username='.$name);
    } 
    echo "Fail";
    echo "mysql error no.: ".mysqli_errno($conn);
    }
}
?>
<form method="post">
    <img src="ChangeName.png" alt="ChangeName"></img><br>
    <label class="accName">Please enter your new account name</label>
    <br> <br>
    <input type="text" placeholder="" name="accName" id="oldName" minlength="1" maxlength="16" required>


    <button type="submit" class="btn">Save</button>
    <button type="button" class="b" onclick="document.location='StartPage.html?userid=' + userid + '&username='+username">Back</button>
    <br><br> 
 
    <br>
</form>
<div id="toast">Duplicate Name!</div>
<div id="changed">Your name is changed!</div>
</div>
<script>
      function getURLParameter(paramName) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(paramName);
      }
      const url_userid = getURLParameter('username_changed');
      const url_duplicate_name = getURLParameter('duplicate_name');

      if (url_duplicate_name){
        toastFunction();
      }

      if (url_userid){
        changedFunction();
      }

      console.log('User id: ', url_userid);

      function toastFunction() {
        var x = document.getElementById("toast");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      }

      function changedFunction(){
        var y = document.getElementById("changed");
        y.className = "show";
        setTimeout(function(){ y.className = y.className.replace("show", ""); }, 5000);
      }
    
    function getURLParameter(paramName) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(paramName);
    }
    const userid = getURLParameter('userid');
    console.log('User id: ', userid);
    const username = getURLParameter('username');
</script>
</body>
</html>
