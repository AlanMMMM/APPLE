<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>System Administrator</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<h2>Welcome, <?php echo $_SESSION['fname']?></h2>

		<form action="view.php">
	 		<input type="submit" value="View Information" />
	 	</form>

	 <form action="newMember.php">
	 		<input type="submit" value="Create a New Faculty" />
	 </form>

	 <form action="newGrad.php">
	 		<input type="submit" value="Create a New Grad Secretary" />
	 </form>

	 <form action="newStudent.php">
	 		<input type="submit" value="Create a New Student" />
	 </form>

	 <form action="newCourse.php">
	 		<input type="submit" value="Create a New Course" />
	 </form>




	 <form action="logout.php">
	     <input type="submit" value="Log Out" />
	 </form>

	 <label for=status><?php echo $_SESSION['status'];?></label>

	</body>
</html>
