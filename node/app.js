const express = require('express');
const mysql = require('mysql');
const redis = require('redis');
const { Client } = require('pg');

const app = express();
const port = 3000;

app.use(express.json());
// Konfigurasi MySQL
const mysqlConn = mysql.createConnection({
  host: 'mysql-master',
  user: 'root',
  password: 'rootpassword',
  database: 'apotek'
});

mysqlConn.connect(err => {
  if (err) {
    console.error('MySQL connection failed: ' + err.stack);
    return;
  }
  console.log('Connected to MySQL as id ' + mysqlConn.threadId);
});

// Konfigurasi Redis
const redisClient = redis.createClient({
  host: 'redis',
  port: 6379
});

redisClient.on('connect', () => {
  console.log('Connected to Redis');
});

// Konfigurasi PostgreSQL
const pgClient = new Client({
  host: 'postgres',
  port: 5432,
  user: 'postgres',
  password: 'mysecretpassword',
  database: 'apotek'
});

pgClient.connect(err => {
  if (err) {
    console.error('PostgreSQL connection failed:', err);
  } else {
    console.log('Connected to PostgreSQL');
  }
});

app.get('/', (req, res) => {
  res.send('Hello, World!');
});

app.listen(port, () => {
  console.log(`App running on port ${port}`);
});
