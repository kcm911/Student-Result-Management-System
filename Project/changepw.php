<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
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
        <a href="changepw.php" class = "active">Change Password</a>
        <a href="addnotice.php">Notice</a>
        <a href="main.php">Log Out</a>
        <a href="dashboard.php" class="back-button">Back</a>
      </div>

      <div class="container">
    <h1>Manage Password</h1>
  <form method = "POST" action="cpw.php">
    <h1>Change Password</h1>

    <label for="username">Username:</label>
    <input type="text" id="uname" name="uname" placeholder="Enter Username" required>

    <label for="current-password">Current Password:</label>
    <input type="password" id="oldpw" name="oldpw" placeholder="Enter Current Password" required>

    <label for="new-password">New Password:</label>
    <input type="password" id="newpw" name="newpw" placeholder="Enter New Password" required>

    <label for="confirm-password">Confirm New Password:</label>
    <input type="password" id="cpw" name="cpw" placeholder="Confirm New Password" required>

    <button type="" name="update" value="update">Change Password</button>
    <input type="checkbox" onclick="showPassword()">Show Password

<script>
    function showPassword() {
        var passwordFields = document.querySelectorAll("#oldpw, #newpw, #cpw");
        for (var i = 0; i < passwordFields.length; i++) {
            var field = passwordFields[i];
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
    }
</script>
  </form>
      </div>
    

</body>
</html>
