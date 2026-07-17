<?php

//Database Configuration 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "projectdb";

//Create Database Connection 
$conn = mysqli_connect($host, $username, $password, $dbname);

//check database connection    
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

