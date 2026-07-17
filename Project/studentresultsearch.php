<?php
include 'dbc.php';

?>


<!DOCTYPE html>
<html>
<head>
  <title>Search Result</title>
  <link rel="stylesheet" href="student.css">
  <link rel="stylesheet" href="nav.css">
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
    <h1>Student Result Search</h1>
    <form action="sturesult.php" method="POST">
      <div class="form-group">
        <label for="student-id">Student ID:</label>
        <input type="text" id="student" name="student" required placeholder="Enter Student ID">
<br>
        <label for="class-name">Class Name:</label>
        <?php
$sql = "SELECT Class_ID, Class_Name FROM class";
$result = mysqli_query($conn, $sql);

// Check if any options were returned
if (mysqli_num_rows($result) > 0) {
    echo '<select required id ="class" name="class">';
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

      </div>
      <button type="submit" name="search">Search</button>
    </form>
  </div>
</body>
</html>
