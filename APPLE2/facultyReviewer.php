<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
    <title>Faculty Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['fname']?>!</h2>

<form action="grade.php">
    <input type="submit" value="Enter grades" />
</form>

<form method="post" action="transcript.php">
    <label for="sid">Student ID:</label><br>
    <input type="text" name="sid">
    <input type="submit" value="View Transcript"/><br>
</form>

<form action="../APPLE-APPS/NewFaculty/applicationCompleteList.php">
    <input type="submit" value="Review an Application" />
</form>


<form action="logout.php">
    <input type="submit" value="Log Out" />
</form>

</body>
</html>