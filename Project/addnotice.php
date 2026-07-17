<?php
include_once 'dbc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Notice</title>
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
          <a href="studentadd.php">Student</a>
        </div>
        <div>
          <a href="subjectadd.php">Subject</a>
        </div>
        <a href="class.php">Class</a>
        <a href="resultadd.php">Result</a>
        <a href="changepw.php">Change Password</a>
        <a href="addnotice.php" class="active">Notice</a>
        <a href="main.php">Log Out</a>
        <a href="dashboard.php" class="back-button">Back</a>
      </div>

      <div class="container">
      <h1>Manage Notice</h1>
<?php

$query = "SELECT * FROM notice";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$query);
    if ($result) {
    print "<table align=center border=1>";
    print "<th>Notice ID<th>Notice Title<th>Notice Details<th>Date";
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
    <!-- Form to create a new notice -->
    <form id="notice" method="POST" action="notice.php">
      <h2>Notice Creation</h2>
      <div>
      <label for="classname">Notice ID:</label>
      <input type="text" id="nid" name="nid" placeholder="Enter Notice ID">

      <label for="classname">Notice Title:</label>
      <input type="text" id="ntitle" name="ntitle" placeholder="Enter Notice Title">

      <label for="noticedetail">Notice Detail:</label>
      <textarea name="ndetail" row="5" placeholder="Enter Details" style=width:500px></textarea>
</br>
</br>
      <button type="submit" name="add" value="insert">Add</button>
      <button type="submit" name="delete" value="delete">Delete</button>
      </div>
    </form>
<br>


</body>
</html>