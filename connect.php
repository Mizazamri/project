<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_bloodlink";

$conn = new mysqli("localhost", "bloodlink", "1234", "project_bloodlink");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>