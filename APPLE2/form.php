<!DOCTYPE HTML>
  
<html>
  <head>
		<title>Registration Form</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
  <h2>Registration Form</h2>
  
  <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">
  
  <label for="categories">Action: </label> <br />
      
      Add course to form  <input id="categories" name="categories" type="radio" value="add" required /> <br />
      Remove course from form <input id="categories" name="categories" type="radio" value="remove" /> <br />
  
  <label for="searchbar">First Course</label> <br />
      <input type="text" name="course1">
      <br>
  
   <input type="submit" value="Submit Changes" name="submit" />
    </form> <br/> <br/>
    
    
    
  

   <?php
  session_start();
  
  $userid = $_SESSION['userID'];
<<<<<<< HEAD

   $servername = "localhost";
   $username = "rmgordon";
   $password = "hockeyD8$";
   $dbname = "rmgordon";
=======
  
    $servername = "localhost";
    $username = "rmgordon";
    $password = "hockeyD8$";
    $dbname = "rmgordon";
>>>>>>> ed7cfa17fa25d28f702595c28342258a89b44198
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $searchTerm = $_POST["course1"];
    //echo $userid;
    if (($_POST["categories"]) == "add" ) 
    {
      if($searchTerm >0 && $searchTerm <=20)
      {
      
      $sql = "SELECT deptName, courseNumber FROM course WHERE courseID = '$searchTerm' ";
      $result = $conn->query($sql);
      
      
      $row = mysqli_fetch_array($result);
      
      
      $sql2 = "INSERT INTO form VALUES ('$userid', '$searchTerm', '$row[deptName]', '$row[courseNumber]')";
  
      $result2 = $conn->query($sql2);
      echo "Course added to Form";
      }
      else
      {
        echo "Invalid Course ID";
      }
    }
    
    else
    {
      $sql7 = "SELECT * FROM form WHERE courseID = '$searchTerm' AND sID = '$userid'";
      $result7 = $conn->query($sql7);
      if($row = mysqli_fetch_array($result7)!=0)
      {
        $sql6 = "DELETE FROM form WHERE courseID = '$searchTerm' AND sID = '$userid'";
        $result6 = $conn->query($sql6);
        echo "Deleted off form";
      }
      else
        echo "Error: Course not on form";
    }
    
    $sql3 = "SELECT courseName, courseNum, courseID FROM form WHERE sID = '$userid'";
    $result3 = $conn->query($sql3);
    
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Course</th>
    <th>Number</th>

    </tr>";
    
    while($row = mysqli_fetch_array($result3))
    {
    echo "<tr>";
    echo "<td>" . $row['courseID'] . "</td>";
    echo "<td>" . $row['courseName'] . "</td>";
    echo "<td>" . $row['courseNum'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    

    
    
    ?>
     <form action="enrolledIn.php">
    <input type="submit" value="Enrolled Courses" />
</form>

<form action="courseCatalog.php">
    <input type="submit" value="View Available Courses" />
</form>


<form action="profile.php">
    <input type="submit" value="View Profile" />
</form>

    <form action="dropCourse.php">
    <input type="submit" value="Drop a course" />
</form>

  
</body>
</html>