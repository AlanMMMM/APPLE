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

$id = $_SESSION['studentID'];

$sql = "SELECT creditHrs, finalGrade FROM enroll WHERE (sID = '$id')";
$result = $conn->query($sql);
$totalPoint = 0;
$totalHours = 0;
while($row = mysqli_fetch_array($result))
{
    if ($row['finalGrade'] == 'A') {
      $row['gpa'] = 4.00;
    } else if ($row['finalGrade'] == 'A-') {
      $row['gpa'] = 3.70;
    } else if ($row['finalGrade'] == 'B+') {
      $row['gpa'] = 3.30;
    } else if ($row['finalGrade'] == 'B') {
      $row['gpa'] = 3.00;
    } else if ($row['finalGrade'] == 'B-') {
      $row['gpa'] = 2.70;
    } else if ($row['finalGrade'] == 'C+') {
      $row['gpa'] = 2.30;
    } else if ($row['finalGrade'] == 'C') {
      $row['gpa'] = 2.00;
    } else {
      $row['gpa'] = 0.00;
    }
    $point = $row['gpa'] * $row['creditHrs'];
    $totalPoint = $totalPoint + $point;
    $totalHours = $totalHours + $row['creditHrs'];
}

$gpa = $totalPoint/$totalHours;

$sql2 = "UPDATE enroll SET gpa = $gpa WHERE (sID = '$id')";

$result2 = $conn->query($sql2);
if ($result2 == TRUE) {
  echo "gpa calculated successfully";
}	else {
  echo "Error: " . $sql2 . "<br>" . mysql_error();
}

mysqli_close();
?>
