<?php
include_once 'dbc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Details</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        </style>
</head>
<body>
    <nav>
        <div class="logo">
          <a href="#">Student Result Management System</a>
        </div>
        <ul class="menu">
          <li><a href="main.php">Home</a></li>
          <li><a href="studentresultsearch.php">Student</a></li>
          <li><a href="teacherlogin.php">Teacher</a></li>
        </ul>
      </nav>
      <div class="container">
      <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

 <?php 
$noticeid=$_GET['nid'];
$sql = "SELECT * from notice where nid='$noticeid'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>  

                        <h3><?php echo htmlentities($result->noticetitle);?></h3>
                        <p><strong>Notice Posting Date:</strong>  <?php echo htmlentities($result->postingdate);?></p>
                                                <hr color="#000" />
                    
<p><?php echo htmlentities($result->noticedetails);?></p>
<?php }} ?>

              
    

                    </div>
                </div>
            </div>
        </section>

      </div>
</body>
</html>