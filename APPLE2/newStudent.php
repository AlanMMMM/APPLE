

<!DOCTYPE html>
<html>
<head>
  <title>Adding New Student Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Welcome, System Administrator!</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      First name:<br>
      <input type="text" name="fname"><br>
      Last name:<br>
      <input type="text" name="lname"><br>
      Username:<br>
      <input type="text" name="username"><br>
      Email:<br>
      <input type="text" name="email"><br>
      Password:<br>
      <input type="text" name="passwrd"><br>
      Student ID: (8 digits)<br>
      <input type="text" name="sID"><br>
      Program:<br>
      <input type="text" name="program"><br>
      Address:<br>
      <input type="text" name="address"><br>
      <input type="submit" value="Submit" /><br>
    </form>

    <form action="logout.php">
		    <input type="submit" value="Log Out" />
		</form>

    <?php
    session_start();
    $servername = "localhost";
    $username = "amstg";
    $password = "seas";
    $dbname = "amstg";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passwrd = $_POST['passwrd'];
    $sID = $_POST['sID'];
    $program =  $_POST['program'];
    $address = $_POST['address'];

    if($_SERVER[REQUEST_METHOD] == "POST") {
      $sqlCheck = "SELECT * FROM student WHERE sID='$sID'";
      $resultCheck = $conn->query($sqlCheck);
      if($resultCheck->num_rows > 0){
        echo "Error: Student with ID already exists.";
      }else{
        $sql = "INSERT INTO student VALUES ('$fname', '$lname', '$username', '$email', '$passwrd', '$sID', '$program', '$address')";
        $result = $conn->query($sql);
        if ($result) {
          $_SESSION['status'] = "New Student added successfully!";
          header('Location: sa.php');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_connect_error();
        }
      }
    }

    mysqli_close();
    ?>

      </body>
</html>
