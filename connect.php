<?php
$servername = "localhost:3307";
$username = "root";
$password = "1234";
$dbname = "project_bloodlink";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>