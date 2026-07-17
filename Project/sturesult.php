<?php
include 'dbc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
        <script src="print.js"></script>
        <a href="main.php" class="back-button">Back</a>
        <style>
            button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .back-button {
			position: fixed;
			bottom: 10px;
			right: 10px;
			background-color: green;
			color: white;
			padding: 10px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
        </style>

        <script>
            function pagePrint(form){
                var printdata=document.getElementById("form");
                newwin = window.open("");
                newwin.document.write(printdata.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script>
</head>
<body>
    <form action="" id="form">
<h3 align="center">Student Result Details</h3>
<?php
// code Student Data
$studentid=$_POST['student'];
$classid=$_POST['class'];
$_SESSION['student']=$studentid;
$_SESSION['class']=$classid;
$query = "SELECT   student.Student_Name,student.Student_ID,class.Class_ID from student join class on class.Class_ID=student.Class_ID where student.Student_ID=:studentid and student.Class_ID=:classid ";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<p><b>Student Name :</b> <?php echo htmlentities($row->Student_Name);?></p>
<p><b>Student ID :</b> <?php echo htmlentities($row->Student_ID);?></p>
<p><b>Student Class:</b> <?php echo htmlentities($row->Class_ID);?></p>
<?php }
}

    ?>
<table border=1 width="100%">
    <thead>
            <tr style="text-align: center">
                <th style="text-align: center">#</th>
                <th style="text-align: center"> Subject</th>    
                <th style="text-align: center">Marks</th>
            </tr>
    </thead>                                            	
            <tbody>
            <?php                                              
// Code for result
$query ="select t.Student_Name,t.Student_ID,t.Class_ID,t.marks,t.Subject_ID,subject.Subject_Name from (select sts.Student_Name,sts.Student_ID,sts.Class_ID,tr.marks,Subject_ID from student as sts join result as tr on tr.Student_ID=sts.Student_ID) as t join subject on subject.Subject_ID=t.Subject_ID where (t.Student_ID=:student and t.Class_ID=:class)";
$query= $dbh -> prepare($query);
$query->bindParam(':student',$studentid,PDO::PARAM_STR);
$query->bindParam(':class',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
    $totlcount ="0";
foreach($results as $result){

    ?>

                                                		<tr>
<th scope="row" style="text-align: center"><?php echo htmlentities($cnt);?></th>
<td style="text-align: center"><?php echo htmlentities($result->Subject_Name);?></td>
<td style="text-align: center"><?php echo htmlentities($totalmarks=$result->marks);?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Total Marks</th>
<td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Percentage</th>           
<td style="text-align: center"><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
</tr>



 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
</div>
            </tbody>
</table>
 </form>
 </br>
 <button text-align="center" type="button" onclick="pagePrint(form)">Print</button>
</body>
</html>