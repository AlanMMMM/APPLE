<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recommendation Letter Submission</title>
</head>
  <body>

    <?php
      $id_num = $_POST['id_num'];
      $recommendation = $_POST['rec'];
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $title=$_POST['title'];
   $servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";

      // define connection variable
      
      $conn = mysqli_connect($servername,$username,$password,$dbname);

      // Check connection
      
      if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }
      else{
        //echo "Connection successful <br/>";
      }
      
      

      // define the sql_insert_query
      
      $query = "INSERT INTO recommendation (rec_fname, rec_lname, rec_title,rec_letter,uid) VALUES ($fname,$lname,$title,$rec,$id_num)";
      
      $result	=	mysqli_query($conn,$query);
      
      if	($result)	{	
        //echo		"Thank you for sending a recommendation letter, you can now close this tab.	<br/>";
          $query = "UPDATE applicant SET rec_received = 'Yes' WHERE uid = $uid;";

          $result	=	mysqli_query($conn,$query);

          if	($result)	{
              echo		"Thank you for sending a recommendation letter, you can now close this tab.	<br/>";
          }
          else	{
              //echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);
              echo "The reccomendation could not be submitted, Check Student ID number";
          }
      }	
      else	{	
        echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);	
      }	
      

      

      


      //close connection
      mysqli_close($conn);

    ?>

  </body>
</html>
