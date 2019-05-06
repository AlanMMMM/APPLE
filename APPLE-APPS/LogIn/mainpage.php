 <?php
session_start();
?>
 <head>
     <title>My Application</title>
     <link rel="stylesheet" href="../../APPLE2/style.css">
 </head>
<input type=button onClick="location.href='aplication.php'" value='Apply'>
  <br />  

 
<input type=button onClick="location.href='status.php'" value='Status'>
 <br />

 <input type=button onClick="location.href='updateApplication.php'" value='Log off'>
 <br />

 <input type=button onClick="location.href='login.php'" value='Log off'>
 <br />



  <?php
echo "Your ID number is: " . $_SESSION["uid"]; 
?>
 
 
