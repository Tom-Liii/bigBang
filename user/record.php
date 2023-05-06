<!DOCTYPE html>

<html>

  <head>

    <title>Send Data to MySQL Database</title>

  </head>

  <body>

    <h1>Send Data to MySQL Database</h1>

    <form method="POST" action="http://34.237.159.19/bigBang/user/record.php">

      <label for="userid">User ID:</label>
      <input type="number" id="userid" name="userid" required><br><br>
      
      <label for="game_record">Game Record:</label>
      <textarea id="game_record" name="game_record" required></textarea><br><br>
      
      <label for="start_time">Start Time:</label>
      <input type="datetime-local" id="start_time" name="start_time" required><br><br>
      
      <label for="elapsed_time">Elapsed Time:</label>
      <input type="number" id="elapsed_time" name="elapsed_time" required><br><br>
      
      <label for="win_status">Win Status:</label>
      <input type="text" id="win_status" name="win_status" required><br><br>


      

      <input type="submit" value="Submit">

    </form>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include 'dbconfig.php';

// get data from POST
$userid = $_POST['userid'];
$game_record = $_POST['game_record'];
$start_time = $_POST['start_time'];
$elapsed_time = $_POST['elapsed_time'];
$win_status = $_POST['win_status'];

// Escape special characters in the data to prevent SQL injection attacks
$userid = mysqli_real_escape_string($conn, $userid);
$game_record = mysqli_real_escape_string($conn, $game_record);
$start_time = mysqli_real_escape_string($conn, $start_time);
$elapsed_time = mysqli_real_escape_string($conn, $elapsed_time);
$win_status = mysqli_real_escape_string($conn, $win_status);

// Print data to the console for debugging
echo "userid<br>";
echo $userid;
echo "<br>game_record<br>";
echo $game_record;
echo "<br>start_time<br>";
echo $start_time;
echo "<br>elapsed_time<br>";
echo $elapsed_time;
echo "<br>win_status<br>";
echo $win_status;
$sql = "INSERT INTO game (userid, game_record, start_time, elapsed_time, win_status) VALUES ('$userid', '$game_record', '$start_time', '$elapsed_time', '$win_status')";

echo "<br>";
if ($conn->query($sql) === TRUE) { // execute query, and record game record to database
     echo "Data inserted successfully!";
} else { // print error message
     echo "Error inserting data: " . mysqli_error($conn);
}

// close connection
$conn->close();
?>
  </body>

</html>
