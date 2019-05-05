<!DOCTYPE html>
<html>
	<head>
		<title>Grade Entry</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h2>Search Course!</h2>

		<?php
			session_start();


        $servername = "localhost";
        $username = "amstg";
        $password = "seas";
        $dbname = "amstg";

		   
			 $conn = mysqli_connect($servername, $username, $password, $dbname);
			 if(!$conn){
			   die("Connection failed: " . mysqli_connect_error());
			 }
			
			 $sql = "SELECT deptName, courseNumber, courseName, creditHrs, sectionNum, courseID FROM course";
			 $result = $conn->query($sql);
			 
			 echo "<table border='1'>
			 <tr>
			 <th>CRN</th>
			 <th>DEPT</th>
			 <th>Course</th>
			 <th>Title</th>
			 <th>Section</th>
			 <th>Credits</th>
			 
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
			 echo "</tr>";
			 }
			 echo "</table>";
		?>

		<form method="post">
			Enter Course ID:
			<input type="text" name="courseID"><br>
			<input type="submit" value="Submit" formaction="entry.php"/><br>
		</form>

		<form action="logout.php">
		    <input type="submit" value="Log Out" />
		</form>

</body>
</html>
			<!-- 1. select courses that the faculty teaches
			2. display students who are enrolled in this course
			3.
			4. -->
