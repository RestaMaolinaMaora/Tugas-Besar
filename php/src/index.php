<?php
// Konfigurasi MySQL
$mysql_host = 'mysql-master';
$mysql_user = 'root';
$mysql_pass = 'rootpassword';
$mysql_db = 'apotek';

$mysql_conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if ($mysql_conn->connect_error) {
    die("MySQL Connection failed: " . $mysql_conn->connect_error);
}
echo "Connected to MySQL successfully!<br>";

// Konfigurasi Redis
$redis_host = 'redis';
$redis_port = 6379;

$redis = new Redis();
$redis->connect($redis_host, $redis_port);
if ($redis->ping()) {
    echo "Connected to Redis successfully!<br>";
}

// Konfigurasi PostgreSQL
$pgsql_host = 'postgres';
$pgsql_port = 5432;
$pgsql_db = 'apotek';
$pgsql_user = 'postgres';
$pgsql_pass = 'mysecretpassword';

$pgsql_conn = pg_connect("host=$pgsql_host port=$pgsql_port dbname=$pgsql_db user=$pgsql_user password=$pgsql_pass");
if (!$pgsql_conn) {
    die("PostgreSQL Connection failed: " . pg_last_error());
}
echo "Connected to PostgreSQL successfully!<br>";
?>
