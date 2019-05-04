<?php
	session_start();
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

	$courseID = $_SESSION['courseID'];

	$sql1 = "SELECT courseID, sID, finalGrade FROM enroll WHERE courseID = '$courseID'";
	$result1 = $conn->query($sql1);

	if($result1->num_rows > 0) {
		echo "<table border='1'>
		<tr>
		<th>Course ID</th>
		<th>Student ID</th>
		<th>Final Grade</th>
		</tr>";

		while($row = mysqli_fetch_array($result1))
		{
			echo "<tr>";
			echo "<td>" . $row['courseID'] . "</td>";
			echo "<td>" . $row['sID'] . "</td>";
			echo "<td>" . $row['finalGrade'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

?>
