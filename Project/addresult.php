<?php
include_once 'dbc.php';

$classid = $_POST['classid'];
$studentid = $_POST['studentid'];
$subjectid = $_POST['subjectid'];
$marks = $_POST['result'];

if(isset($_POST["add"]))
{
    // Check if class id subject ID and name are not empty
    if(empty($classid) || empty($studentid) || empty($subjectid)){
        echo "<script>alert('Please enter Class ID,  subject ID and subject name.');</script>";
    }
        
    // Insert new subject into the database
    else {
        $sql = "INSERT INTO result (Class_ID, Subject_ID, Student_ID, marks) VALUES ('$classid', '$subjectid', '$studentid','$marks')";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0) {
            header("Location:resultadd.php");
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}else if(isset($_POST["delete"]))
{
    // Check if subject ID and name are not empty
if(empty($studentid) || empty($subjectid) || empty($classid)){
    echo "<script>alert('Please enter Student ID, Subject ID and Class ID.');</script>";
}

// Delete student from the database
else {
    $sql = "DELETE FROM result WHERE Student_ID='$studentid' AND Subject_ID='$subjectid' AND Class_ID='$classid'";
    mysqli_query($conn, $sql);
    header("Location:resultadd.php");
}
}
?>
