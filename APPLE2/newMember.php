<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
  <title>Faculty Acct. Creation</title>
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
      Password:<br>
      <input type="text" name="passwrd"><br>
      Faculty ID:<br>
      <input type="text" name="fID"><br>
      Address:<br>
      <input type="text" name="address"><br>
			<input type="submit" value="Submit" /><br>

      <form action="logout.php">
  		    <input type="submit" value="Log Out" />
  		</form>

    </form>
              <?php
              $servername = "localhost";
              $username = "amstg";
              $password = "seas";
              $dbname = "amstg";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $username = $_POST['username'];
              $passwrd = $_POST['passwrd'];
              $fID = $_POST['fID'];
              $address = $_POST['address'];

              if($_SERVER[REQUEST_METHOD] == "POST") {
                $sql = "INSERT INTO personnel VALUES ('$fname', '$lname', '$username', '$passwrd', '$fID', 'F', '$address')";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                    $_SESSION['status'] = "New Faculty added successfully!";
                    header('Location: sa.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }

              mysqli_close();
              ?>

      </body>
</html>
