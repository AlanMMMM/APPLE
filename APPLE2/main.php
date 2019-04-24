<?php
	session_start();
	$_SESSION['status'] = "";
 //echo "Shmee";
?>
<html>
	<head>
		<title>Login to BitsBannerWeb</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<h2>Welcome to BitsBannerWeb</h2>
		<form method="post">
			<label for="user">User Type:</label>
			<select name="userType">
				<option value="F">Faculty</option>
				<option value="G">Grad Secretary</option>
				<option value="S">Student</option>
				<option value="A">Systems Administrator</option>
        <option value="V">Advisor</option>
			</select><br>
			<label for="id">User ID:</label>
			<input type="text" name="userid"><br>
			<label for="pass">Password:</label>
			<input type="password" name="password">
			<input type="submit" value="Log in" formaction="login.php"/><br>
			<label style="color:red" for="empty"><?php echo $_SESSION['emptyErr'];?></label><br><br>
			<input type="submit" value="Reset DB" formaction="deleteAll.php">
		</form>
	</body>
</html>
