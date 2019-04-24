<!DOCTYPE html>
<html>
	<head>
		<title>Grade Entry</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h2>Search Course!</h2>

		<?php
			session_start();
			include 'teachCourse.php';

		?>

		<form method="post">
			Enter Course ID:
			<input type="text" name="courseID"><br>
			<input type="submit" value="Submit" formaction="entry.php"/><br>
		</form>



		<form action="logout.php">
		    <input type="submit" value="Log Out" />
		</form>

</body>
</html>
			<!-- 1. select courses that the faculty teaches
			2. display students who are enrolled in this course
			3.
			4. -->
