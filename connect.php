<?php
$servername = "localhost";
$username = "bloodlink";
$password = "1234";
$dbname = "project_bloodlink";

$conn = new mysqli("localhost", "bloodlink", "1234", "project_bloodlink", 3307);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>