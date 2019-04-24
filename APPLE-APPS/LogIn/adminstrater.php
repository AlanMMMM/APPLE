<?php
// Start the session
session_start();
//print_r($_SESSION);
?>
<html>	
<head>	
	<title>Administrator</title>	
</head>	
<body>	
	<h1>Administrator:</h1>	
<?php		
   $servername = "localhost";
      $username = "XDJ";
      $password = "CSCI2541_sp19";
      $dbname = "XDJ";
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
   }
   
   
   $uid = $_SESSION["uid"];
   
   $query = "SELECT * FROM user;";
   
   echo "Users:<br /><br />"; 
 
   $result = mysqli_query($conn,$query);
   if($result){
   echo "<table style = width:30%>"; 
   echo "<tr><td>" . "username:" . "</td><td>" . "Password:" . "</td><td>" . "Role:" . "</td><td>" . "UID:" . "</td></tr>";

   while($row = mysqli_fetch_array($result)){   // Goes through results and displays them
   
   
   echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td><td>" . $row['role'] . "</td><td>" . $row['uid'] .  "</td></tr>";  
   }

   echo "</table>"; 
   }
   else {
   echo "Error: " . $query . "<br>" . mysqli_error($conn);
   } 
   
 
   
   // Faculty
   
   $query = "SELECT * FROM faculty;";
   
   echo "<br><br>Faculty:<br /><br />"; 
 
   $result = mysqli_query($conn,$query);
   if($result){
   echo "<table style = width:30%>"; 
   echo "<tr><td>" . "First Name:" . "</td><td>" . "Last Name:" . "</td><td>" . "Faculty Role:" . "</td><td>" . "UID:" . "</td></tr>";

   while($row = mysqli_fetch_array($result)){   // Goes through results and displays them
   
   
   echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['faculty_role'] . "</td><td>" . $row['uid'] .  "</td></tr>";  
   }

   echo "</table>"; 
   }
   else {
   echo "Error: " . $query . "<br>" . mysqli_error($conn);
   } 
   
   
   // Applicants
   
   $query = "SELECT * FROM applicant;";
   
   echo "<br><br>Applicants:<br /><br />"; 
 
   $result = mysqli_query($conn,$query);
   if($result){
   echo "<table style = width:30%>"; 
   echo "<tr><td>" . "First Name:" . "</td><td>" . "Last Name:" . "</td><td>" . "Status:" . "</td><td>" . "UID:" . "</td></tr>";

   while($row = mysqli_fetch_array($result)){   // Goes through results and displays them
   
   
   echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['app_status'] . "</td><td>" . $row['uid'] .  "</td></tr>";  
   }

   echo "</table>"; 
   }
   else {
   echo "Error: " . $query . "<br>" . mysqli_error($conn);
   }
   
   mysqli_close($conn);
   
   

?>
</body>

<br /><br />
<input type=button onClick="location.href='adminCreate.php'" value='Create new user'><br /><br />
<input type=button onClick="location.href='reset.php'" value='Reset Database'><br /><br />
<input type=button onClick="location.href='login.php'" value='Log off'>


</html>

    