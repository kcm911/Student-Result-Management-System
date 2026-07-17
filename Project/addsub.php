<?php
include_once 'dbc.php';

$class = $_POST['Class_id'];
$subname = $_POST['subjectname'];
$subid = $_POST['subjectid'];

if(isset($_POST["add"]))
{
    // Check if class id subject ID and name are not empty
    if(empty($subid) || empty($subname) || empty($class)){
        echo "<script>alert('Please enter Class ID,  subject ID and subject name.');</script>";
    }
    
    // Check if subject ID already exists in the database
    else {
        $sql = "SELECT * FROM subject WHERE Subject_ID='$subid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            echo "<script>alert('Subject ID already taken. Please enter a different ID.');</script>";
        }
        
        // Insert new subject into the database
        else {
            $sql = "INSERT INTO subject (Class_ID, Subject_ID, Subject_Name) VALUES ('$class', '$subid', '$subname')";
            mysqli_query($conn, $sql);
            header("Location:subjectadd.php");
        }
    }
}
else if(isset($_POST["delete"]))
{
    // Check if subject ID and name are not empty
    if(empty($subid) || empty($subname) || empty($class)){
        echo "<script>alert('Please enter Class ID,  subject ID and subject name.');</script>";
    }
    
    // Delete subject from the database
    else {
        $sql = "DELETE FROM subject WHERE Subject_ID='".$subid."' AND Subject_Name='".$subname."'";
        mysqli_query($conn, $sql);
        header("Location:subjectadd.php");
    }
}
else if(isset($_POST["update"]))
{
    // Check if subject ID and name are not empty
    if(empty($subid) || empty($subname) || empty($class)){
        echo "<script>alert('Please enter Class ID, subject ID and subject name.');</script>";
    }
    
    // Update subject name in the database
    else {
        $sql = "UPDATE subject SET Subject_Name='".$subname."', Class_ID='".$class."' WHERE Subject_ID='".$subid."'";
        mysqli_query($conn, $sql);
        header("Location:subjectadd.php");
    }
}
?>
