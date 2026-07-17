<?php
// include the database config file
include 'dbc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Result</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type = "text/javascript">
  $(document).ready(function(){
$("#classid").change(function(){
var class_id=$(this).val();
$.ajax({
  url:"stuajaxData.php",
  method:"POST",
  data:{class:class_id},
  success:function(data){
    $('#studentid').html(data);
  }
});
});
  });
</script>

<script type = "text/javascript">
  $(document).ready(function(){
$("#classid").change(function(){
var class_id=$(this).val();
$.ajax({
  url:"subajaxData.php",
  method:"POST",
  data:{class:class_id},
  success:function(data){
    $('#subjectid').html(data);
  }
});
});
  });
</script>

  <style>
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="password"] {
      display: block;
      margin-bottom: 20px;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 300px;
      box-sizing: border-box;
    }

    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    form {
      margin-left: 300px;
      padding: 20px;
      width: 400px;
      box-sizing: border-box;
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
  <link rel="stylesheet" href="studentadd.css">
  <link rel="stylesheet" href="sidenav.css">
</head>
<body>
    <div class="sidenav">
        <div>
          <a href ="dashboard.php">Dashboard</a>
          <a href="studentadd.php" >Student</a>
          <a href="subjectadd.php">Subject</a>
        </div>
        <a href="class.php">Class</a>
        <a href="resultadd.php" class="active">Result</a>
        <a href="changepw.php">Change Password</a>
        <a href="addnotice.php">Notice</a>
        <a href="main.php">Log Out</a>
        <a href="dashboard.php" class="back-button">Back</a>
      </div>

      <div class="container">
    <h1>Manage Results</h1>

    <?php

$query = "SELECT * FROM result";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$query);
    if ($result) {
    print "<table align=center border=1>";
    print "<th>Result ID<th>Student ID<th>Class ID<th>Subject ID<th>Marks<th>Postingdate";
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    print "<tr>";
     foreach ($row as $field) 
     {
       print "<td>$field</td> ";
     }
     print "</tr>";
    }
}
else 
{ 
    die ("Query=$query failed!"); 
}
?>

    <!-- Form to create a new student result -->
    <form id="new-student-form" method="POST" action="addresult.php">
      <h2>Result</h2>
      <div>

 
      <label>Class ID:</label>
<select name="classid" id="classid" >
  <option value disabled selected >Select Class</option>
  <?php
  require_once 'dbc.php';
  $sql = "SELECT * FROM class ORDER BY Class_Name";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
?>
    <option value="<?= $row['Class_ID'] ?>"><?= $row['Class_Name'] ?></option>
<?php } ?>

</select>

      <label>Student ID:</label>
<select name ="studentid" id="studentid">
  <option value disabled selected>Select Class First</option>
</select>

<label>Subject ID:</label>
<select name="subjectid" id="subjectid">
  <option value disabled selected>Select Class First</option>
</select>

      <label for="result">Mark:</label>
      <input type="text" id="result" name="result" required>

      <button type="submit" name = "add">Add</button>
      
      <button type="submit" name = "delete">Delete</button>
      </div>
    </form>
    <br>
      </body>
</html>
