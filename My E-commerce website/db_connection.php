<?php
//connection to the MySQL database
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$database = "powerguard_data"; 

// Creating connection
$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>