<?php
require 'dbc.php';
$output='';
$sql="SELECT * FROM subject WHERE  Class_ID='".$_POST['class']."'";
$result=mysqli_query($conn,$sql);
$output .='<option value="" disabled selected>Select Subject</option>';
while($row=mysqli_fetch_array($result)){
    $output .='<option value="'.$row["Subject_ID"].'">'.$row["Subject_ID"].'</option>';
}
echo $output;

?>