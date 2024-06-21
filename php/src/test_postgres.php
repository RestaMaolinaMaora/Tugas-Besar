<?php
$host = "postgres";
$port = "5432";
$dbname = "apotek";
$user = "postgres";
$password = "mysecretpassword";

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
} 
echo "Connected successfully to PostgreSQL";
pg_close($conn);
?>
