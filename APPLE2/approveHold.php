<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<title>Approve Hold</title>
		<link rel="stylesheet" href="style.css">
	</head>
 <h2>Approve Holds</h2>
 
   <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">
  
  <label for="searchbar">Please Enter a Student ID</label> <br />
      <input type="text" name="sid">
      <br>
  
   <input type="submit" value="Submit Changes" name="submit" />
    </form> <br/> <br/>


   <?php
  session_start();
  
  $userid = $_SESSION['userID'];


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
    
    $searchTerm = $_POST["sid"];
    $_SESSION['currentID'] = $searchTerm;
    echo $searchTerm;
    
    echo $_SESSION['currentID'];
    $sql = "SELECT courseName, courseNum, courseID FROM form WHERE sID = '$searchTerm' ";
    $result = $conn->query($sql);
    
    //$row = mysqli_fetch_array($result);
    ?>
    
     <h2>Current Students Form</h2>
    
    <?php
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Course</th>
    <th>Number</th>

    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['courseID'] . "</td>";
    echo "<td>" . $row['courseName'] . "</td>";
    echo "<td>" . $row['courseNum'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    
    
    
    
    
    ?>
<br/>
<form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">
    
      <label for="categories">Action: </label> <br />
      
      Approve Form  <input id="categories" name="categories" type="radio" value="approve" required /> <br />
      Reject Form <input id="categories" name="categories" type="radio" value="reject" /> <br />

    
      <input type="submit" value="Submit" formaction="holdChange.php"/><br><br/>

    </form> <br/> <br/>
    
     <form action="advisor.php">
			<input type="submit" value="Home" />
		</form>
    

	<body>

 	</body>
</html>
