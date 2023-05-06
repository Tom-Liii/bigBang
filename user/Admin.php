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
      <form class="admin">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-fill-gear center" viewBox="0 0 16 16">
          <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
        </svg>
        <br>
        <label class="name">Admin</label><br><br>
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

        // Display the users in a table
        echo "<table class=\"table\">";
        echo "<thead><tr><th scope=\"col\">Account ID</th><th scope=\"col\">User Name</th><th scope=\"col\">Last Online</th><th scope=\"col\"></th></tr></thead>";
        
        // Loop through the results and display each user in a row of the table
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if ($row['userid'] < 100) { // for admin user account
                echo "<tr><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . $row['login_t'] . "</td></tr>";
                continue;
              }
              if (is_null($row['login_t'])) { // for user don't have login time
                echo "<tr><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . "N. A." . "</td><td><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#b41d12\" class=\"bi bi-trash\"
                viewBox=\"0 0 16 16\" onclick=\"location.href='delete_user.php?userid=".$row['userid']."';\" >
                <path
                  d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z\" />
                <path
                  d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z\" />
              </svg></td></tr>";
              } else { // for user have login time
                echo "<tr><td>" . $row['userid'] . "</td><td>" . $row['username'] . "</td><td>" . $row['login_t'] . "</td><td><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#b41d12\" class=\"bi bi-trash\"
                viewBox=\"0 0 16 16\" onclick=\"location.href='delete_user.php?userid=".$row['userid']."';\">
                <path
                  d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z\" />
                <path
                  d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z\" />
              </svg></td></tr>";
              }
                // $rows .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
            }
        } else { // If no users exist with the given credentials display an error message
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
