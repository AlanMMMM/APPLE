<!DOCTYPE HTML>
  
<html>
  <head>
		<title>Edit Profile</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
  <h2>Editing Profile </h2>
  

  
  
  <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">
    
      <label for="categories">Select what you would like to change: </label> <br />
      
      Address <input id="categories" name="categories" type="radio" value="address" required /> <br />
      Password <input id="categories" name="categories" type="radio" value="password" /> <br />
      Email <input id="categories" name="categories" type="radio" value="email" /> <br />
      
      <label for="searchbar">Enter what you would like to change it to: </label> <br />
      
      
      <input type="text" name="searchbar" required>
      <br>
      
      <input type="submit" value="Submit Changes" name="submit" />
      
      
      
    </form> <br/> <br/>
  
  <?php
  session_start();
  
  $userid = $_SESSION['userID'];

  $servername= "localhost";
  $username = "amstg";
  $password = "seas";
  $dbname = "amstg";
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    
      $searchTerm = $_POST["searchbar"];
  
      if($_SERVER[REQUEST_METHOD] == "POST")
      {
        if (($_POST["categories"]) == "address" ) 
        {
          $sql = "UPDATE student SET address = '$searchTerm' WHERE sID = '$userid' ";
          $result = $conn->query($sql);
        }
        if (($_POST["categories"]) == "password" ) 
        {
          $sql = "UPDATE student SET passwrd = '$searchTerm' WHERE sID = '$userid' ";
          $result = $conn->query($sql);
        }
        if (($_POST["categories"]) == "email" ) 
        {
          $sql = "UPDATE student SET email = '$searchTerm' WHERE sID = '$userid' ";
          $result = $conn->query($sql);
        }
      }
  ?>
  <form action="profile.php">
    <input type="submit" value="Back to Profile" />
</form>
  

</body>
</html>