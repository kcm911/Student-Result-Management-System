<?php
session_start();
$host = "localhost";
$user = "root";
$passwd = "";
$database = "projectdb";
$table_name = "teacherlogin";

$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];  
    $password = $_POST['password'];

    $sql = "select * from $table_name where username = '".$username."' AND password = '".$password."'";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result); 

    echo "<div class=pborder>";              
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter both Username and password.');</script>";
    } elseif ($count == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo '<script>alert("Login failed. Invalid username or password")</script>';
    }
    
    echo "</div>";     
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel="stylesheet" href="tlogin.css">
    <link rel="stylesheet" href= "nav.css">
</head>
<body>
<nav>
        <div class="logo">
          <a href="#">Student Result Management System</a>
        </div>
        <ul class="menu">
          <li><a href="main.php">Home</a></li>
          <li><a href="studentresultsearch.php">Student</a></li>
          <li><a href="teacherlogin.php ">Teacher</a></li>
        </ul>
      </nav>
    <div class="container">
        <h1>Teacher Login</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="user" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
            </div>
            <button type="submit">Login</button>
            <input type="checkbox" onclick="myFunction()">Show Password

            <script>
                function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </form>
    </div>
</body>
</html>
