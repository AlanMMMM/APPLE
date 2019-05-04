 <?php
session_start();
//print_r($_SESSION);
?>
<html>	

    <head>
        <title>My Status</title>
        <link rel="stylesheet" href="../../APPLE2/style.css">
    </head>

<body>	
	<h1>Application status:</h1>	
<?php		
  
    $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
   }
   $uid = $_SESSION["uid"];
  
   $query = "SELECT * FROM applicant WHERE uid = $uid;";
 
   $result = mysqli_query($conn,$query);
   
   
   $num = mysqli_num_rows($result);
          
            if($num==0)  
 {  
    die("Application has not been completed");
              }   

   
   
   
   if($result){
   echo "<table style = width:30%>"; 

   $row = mysqli_fetch_array($result);   // Goes through results and displays them
   echo "<tr><td>" . "Application form status:" . "</td><td>" . "Transcript received:" . "</td><td>" . "Recommendation received:" . "</td></tr>";
   echo "<tr><td>" . "Completed" . "</td><td>" . $row['transcript_received'] . "</td><td>" . $row['rec_received'] . "</td></tr>";  
   

   echo "</table>" . "<br />"; 
   }
   
   else {
   //echo "Error: " . $query . "<br>" . mysqli_error($conn);
   echo "There was an error getting your status, please log out and back in to your account";
   } 

   
   if($row['transcript_received'] == "No" || $row['rec_received'] == "No"){
     echo "Your application has not been completed";
   }
   else{
     if($row['decision'] == 0)
       echo "<br />Your application has been completed and is under review";
     if($row['decision'] == 3){
       echo "<br />Your application has been denied<br>";
       
     }
     if($row['decision'] == 2){
       echo "<br />You have been accepted into GWU your acceptance letter will be mailed<br />";
       echo "Your advisor will be: " . $row['app_rec_advisor']."<br />";
         if($row['accept_offer']==0) {
             echo "<form action=\"acceptOrDecline.php\" method=\"post\">
    <input type=\"submit\" name=\"goAccept\" value=\"Accept The Offer\" /></form><br />";
             echo "<form action=\"acceptOrDecline.php\" method=\"post\">
    <input type=\"submit\" name=\"goDecline\" value=\"Decline The Offer\" /></form><br />";
         }
         if($row['accept_offer']==1&&$row['payment']==0){
             echo "<input type=button onClick=\"location.href='payment.php'\" value='Make Your Payment'></body></html>";
         }
         if($row['accept_offer']==1&&$row['payment']==1){
             echo " <input type=button onClick=\"location.href='../../APPLE2/login.php'\" value='Student Portal'>";
         }
         if($row['accept_offer']==2){
             echo "You've declined the offer.";
         }
     }

     if($row['decision'] == 1){
       echo "<br />You have been accepted into GWU with aid your acceptance letter will be mailed<br />";
       echo "Your advisor will be: " . $row['app_rec_advisor']."<br />";
       if($row['accept_offer']==0) {
           echo "<form action=\"acceptOrDecline.php\" method=\"post\">
    <input type=\"submit\" name=\"goAccept\" value=\"Accept The Offer\" /></form><br />";
           echo "<form action=\"acceptOrDecline.php\" method=\"post\">
    <input type=\"submit\" name=\"goDecline\" value=\"Decline The Offer\" /></form><br />";
       }
       if($row['accept_offer']==1&&$row['payment']==0){
           echo "<input type=button onClick=\"location.href='payment.php'\" value='Make Your Payment'></body></html>";
       }
       if($row['accept_offer']==1&&$row['payment']==1){
           echo " <input type=button onClick=\"location.href='../../APPLE2/login.php'\" value='Student Portal'>";
       }
         if($row['accept_offer']==2){
             echo "You've declined the offer.";
         }
     }
   }
   
   
   mysqli_close($conn);
?>
<br />

  <input type=button onClick="location.href='mainpage.php'" value='Back to home page'>
</body>
</html>
