<?php
include_once 'dbc.php';

$classname = $_POST['classname'];
$classid = $_POST['classid'];

if(isset($_POST["add"]))
{
    // Check if class ID and name are not empty
    if(empty($classid) || empty($classname)){
        echo "<script>alert('Please enter both Class ID and Class name.');</script>";
    }
    
    // Check if Class ID already exists in the database
    else {
        $sql = "SELECT * FROM class WHERE Class_ID='$classid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            echo "<script>alert('Class ID already taken. Please enter a different ID.');</script>";
        }
        
        // Insert new Class into the database
        else {
            $sql = "INSERT INTO class (Class_ID, Class_Name) VALUES ('$classid', '$classname')";
            mysqli_query($conn, $sql);
            header("Location:class.php");
        }
    }
}
else if(isset($_POST["delete"]))
{
    // Check if Class ID and name are not empty
    if(empty($classid) || empty($classname)){
        echo "<script>alert('Please enter both Class ID and Class name.');</script>";
    }
    
    // Delete class from the database
    else {
        $sql = "DELETE FROM class WHERE Class_ID='".$classid."' AND Class_Name='".$classname."'";
        mysqli_query($conn, $sql);
        header("Location:class.php");
    }
}
else if(isset($_POST["update"]))
{
    // Check if class ID and name are not empty
    if(empty($classid) || empty($classname)){
        echo "<script>alert('Please enter both class ID and class name.');</script>";
    }
    
    // Update class name in the database
    else {
        $sql = "UPDATE class SET Class_Name='".$classname."' WHERE Class_ID='".$classid."'";
        mysqli_query($conn, $sql);
        header("Location:class.php");
    }
}
?>
