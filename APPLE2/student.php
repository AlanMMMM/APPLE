<?php
	session_start();
?>
<html>
	<head>
		<title>Student Page</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h2>Welcome, <?php echo $_SESSION['fname']?></h2>
		
   
   <form action="enrolledIn.php">
    <input type="submit" value="Enrolled Courses" />
</form>

<form action="registration.php">
    <input type="submit" value="Register for a class" />
</form>

<form action="courseCatalog.php">
    <input type="submit" value="View Available Courses" />
</form>
   
   
<form action="profile.php">
    <input type="submit" value="View Profile" />
</form>

<form action="logout.php">
			 <input type="submit" value="Log Out" />
	</form>
 
 <form action="form.php">
    <input type="submit" value="Registration Form" />
</form>

	</body>
</html>
