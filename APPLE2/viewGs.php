<html>
<head>
  <title>Adding New Student Page</title>
  <link rel="stylesheet" href="style.css">
</head> 
</html>
<body>
<?php
  session_start();
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

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
?>
</body>
</html>

