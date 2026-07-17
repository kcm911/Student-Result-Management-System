<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <style>
      /* Styling for the header */
      header {
        background-color: #4CAF50;
        color: white;
        padding: 20px;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      h1 {
        margin: 0;
      }
      /* Styling for the logout button */
      .logout-button {
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-right: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .logout-button:hover {
        background-color: #d32f2f;
      }
      /* Styling for the main content */
      main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      section {
        background-color: #f5f5f5;
        padding: 50px;
        margin: 0 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
        width: 300px;
      }
      h2 {
        margin: 0 0 20px;
      }
      a {
        display: block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
      }
      a:hover {
        background-color: #357a38;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Dashboard</h1>
      <a href = main.php><button class="logout-button">Logout</button></a>
    </header>
    <main>
      <section>
        <h2>Students</h2>
        <p>View and manage student data</p>
        <a href="studentadd.php">Go to Students</a>
    </br>
        <h2>Subjects</h2>
        <p>View and manage subject data</p>
        <a href="subjectadd.php">Go to Subjects</a>
      </section>

      <section>
        <h2>Class</h2>
        <p>View and Manage Class</p>
        <a href="class.php">Go to Class</a>
    </br>
        <h2>Results</h2>
        <p>View and manage result data</p>
        <a href="resultadd.php">Go to Results</a>
      </section>

      <section>
        <h2>Notice</h2>
        <p>View and manage notice data</p>
        <a href="addnotice.php">Go to Notice</a>
    </br>
        <h2>Change Password</h2>
        <p>Change Teacher Password</p>
        <a href="changepw.php">Go to Change Password</a>
      </section>
    </main>
  </body>
</html>
