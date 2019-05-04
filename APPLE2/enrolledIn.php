<!DOCTYPE HTML>

<html>
    <head>
		<title>Enrolled Courses</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
  <h2>Enrolled Courses: </h2>


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
    //echo "Connected successfully <br/>";
    //include 'gpa.php';

    //$username = $_SESSION["username"];
    //echo $username;
    //header('location: cart.php?status='. $username);

    $sql = "SELECT courseID, deptName, courseNumber, semester, startTime, endTime, day, creditHrs, year, finalGrade, gpa FROM enroll WHERE sID = '$userid' ";
    $result = $conn->query($sql);

    echo "<table border='1'>
    <tr>
    <th>Course ID</th>
    <th>Dept Name</th>
    <th>Course Number</th>
    <th>Semester</th>
    <th>Start Time</th>
    <th>Endtime</th>
    <th>Day</th>
    <th>Credit Hours</th>
    <th>Year</th>
    <th>Final Grade</th>
    <th>GPA</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['courseID'] . "</td>";
    echo "<td>" . $row['deptName'] . "</td>";
    echo "<td>" . $row['courseNumber'] . "</td>";
    echo "<td>" . $row['semester'] . "</td>";
    echo "<td>" . $row['startTime'] . "</td>";
    echo "<td>" . $row['endTime'] . "</td>";
    echo "<td>" . $row['day'] . "</td>";
    echo "<td>" . $row['creditHrs'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['finalGrade'] . "</td>";
    echo "<td>" . $row['gpa'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";



    ?>

    <form action="dropCourse.php">
    <input type="submit" value="Drop a course" />
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
