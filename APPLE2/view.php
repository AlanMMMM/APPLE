<!DOCTYPE html>
<html>
	<head>
		<title>System Administrator View</title>
		<link rel="stylesheet" href="style.css">
	</head>

  <body>
		<h2>Welcome, System Administrator!</h2>
    <form method="post">
    <label for="userType">Select user type or course you wish to view:</label>
      <select name="userType">
        <option value="F">Faculty</option>
        <option value="G">Grad Secretary</option>
        <option value="S">Student</option>
        <option value="C">Course</option>
      </select>
      <input type="submit" value="Submit" /><br>
    </form>

    <?php
      session_start();
<<<<<<< HEAD
    $servername = "localhost";
=======
      $servername = "localhost";
>>>>>>> ed7cfa17fa25d28f702595c28342258a89b44198
    $username = "rmgordon";
    $password = "hockeyD8$";
    $dbname = "rmgordon";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      switch($_POST['userType']){
        // case 1: faculty
        case 'F':
          $sql = "SELECT fID, fname, lname, username, address FROM personnel WHERE personnelType = 'F'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            echo "<table border='1'>
            <tr>
            <th>FacultyID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Address</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>" . $row['fID'] . "</td>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";

          } else {
            echo "0 results";
          }
          $conn->close();
          break;

        // case 2: grad secretary
        case 'G':
          $sql = "SELECT fID, fname, lname, username, address FROM personnel WHERE personnelType = 'G'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            echo "<table border='1'>
            <tr>
            <th>gradID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Address</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>" . $row['fID'] . "</td>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";

          } else {
            echo "0 results";
          }
          $conn->close();
          break;

        // case 3: student
        case 'S':
          $sql = "SELECT sID, fname, lname, username, email, program, address FROM student";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            echo "<table border='1'>
            <tr>
            <th>studentID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Program</th>
            <th>Address</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>" . $row['sID'] . "</td>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['program'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
          break;

          // case 4: course
        case 'C':
          $sql = "SELECT courseID, deptName, courseNumber, courseName, day, startTime, endTime, semester, creditHrs, sectionNum, instructor, preq1Dept, preq1Num, preq2Dept, preq2Num FROM course";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            echo "<table border='1'>
            <tr>
            <th>courseID</th>
            <th>Department Name</th>
            <th>Course Name</th>
            <th>Course Number</th>
            <th>Section Number</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Semester</th>
            <th>Credits</th>
						<th>Instructor</th>
            <th>Pre-requisite 1 Department</th>
						<th>Pre-requisite 1 Number</th>
            <th>Pre-requisite 2 Department</th>
						<th>Pre-requisite 2 Number</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>" . $row['courseID'] . "</td>";
              echo "<td>" . $row['deptName'] . "</td>";
              echo "<td>" . $row['courseName'] . "</td>";
              echo "<td>" . $row['courseNumber'] . "</td>";
              echo "<td>" . $row['sectionNum'] . "</td>";
              echo "<td>" . $row['day'] . "</td>";
              echo "<td>" . $row['startTime'] . "</td>";
              echo "<td>" . $row['endTime'] . "</td>";
              echo "<td>" . $row['semester'] . "</td>";
							echo "<td>" . $row['instructor'] . "</td>";
              echo "<td>" . $row['creditHrs'] . "</td>";
              echo "<td>" . $row['preq1Dept'] . "</td>";
							echo "<td>" . $row['preq1Num'] . "</td>";
              echo "<td>" . $row['preq2Dept'] . "</td>";
							echo "<td>" . $row['preq1Num'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
          break;

      }
    ?>

		<form action="logout.php">
		    <input type="submit" value="Log Out" />
		</form>
		
  </body>
</html>
