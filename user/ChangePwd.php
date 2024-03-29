<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="ChangePwd.css">
    <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <title>bigBang</title>
    <script>
      function getURLParameter(paramName) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(paramName);
      }
      const userid = getURLParameter('userid');
      console.log('User id: ', userid);
      const username = getURLParameter('username');
      
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
  $name = $_GET['username'];
  echo $mySessionVar;
  $currentPwd = $_POST['currentPwd'];
  $newPwd = $_POST['newPwd'];
  // $email = $_POST['email'];
  // Process the data as needed
  // ...
  include 'dbconfig.php';
  $newPwd = mysqli_real_escape_string($conn, $newPwd);

  try {
    // verify current password
    $get_pwd = "SELECT userpsw FROM users WHERE userid = $uid";
    $result = $conn->query($get_pwd);
    $row = $result->fetch_assoc();
    $storedPwd = $row['userpsw'];
    
    if ($currentPwd == $storedPwd) { // if current password is correct
      $update_pwd = "UPDATE users SET userpsw = '$newPwd' WHERE userid = $uid";
      if ($conn->query($update_pwd) === True) {
        // echo "Succeed";
        header('Location: ChangePwd.php?userid='. urlencode($uid) .'&success=1&username='.$name);
      }
    } else { // if current password is wrong
      header('Location: ChangePwd.php?userid='. urlencode($uid) .'&wrongpwd=1&username='.$name);
      // echo "Wrong current password!";
    }
  } catch (Exception $e) { // if error
    header('Location: ChangePwd.php?userid='. urlencode($uid) .'&fail=1&username='.$name);   
    // echo "Fail";
    // echo "mysql error no.: ".mysqli_errno($conn);
  }
}
?>
<form method="post">
    <img src="ChangePwd.png" alt="ChangePwd"></img><br>
    
    <label for="currentPwd"> Current Password</label>
    <input type="password" placeholde="" name="currentPwd" id="oldPwd" required>

    <label for="newPwd"> New Password</label>
    <input type="password" placeholder="" name="newPwd" id="newPwd" minlength="8" maxlength="16" required>

    <label for="newPwd2"> Confirm New Password</label>
    <input type="password" placeholder="" name="newPwd2" id="newPwd2" minlength="8" maxlength="16" required>


    <button type="submit" class="btn">Save</button>
    <button type="button" onclick="document.location='StartPage.html?userid='+userid+'&username='+username" class="cancel">Cancel</button>
    <br><br> 
 
    <br>
  </form>
  <div id="toast1">Password changed successfully!</div>
  <div id="toast2">Wrong current password!</div>
  <div id="toast3">Authentication failed. Please check your credentials and try again!</div>
</div>

<script>
  const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the form from submitting
  const pw_old = document.getElementById('oldPwd')
  const pw1 = document.getElementById('newPwd')
  const pw2 = document.getElementById('newPwd2')
  
  if (pw1.value == pw2.value) {
    if (pw_old.value != pw1.value){
      form.submit()
    } else {
    window.alert("New password should be different from old password.")
    pw1.value = ''
    pw2.value = ''
    pw1.style.border = '1px solid red'
    pw2.style.border = '1px solid red'
  } 
  }
  else {
    window.alert("Passwords do not match. Please enter the fields again.")
    pw1.value = ''
    pw2.value = ''
    pw1.style.border = '1px solid red'
    pw2.style.border = '1px solid red'
  }   
});
  // const urlParams = new URLSearchParams(window.location.search);
  const success = getURLParameter('success');
  const wrongpwd = getURLParameter('wrongpwd');
  const fail = getURLParameter('fail');

  if(success){
    toast1Function();
  }
  if(wrongpwd){
    toast2Function();
  }
  if (fail){
    toast3Function();
  }

   function toast1Function() {
    // window.alert("Password have been changed successfully!")
    // var x = document.getElementById("toast1");
    // x.className = "show";
    // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
    var x = document.getElementById("toast1");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      
  }

  function toast2Function() {
    // window.alert("Wrong current password! Please try again!")
    // var y = document.getElementById("toast2");
    // y.className = "show";
    // setTimeout(function(){ y.className = y.className.replace("show", ""); }, 10000);
    var x = document.getElementById("toast2");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      
  }

  function toast3Function() {
    // window.alert("Authentication failed. Please check your credentials and try again!")
    // var z = document.getElementById("toast3");
    // z.className = "show";
    // setTimeout(function(){ z.className = z.className.replace("show", ""); }, 10000);
    var x = document.getElementById("toast3");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      
  }

  </script>
</body>
</html>
