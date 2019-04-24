<?php
    session_start();
?>
<html>
<head>
  <title>Transcript</title>
  <link rel="stylesheet" href="style.css">
</head>
    <body>
        <h2>View Transcript</h2>
        <link rel="stylesheet" href="style.css">

        <?php
        $tempID = $_SESSION['userID'];

            $servername = "localhost";
    $username = "rmgordon";
    $password = "hockeyD8$";
    $dbname = "rmgordon";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT sID FROM student WHERE sID = '$tempID'";
            $row = mysqli_fetch_array($conn->query($sql));
            if($row > 0){
                $id = $tempID;
            }else{
                $id = $_POST['sid'];
            }

            $_SESSION['studentID'] = $id;
            
            include 'gpa.php';

            $sql = "SELECT * FROM enroll WHERE sID = '$id'";
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
                while($row = mysqli_fetch_array($result)){
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

                $conn->close();
        ?>
    </body>
</html>
