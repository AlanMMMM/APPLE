<!DOCTYPE html>
<html>
	<head>
		<title>New Course Creation</title>
		<link rel="stylesheet" href="style.css">
	</head>

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
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $courseID = $_POST['courseID'];
    $deptName = $_POST['deptName'];
    $courseNumber = $_POST['courseNumber'];
    $courseName = $_POST['courseName'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime =  $_POST['endTime'];
    $semester = $_POST['semester'];
    $creditHrs = $_POST['creditHrs'];
    $sectionNum = $_POST['sectionNum'];
    $instructor = $_POST['instructor'];
    $preq1Dept = $_POST['preq1Dept'];
		$preq1Num = $_POST['preq1Num'];
		$preq2Dept = $_POST['preq2Dept'];
    $preq2Num = $_POST['preq2Num'];

		if($_SERVER[REQUEST_METHOD] == "POST") {
			$sql = "INSERT INTO course VALUES ('$courseID', '$deptName', '$courseNumber', '$courseName', '$day', '$startTime', '$endTime', '$semester', '$creditHrs', '$sectionNum', '$instructor', '$preq1Dept', '$preq1Num', '$preq2Dept', '$preq2Num')";
			$result = $conn->query($sql);
			if ($result) {
				$_SESSION['status'] = "New course added successfully!";
				header('Location: sa.php');
			}	else {
					echo "Error: " . $sql . "<br>" . mysql_connect_error;
			}
		}

		mysqli_close();
  ?>


    <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">
        Course ID:<br>
        <input type="text" name="courseID"><br>
        Department Name:<br>
        <input type="text" name="deptName"><br>
        Course Number:<br>
        <input type="text" name="courseNumber"><br>
				Course Name:<br>
        <input type="text" name="courseName"><br>
        Day: (M, T, W, R)<br>
        <input type="text" name="day"><br>
        Start Time: (4 digits, i.e. 6pm => 1800)<br>
        <input type="text" name="startTime"><br>
        End Time: (4 digits, i.e. 6pm => 1800)<br>
        <input type="text" name="endTime"><br>
        Semester: (1 character, i.e. Spring => S)<br>
        <input type="text" name="semester"><br>
        Credit Hours:<br>
        <input type="text" name="creditHrs"><br>
				Section Number:<br>
        <input type="text" name="sectionNum"><br>
				Instructor:<br>
        <input type="text" name="instructor"><br>
				Pre-requisite 1 Department Name:<br>
        <input type="text" name="preq1Dept"><br>
				Pre-requisite 1 Course Number:<br>
        <input type="text" name="preq1Num"><br>
				Pre-requisite 2 Department Name:<br>
        <input type="text" name="preq2Dept"><br>
				Pre-requisite 2 Course Number:<br>
        <input type="text" name="preq2Num"><br>
        <input type="submit" value="Submit" /><br>
      </form>

			<form action="logout.php">
			    <input type="submit" value="Log Out" />
			</form>

  </form>
</body>
</html>
