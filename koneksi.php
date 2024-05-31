<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_sepatu";
$port = 3300;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>