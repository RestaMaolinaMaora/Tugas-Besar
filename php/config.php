<?php
//mysql connection
$servername = "mysql-master";
$username = "root";
$password = "rootpassword";
$dbname = "apotek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//redis connection
$redis = new Redis();
$redis->connect('redis', 6379);

if ($redis->ping()) {
  echo "Connected to Redis!";
} else {
  echo "Redis connection failed!";
}

//postgreSQL connection
$host = "postgres";
$dbname = "apotek";
$user = "postgres";
$password = "postgrespassword";

$conn_pg = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn_pg) {
  die("Connection failed: " . pg_last_error());
}
echo "Connected to PostgreSQL!";
?>
