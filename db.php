<?php
$servername = "localhost";
$username = "root";  // Assuming the default MySQL username is root
$password = "";      // Assuming no password is set for root in your case
$dbname = "spirit11"; // Your database name
$port = "4306";      // Port you are using for MySQL

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
