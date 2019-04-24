<?php
    session_start();
    $currID = $_SESSION['currentID'];
    echo $currID;


$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    
    
          if($_SERVER[REQUEST_METHOD] == "POST")
          {
            if (($_POST["categories"]) == "approve" ) 
            {
              echo $currID;
              $sql4 = "UPDATE student SET hold = '0' WHERE sID = '$currID' ";
              $result4 = $conn->query($sql4);
              header('Location: approveHold.php');
            }
            if (($_POST["categories"]) == "reject" ) 
            {
              $sql4 = "UPDATE student SET hold = '1' WHERE sID = '$currID' ";
              $result4 = $conn->query($sql4);
              header('Location: approveHold.php');
            }
            
            
          }
    ?>