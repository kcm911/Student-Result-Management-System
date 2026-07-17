<?php
require 'dbc.php';
$output='';
$sql="SELECT * FROM student WHERE  Class_ID='".$_POST['class']."'";
$result=mysqli_query($conn,$sql);
$output .='<option value="" disabled selected>Select Student</option>';
while($row=mysqli_fetch_array($result)){
    $output .='<option value="'.$row["Student_ID"].'">'.$row["Student_Name"].'</option>';
}
echo $output;

?>