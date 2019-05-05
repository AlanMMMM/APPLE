<!DOCTYPE html>
<?php session_start();?>
<html>
	<head>
		<title>Advisor</title>
		<link rel="stylesheet" href="style.css">
	</head>
 <h2>Welcome, Advisor</h2>

	<body>
 <form action="approveHold.php">
			<input type="submit" value="Remove Holds" />
		</form>
 <form method="post" action="transcript.php">
     <label for="sid">Student ID:</label><br>
     <input type="text" name="sid">
     <input type="submit" value="View Transcript"/><br>
 </form>
 	</body>
</html>
