<?php
// Database configuration
$host = "localhost";
$dbName = "hoteling_db";
$username = "root";
$password = "";

// Create a new connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}