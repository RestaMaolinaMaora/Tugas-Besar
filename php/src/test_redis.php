<?php
$redis = new Redis();
$redis->connect('redis', 6379);

if ($redis->ping()) {
    echo "Connected successfully to Redis";
} else {
    echo "Connection failed to Redis";
}
?>
