<?php
include_once 'dbc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMS Main</title>
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
      <img src="images/result.jpg" alt="result pic" width ="1200px" height = "400px">
      </div>
      <section style="height:500px">
      <div class="col-lg-6">
                        <h2>Notice Board</h2>
                        <hr color="#000" />
                        <marquee direction="up"  onmouseover="this.stop();" onmouseout="this.start();">
                   <ul>
 <?php $sql = "SELECT * from notice";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                      
<li><a href="noticedetail.php?nid=<?php echo htmlentities($result->nid);?>" target="_blank"><?php echo htmlentities($result->noticetitle);?></li>
<?php }} ?>

                   </ul>
               </marquee>

                    </div>
      </section>
</body>
</html>