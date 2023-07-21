
<?php

ini_set('display_errors', 1);

$servername = "localhost";
$username = "lizard";
$password = "adidas88";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);
  
}

echo "Connected successfully";

?>


