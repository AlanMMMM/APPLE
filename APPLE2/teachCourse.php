<?php
	session_start();

$servername = "localhost";
$username = "rmgordon";
$password = "hockeyD8$";
$dbname = "rmgordon";

	$servername = "localhost";
    $username = "rmgordon";
    $password = "hockeyD8$";
    $dbname = "rmgordon";


	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}

	$fID = $_SESSION['userID'];

	$sql = "SELECT courseID, deptName, courseNumber FROM course
		WHERE instructor = (SELECT lname FROM personnel WHERE fID = '$fID')";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		echo "<table border='1'>
		<tr>
		<th>Course ID</th>
		<th>Department Name</th>
		<th>Course Number</th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['courseID'] . "</td>";
			echo "<td>" . $row['deptName'] . "</td>";
			echo "<td>" . $row['courseNumber'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

?>
