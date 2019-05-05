<!DOCTYPE HTML>

<html>
  <head>
		<title>Course Drop</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
  <h2>Drop a course </h2>




  <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">


      <label for="searchbar">Enter course ID: </label> <br />


      <input type="text" name="searchbar" required>
      <br>

      <input type="submit" value="Drop" name="submit" />



    </form> <br/> <br/>
    
    
    
      <?php
  
  session_start();

  
  $userid = $_SESSION['userID'];


      $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }

      $searchTerm = $_POST["searchbar"];
      
      if($_SERVER[REQUEST_METHOD] == "POST")
      {
        if($searchTerm > 0 && $searchTerm <= 20)
        {
          $sql = "SELECT * FROM enroll WHERE courseID = '$searchTerm' AND sID = '$userid'";
          $result = $conn->query($sql);
          if(mysqli_fetch_array($result)==0)
          {
          echo "Error: You are not currently enrolled in this course!";
          }
          else
          {
            $sql2 = "SELECT * FROM enroll WHERE courseID = '$searchTerm' AND sID = '$userid' AND finalGrade != 'IP'";
            $result2 = $conn->query($sql2);
            
            if(mysqli_fetch_array($result2) != 0)
            {
              echo "Cannot drop a course you already completed!";
            }
            else
            {
              $sql = "DELETE FROM enroll WHERE courseID = '$searchTerm' AND sID = '$userid'";
              $result = $conn->query($sql);
              echo "Course dropped successfully";
            }
          }
        }
        else
        {
          echo "Invalid course ID";
        }
      }
      ?>
    
       <form action="enrolledIn.php">
    <input type="submit" value="Enrolled Courses" />
</form>

<form action="registration.php">
    <input type="submit" value="Register for a class" />
</form>

<form action="courseCatalog.php">
    <input type="submit" value="View Available Courses" />
</form>


<form action="profile.php">
    <input type="submit" value="View Profile" />
</form>
</body>
</html>
