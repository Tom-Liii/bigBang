<?php

include 'dbconfig.php';


$userid = $_POST['userid'];
$game_record = $_POST['game_record'];
$start_time = $_POST['start_time'];
$elapsed_time = $_POST['elapsed_time'];
$win_status = $_POST['win_status'];

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
if ($conn->query($sql) === TRUE) {
	    echo "Data inserted successfully!";
} else {
	    echo "Error inserting data: " . mysqli_error($conn);
}

// close connection
$conn->close();
?>

