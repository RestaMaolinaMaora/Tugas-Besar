<?php
$servername = "mysql-master";
$username = "root";
$password = "rootpassword";
$dbname = "apotek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully to MySQL";
$conn->close();
?>
