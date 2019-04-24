<!DOCTYPE HTML>
  
<html>
  <head>
		<title>Course Catalog</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
  <h2>Course Catalog</h2>
  
  
  <?php  
   session_start();

  $servername= "localhost";
  $username = "amstg";
  $password = "seas";
  $dbname = "amstg";
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully <br/>";
    
    
    //$username = $_SESSION["username"];
    //echo $username;
    //header('location: cart.php?status='. $username);
    
    $sql = "SELECT deptName, courseNumber, courseName, startTime, endTime, creditHrs, sectionNum, courseID, semester, day, instructor, preq1Dept, preq1Num, preq2Num, preq2Dept FROM course";
    $result = $conn->query($sql);
    
    echo "<table border='1'>
    <tr>
    <th>CRN</th>
    <th>DEPT</th>
    <th>Course</th>
    <th>Title</th>
    <th>Section</th>
    <th>Credits</th>
    <th>Semester</th>
    <th>Day</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Instructor</th>
    <th>Pre-requisite 1 Dept</th>
    <th>Pre-requisite 1 Num</th>
    <th>Pre-requisite 2 Dept</th>
    <th>Pre-requisite 2 Num</th>
    
    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['courseID'] . "</td>";
    echo "<td>" . $row['deptName'] . "</td>";
    echo "<td>" . $row['courseNumber'] . "</td>";
    echo "<td>" . $row['courseName'] . "</td>";
    echo "<td>" . $row['sectionNum'] . "</td>";
    echo "<td>" . $row['creditHrs'] . "</td>";
    echo "<td>" . $row['semester'] . "</td>";
    echo "<td>" . $row['day'] . "</td>";
    echo "<td>" . $row['startTime'] . "</td>";
    echo "<td>" . $row['endTime'] . "</td>";
    echo "<td>" . $row['instructor'] . "</td>";
    echo "<td>" . $row['preq1Dept'] . "</td>";
    echo "<td>" . $row['preq1Num'] . "</td>";
    echo "<td>" . $row['preq2Dept'] . "</td>";
    echo "<td>" . $row['preq2Num'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";

    
    
    ?>
    
       <form action="gs.php">
    <input type="submit" value="Home" />
</form>

          

</body>
</html>