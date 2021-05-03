<?php

//$database = file("database.txt");


//$username = file("database.txt")[0];
//$password = file("database.txt")[1];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transerve";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  
?>