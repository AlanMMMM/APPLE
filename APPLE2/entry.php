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


	$conn = new mysqli($servername, $username, $password, $dbname);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}

	$_SESSION['courseID'] = $_POST['courseID'];
	include 'enrolledStud.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Grade Entry</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

		<h2>Enter Grades!</h2>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Enter Course ID:
			<input type="text" name="courseID"><br>
			Enter Student ID:
			<input type="text" name="sID"><br>
			Enter Grade: (A, A-, B+, B, B-, C+, C, F)
			<input type="text" name="grade"><br>
			<input type="submit" value="Submit Grade" formaction="entry.php"/><br>
			<label style="color:red" for="empty"><?php echo $_SESSION['emptyErr'];?></label><br><br>
		</form>


		<?php
			$courseID = $_POST['courseID'];
			$sID = $_POST['sID'];
			$grade = $_POST['grade'];

			if($_SERVER[REQUEST_METHOD] == "POST") {

				$alreadyGraded = "SELECT finalGrade FROM enroll WHERE (sID = '$sID' AND courseID = '$courseID')";
				$gradeCheck = $conn->query($alreadyGraded);

				if($gradeCheck->num_rows > 0) {
					while ($row = mysqli_fetch_array($gradeCheck)) {

						if ($row['finalGrade'] == "IP" ) {
							$sql2 = "UPDATE enroll SET finalGrade = '$grade' WHERE (sID = '$sID' AND courseID = '$courseID')";
							$result2 = $conn->query($sql2);
							if ($result2) {
								echo "Grade updated successfully!";
							} else {
								echo "Error: " . $result2 . "<br>" . $conn->error;
							}
						}
						else {
							echo "The final grade for this student has already been updated.";
							echo "Error: " . $gradeCheck . "<br>" . mysql_connect_error;
						}
					}
				}
			}
		?>

		<form action="logout.php">
		    <input type="submit" value="Log Out" />
		</form>

</body>
</html>
			<!-- 1. select courses that the faculty teaches
			2. display students who are enrolled in this course
			3.
			4. -->
