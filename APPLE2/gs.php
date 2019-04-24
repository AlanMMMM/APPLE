<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<title>Grad Secretary</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<h2>Welcome, <?php echo $_SESSION['fname']?>!</h2>

		<form action="viewGs.php">
			<input type="submit" value="View Information" />
		</form>

	 <form action="gradeGs.php">
			<input type="submit" value="Enter grades" />
	 </form>

        <form action="../APPLE-APPS/NewFaculty/applicationCompleteList.php">
            <input type="submit" value="Go to Application System" />
        </form>

	 <form method="post" action="transcript.php">
		 <label for="sid">Student ID:</label><br>
		 <input type="text" name="sid">
	 <input type="submit" value="View Transcript"/><br>
	</form>
            
<form action="gsCourse.php">
    <input type="submit" value="View Courses" />
</form>

<form action="gsEnroll.php">
	    	<input type="submit" value="View Enrolled Courses" />
		</form>
				

		<form action="logout.php">
	    	<input type="submit" value="Log Out" />
		</form>

	</body>
</html>
