<?php
include_once 'dbc.php';

$nid = $_POST['nid'];
$ntitle = $_POST['ntitle'];
$ndetail = $_POST['ndetail'];

if(isset($_POST["add"]))
{
    // Check if notice ID, title and detail are not empty
    if(empty($nid) || empty($ntitle) || empty($ndetail)){
        echo "<script>alert('Please enter all Forms.');</script>";
    }
    
    // Check if Notice ID already exists in the database
    else {
        $sql = "SELECT * FROM notice WHERE nid='$nid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            echo "<script>alert('Class ID already taken. Please enter a different ID.');</script>";
        }
        
        // Insert new Class into the database
        else {
            $sql = "INSERT INTO notice (nid, noticetitle, noticedetails) VALUES ('$nid', '$ntitle', '$ndetail')";
            mysqli_query($conn, $sql);
            header("Location:addnotice.php");
        }
    }
}
else if(isset($_POST["delete"]))
{
    // Check if notice ID and title are not empty
    if(empty($nid) || empty($ntitle)){
        echo "<script>alert('Please enter ID and Title.');</script>";
    }
    
    // Delete notice from the database
    else {
        $sql = "DELETE FROM notice WHERE nid='".$nid."' AND noticetitle='".$ntitle."'";
        mysqli_query($conn, $sql);
        header("Location:addnotice.php");
    }
}
?>
