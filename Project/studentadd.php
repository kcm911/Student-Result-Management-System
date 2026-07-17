<?php
include_once 'dbc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Student</title>
 
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
          <a href="studentadd.php" class="active">Student</a>
          <a href="subjectadd.php">Subject</a>
        </div>
        <a href="class.php">Class</a>
        <a href="resultadd.php">Result</a>
        <a href="changepw.php">Change Password</a>
        <a href="addnotice.php">Notice</a>
        <a href="main.php">Log Out</a>
        <a href="dashboard.php" class="back-button">Back</a>
      </div>
      <div class="container">
    <h1>Manage Students</h1>

    <?php

$query = "SELECT * FROM student";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$query);
    if ($result) {
    print "<table align=center border=1>";
    print "<th>Student ID<th>Name<th>Address<th>Contact<th>Email<th>Gender<th>DOB<th>Class";
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

<?php
// Retrieve maximum Student_ID value
$query = "SELECT MAX(Student_ID) AS maxid FROM student";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$maxid = $row['maxid'];

// Generate new Student_ID value with prefix "STU" and leading zeros
if ($maxid === NULL) {
    $stuid = "STU001";
} else {
    $num = intval(substr($maxid, 3));
    $num++;
    $stuid = "STU" . str_pad($num, 3, "0", STR_PAD_LEFT);
}
?>



    <!-- Form to create a new student record -->
    <form id="new-student-form" action="addstu.php" method="POST">
      <h2>Student Admission</h2>
      <div>

      <label for="id">Student ID:</label>
      <input type="text" id="id" name="id" style="color:blue" value ="<?php echo $stuid; ?>"  required>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" >

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" >

      <label for="contact">Contact:</label>
      <input type="text" id="contact" name="contact" >

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" >

      <label for="gender">Gender:</label>
      <input type="radio" id="male" name="gender" value="male" checked >Male
      <input type="radio" id="female" name="gender" value="female">Female

      <label for="dob">DOB:</label>
      <input type="date" id="dob" name="dob" >


      <label for="class">Class:</label>
      <?php
$sql = "SELECT Class_ID, Class_Name FROM class";
$result = mysqli_query($conn, $sql);

// Check if any options were returned
if (mysqli_num_rows($result) > 0) {
    echo '<select name="Class_id">';
    // Output each option as a dropdown menu item
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['Class_ID'] . '">' . $row['Class_Name'] . '</option>';
    }
    echo '</select>';
} else {
    echo 'No options available';
}

// Close the database connection
mysqli_close($conn);
?>

</br>
</br>

      <button type="submit" name="add">Add</button>
      <button type="submit" name="update">Update</button>
      <button type="submit" name="delete">Delete</button>
      </div>
    </form>
    <br>
</div>
      </body>
</html>
