<?php
	session_start();
?>
<html>
	<body>
		<?php
        $servername= "localhost";
        $username = "amstg";
        $password = "seas";
        $dbname = "amstg";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if(!$conn){
				die("Connection failed: " . mysql_connect_error());
			}
			
			$usertype = $_POST['userType'];
			$user = $_POST['userid'];
			$pass = $_POST['password'];
			$sqlSt = "SELECT * FROM student WHERE sID='$user' AND passwrd='$pass'";
			$sqlF = "SELECT * FROM personnel WHERE (fID='$user' AND personnelType='$usertype' AND passwrd='$pass')";
			$sqlG = "SELECT * FROM personnel WHERE (fID='$user' AND personnelType='$usertype' AND passwrd='$pass')";
			$sqlA = "SELECT * FROM personnel WHERE (fID='$user' AND personnelType='$usertype' AND passwrd='$pass')";
      $sqlV = "SELECT * FROM personnel WHERE (fID='$user' AND personnelType='$usertype' AND passwrd='$pass')";
			
			if(!empty($usertype)){
				$_SESSION['userType'] = $usertype;
			}else{
				$_SESSION['emptyErr'] = "\nMissing user type";
				header('Location: main.php');
				exit();
			}
			if(!empty($user) && !empty($pass)){
				if($usertype == 'F'){

					$_SESSION['emptyErr'] = "";
					$result = $conn->query($sqlF); 
					$row = mysqli_fetch_array($result);
					if($row > 0){

					    if($row[reviewerType]=="C")

                        {
                            $_SESSION['user'] = $row['username'];
                            $_SESSION['pass'] = $row['passwrd'];
                            $_SESSION['userID'] = $row['fID'];
                            $_SESSION['fname'] = $row['fname'];
                            header('Location: facultyCAC.php');
                            exit();
                        }
					    else if($row[reviewerType]=="R")
                        {
                            $_SESSION['user'] = $row['username'];
                            $_SESSION['pass'] = $row['passwrd'];
                            $_SESSION['userID'] = $row['fID'];
                            $_SESSION['fname'] = $row['fname'];
                            header('Location: facultyReviewer.php');
                            exit();
                        }else{
					        $_SESSION['user'] = $row['username'];
                            $_SESSION['pass'] = $row['passwrd'];
                            $_SESSION['userID'] = $row['fID'];
                            $_SESSION['fname'] = $row['fname'];
                            header('Location: faculty.php');
                            exit();
					    }
					}
					$_SESSION['emptyErr'] = "Invalid credentials!";
					header("Location: main.php");
					exit();
				}else if($usertype == 'G'){
					$_SESSION['emptyErr'] = "";
					$result = $conn->query($sqlG);
					$row = mysqli_fetch_array($result); 
					if($row > 0){
						$_SESSION['user'] = $row['username'];
						$_SESSION['pass'] = $row['passwrd'];
						$_SESSION['userID'] = $row['fID'];
						$_SESSION['fname'] = $row['fname'];
						header('Location: gs.php');
						exit();
					}
					$_SESSION['emptyErr'] = "Invalid credentials!";
					header("Location: main.php");
					exit();
				}else if($usertype == 'A'){
					$_SESSION['emptyErr'] = "";
					$result = $conn->query($sqlA);
					$row = mysqli_fetch_array($result);
					if($row > 0){
						$_SESSION['user'] = $row['username'];
						$_SESSION['pass'] = $row['passwrd'];
						$_SESSION['userID'] = $row['fID'];
						$_SESSION['fname'] = $row['fname'];
						header('Location: sa.php');
						exit();
					}
				}
        
        else if($usertype == 'V'){
					$_SESSION['emptyErr'] = "";
					$result = $conn->query($sqlV);
					$row = mysqli_fetch_array($result); 
					if($row > 0){
						$_SESSION['user'] = $row['username'];
						$_SESSION['pass'] = $row['passwrd'];
						$_SESSION['userID'] = $row['fID'];
						$_SESSION['fname'] = $row['fname'];
						header('Location: advisor.php');
						exit();
					}
					$_SESSION['emptyErr'] = "Invalid credentials!";
					header("Location: main.php");
					exit();
				}
				
        
        
        
        else if($usertype == 'S'){
					$_SESSION['emptyErr'] = "";
					$result = $conn->query($sqlSt);
					$row = mysqli_fetch_array($result);
    				if($row > 0){	
						$_SESSION['user'] = $row['username'];
						$_SESSION['pass'] = $row['passwrd'];
						$_SESSION['userID'] = $row['sID'];
						$_SESSION['fname'] = $row['fname'];
						header("Location: student.php");
						exit();
					}
					 $_SESSION['emptyErr'] = "Invalid credentials!";
					 header("Location: main.php");
					exit();
				}
			}else{
				$_SESSION['emptyErr'] = "\nMissing username and/or password!";
				header('Location: main.php');
				exit();
			}
		?>
	</body>
</html>