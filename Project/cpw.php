<?php
session_start();
$host = "localhost";
$user = "root";
$passwd = "";
$database = "projectdb";
$table_name = "teacherlogin";

$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

if(isset($_POST["update"]))
{
  $tid = $_POST['uname'];
  $opw = $_POST['oldpw'];
  $npw = $_POST['newpw'];
  $cpw = $_POST['cpw'];

  // Check if the username and old password are correct
  $sql = "SELECT * FROM $table_name WHERE username = '$tid' AND password = '$opw'";
  $result = mysqli_query($connect, $sql);
  $count = mysqli_num_rows($result);

  if($count == 1) {
    // Username and old password are correct, check the new password and confirm new password
    if($npw == $cpw) {
      // New password and confirm new password match, update the password in the database
      $query = "UPDATE $table_name SET password = '$npw' WHERE username = '$tid'";
      mysqli_query($connect, $query);
      echo "<script>alert('Password Changed Successfully');</script>";
    } else {
      echo "<script>alert('New password and confirm new password do not match');</script>";
     
    }
  } else {
    echo "<script>alert('Invalid username or password');</script>";
   
  }
}
?>