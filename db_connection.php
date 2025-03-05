<?php
// Define the database connection parameters
$servername = "localhost";          // The server where the database is hosted
$username ="root";                  // The username to access the database
$password = "";                     // The password to access the database
$dbname = "task_manager";           // The name of the database 

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error){
    // If the connection fails, display an error message
    die("Connection failed: " . $conn->connect_error);
}

?>