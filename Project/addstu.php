<?php
include_once 'dbc.php';

$stuid = $_POST['id'];
$stuname = $_POST['name'];
$stuaddress = $_POST['address'];
$stucontact = $_POST['contact'];
$stuemail = $_POST['email'];
$stugender = $_POST['gender'];
$studob = $_POST['dob'];
$class = $_POST['Class_id'];

function validate_myanmar_phone_number($phone_number) {
    $pattern = '/^(\\+?09?|0)[1-9]\\d{7,8}$/';
    return preg_match($pattern, $phone_number);
  }
  

// Validate input
if(isset($_POST["add"])){

$errors = [];

if (empty($stuid)) {
    $errors[] = 'Student ID is required';
}

if (empty($stuname)) {
    $errors[] = 'Student name is required';
}

if (empty($stuaddress)) {
    $errors[] = 'Student address is required';
}

if (empty($stucontact)) {
    $errors[] = 'Student contact is required';
} else if (!validate_myanmar_phone_number($stucontact)) {
    $errors[] = 'Invalid student contact';
}
  

if (empty($stuemail)) {
    $errors[] = 'Student email is required';
} elseif (!filter_var($stuemail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($stugender)) {
    $errors[] = 'Student gender is required';
}

if (empty($studob)) {
    $errors[] = 'Date of birth is required';
} elseif (!strtotime($studob)) {
    $errors[] = 'Invalid date format. Please use yyyy-mm-dd';
}

if (empty($class)) {
    $errors[] = 'Class is required';
}

if (!empty($errors)) {
    // Display error messages to user
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
} else {
    // Insert data into database

        if(!$conn)
        {
            die("Connection Failed: " . mysqli_connect_error());
        } else {
            $stmt = $conn->prepare("INSERT INTO student (Student_ID, Student_Name, Student_Address, Student_Contact, Student_Email, Student_Gender, Student_DOB, Class_ID) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


            $stmt->bind_param("ssssssss", $stuid, $stuname, $stuaddress, $stucontact, $stuemail, $stugender, $studob, $class);
            if ($stmt->execute()) {
                header("Location:studentadd.php");
            } else {
                echo "Error adding record: " . $stmt->error;
            }
            $stmt->close();
        }

}
}
    else if(isset($_POST["delete"]))
    {
        // Check if subject ID and name are not empty
    if(empty($stuid) || empty($stuname)){
        echo "<script>alert('Please enter both Student ID and Student name.');</script>";
    }
    
    // Delete student from the database
    else {
        $sql = "DELETE FROM student WHERE Student_ID='".$stuid."' AND Student_Name='".$stuname."'";
        mysqli_query($conn, $sql);
        header("Location:studentadd.php");
    }
    }
    else if(isset($_POST["update"]))
    {
        $errors = [];

        if (empty($stuid)) {
            $errors[] = 'Student ID is required';
        }
        
        if (empty($stuname)) {
            $errors[] = 'Student name is required';
        }
        
        if (empty($stuaddress)) {
            $errors[] = 'Student address is required';
        }
        
        if (empty($stucontact)) {
            $errors[] = 'Student contact is required';
        } else if (!validate_myanmar_phone_number($stucontact)) {
            $errors[] = 'Invalid student contact';
        }
          
        
        if (empty($stuemail)) {
            $errors[] = 'Student email is required';
        } elseif (!filter_var($stuemail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }
        
        if (empty($stugender)) {
            $errors[] = 'Student gender is required';
        }
        
        if (empty($studob)) {
            $errors[] = 'Date of birth is required';
        } elseif (!strtotime($studob)) {
            $errors[] = 'Invalid date format. Please use yyyy-mm-dd';
        }
        
        if (empty($class)) {
            $errors[] = 'Class is required';
        }
        
        if (!empty($errors)) {
            // Display error messages to user
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        } 
    else
        {
        $sql = "UPDATE student SET Student_Name='".$stuname."', Student_Address='".$stuaddress."', Student_Contact='".$stucontact."', Student_Email='".$stuemail."', Student_Gender='".$stugender."', Student_DOB='".$studob."', Class_ID='".$class."' WHERE Student_ID='".$stuid."'";
        mysqli_query($conn, $sql);
        header("Location:studentadd.php");
        }
    }
?>