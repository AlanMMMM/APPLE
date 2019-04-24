 <?php
session_start();
?>
 <head>
     <title>My Application</title>
     <link rel="stylesheet" href="../../APPLE2/style.css">
 </head>
<input type=button onClick="location.href='aplication.php'" value='Apply'>
  <br />  
    <br />  
    <br />  
    <br />  
    <br />  
    <br />  
    <br />  
 
<input type=button onClick="location.href='status.php'" value='Status'>
 <br />
 
 
  <br />  
    <br />  
    <br />  
    <br />  
    <br />  
    <br />  
    <br />  

 <input type=button onClick="location.href='login.php'" value='Log off'>
 <br /><br />
  <?php
echo "Your ID number is: " . $_SESSION["uid"]; 
?>
 
 
