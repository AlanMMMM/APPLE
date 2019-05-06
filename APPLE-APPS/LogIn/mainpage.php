 <?php
session_start();
?>
 <head>
     <title>My Application</title>
     <link rel="stylesheet" href="../../APPLE2/style.css">
 </head>
 <h2>My Application</h2>

 <form   method="post" action="application.php">
     <input type="submit" name="apply" value="New Application">
 </form>
 <br>
 <br>
 <form   method="post" action="status.php">
     <input type="submit" name="status" value='Application Status'>
 </form>
 <br>
 <br>
 <form   method="post" action="updateApplication.php">
     <input type="submit" name="update" value='Update Application Infromation'>
 </form>
 <br>
 <br>
 <form   method="post" action="sendTranscriptLink.php">
     <input type="submit" name="transcript" value='Send Transcript Online'>
 </form>
 <br>
 <br>
 <form   method="post" action="login.php">
     <input type="submit" name="goBack" value='LOG OUT'>
 </form>
 <br>
 <br>




  <?php
echo "Your ID number is: " . $_SESSION["uid"]; 
?>
 
 
