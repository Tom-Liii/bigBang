<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="icon.png">
  <link rel="stylesheet" href="Admin.css">
  <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
  <title>bigBang</title>
</head>

<body>
  <div class="bg">
    <br>
    <div class="styling">
      <form action="/action_page.php" class="admin">
        <img src="admin.png" alt="admin"></img><br>
        <label class="name">ADMIN1</label><br><br>
        <label class="acc">Account: admin11111</label><br>
        <hr class="line">
        <label class="display" onclick="document.location='Change.html'"> CHANGE NAME<br><br><br></label>
        <label class="logout" onclick="document.location='Welcome.html'"> LOGOUT
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-box-arrow-right" viewBox="0 0 16 12">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
          </svg>
        </label>
      </form>
      <form class="container">
      
      <?php
        // Include the database configuration file
        include('dbconfig.php');

        
        // Query the database for all users
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        echo "<table class=\"table\">";
        echo "<thead><tr><th scope=\"col\">Account ID</th><th scope=\"col\">User Name</th><th scope=\"col\">Last Online</th></tr></thead>";
        // Loop through the results and display each user in a row of the table
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . $row['login_t'] . "</td></tr>";
                // $rows .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found.</td></tr>";
        }
        echo "</table>";
        // echo $rows;
        // Close the database connection
        mysqli_close($conn);
    ?>
    </form>
    </div>
  </div>
</body>
</html>
