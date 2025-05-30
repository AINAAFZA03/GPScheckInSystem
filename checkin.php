<?php
// Database connection settings
$servername = "localhost";      // Or your MySQL server IP/hostname
$username = "your_mysql_user";  // Your MySQL username
$password = "your_mysql_pass";  // Your MySQL password
$dbname = "checkinsystem";      // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data safely (sanitize inputs)
$user_id = $conn->real_escape_string($_POST['user_id']);
$latitude = floatval($_POST['latitude']);
$longitude = floatval($_POST['longitude']);
$timestamp = $conn->real_escape_string($_POST['timestamp']);

// Insert into database
$sql = "INSERT INTO checkins (user_id, latitude, longitude, timestamp)
        VALUES ('$user_id', $latitude, $longitude, '$timestamp')";

if ($conn->query($sql) === TRUE) {
  echo "Check-in successful!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
