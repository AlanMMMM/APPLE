<!DOCTYPE HTML>
  
<html>
<head>
  <title>Student Profile</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Profile </h2>
  
  
  <?php  
   session_start();
   
   $userid = $_SESSION['userID'];
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
    //echo "Connected successfully <br/>";
    
    
    //$username = $_SESSION["username"];
    //echo $username;
    //header('location: cart.php?status='. $username);
    
    $sql = "SELECT fname, lname, email, username, sID, program, advisor, address FROM student WHERE sID = '$userid' ";
    $result = $conn->query($sql);
    
    echo "<table border='1'>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Student ID</th>
    <th>Program</th>
    <th>Address</th>
    <th>Advisor</th>
    
    
    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['lname'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['sID'] . "</td>";
    echo "<td>" . $row['program'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['advisor'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";

    
    
    ?>
    
<form action="editProfile.php">
    <input type="submit" value="Edit Personal Information" />
</form>
        
             <form action="enrolledIn.php">
    <input type="submit" value="Enrolled Courses" />
</form>

<form action="registration.php">
    <input type="submit" value="Register for a class" />
</form>

<form action="courseCatalog.php">
    <input type="submit" value="View Available Courses" />
</form>
<form action="logout.php">
    <input type="submit" value="Log Out" />
</form>


</body>
</html>