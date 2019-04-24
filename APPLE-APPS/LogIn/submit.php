<?php
// Start the session
session_start();
//print_r($_SESSION);
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Submit</title>
</head>
  <body>

    <?php
      $first_name = $_POST['firstname'];
      $last_name = $_POST['lastname'];
      $email = $_POST['email'];
      $ssn = $_POST['ssn'];
      $date_of_birth = $_POST['date_of_birth'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $street = $_POST['street'];
      $zip = $_POST['zip'];
      $degree = $_POST['degree'];
      $app_term = $_POST['app_term'];
      $area_of_interest = $_POST['area_of_interest'];
      $bachelor_school = $_POST['bachelor_school'];
      $bachelor_degree = $_POST['bachelor_degree'];
      $bachelor_major = $_POST['bachelor_major'];
      $bachelor_year = $_POST['bachelor_year'];
      $bachelor_gpa = $_POST['bachelor_gpa'];
      $masters_school = $POST['masters_school'];
      $masters_degree = $_POST['masters_degree'];
      $masters_major = $_POST['masters_major'];
      $masters_year = $_POST['masters_year'];
      $masters_gpa = $_POST['masters_gpa'];
      $work_experience = $_POST['work_experience'];
      $GRE_verbal = $_POST['GRE_verbal'];
      $GRE_quantitative = $_POST['GRE_quantitative'];
      $GRE_year = $_POST['GRE_year'];
      $GRE_subject = $_POST['GRE_subject'];
      $TOEFL = $_POST['TOEFL'];
      $rec_fname = $_POST['rec_fname'];
      $rec_lname = $_POST['rec_lname'];
      $rec_title = $_POST['rec_title'];
      $rec_email = $_POST['rec_email'];
      $uid = $_SESSION["uid"];
      $TOEFL_year = $_POST['TOEFL_year'];
      $GRE_score = $_POST['GRE_score'];
      $errCheck = 0;
      $inputErr = 0;
      
      // Input check

      
      if (!preg_match("/^[0-9]*$/",$ssn)) {
      echo "Only numbers allowed for ssn\n";
      $inputErr++; 
    }
    
    if (!preg_match("/^[0-9]*$/",$zip)) {
      echo "Only numbers allowed for zip\n";
      $inputErr++; 
    }
    
    if (!preg_match("/^[0-9]*$/",$bachelor_year)) {
      echo "Only numbers allowed for your bachelor year\n";
      $inputErr++; 
    }
    
    
    if (!preg_match("/^[0-9]*$/",$masters_year)) {
      echo "Only numbers allowed for your masters year\n";
      $inputErr++; 
    }
    
    
    if (!preg_match("/^[0-9]*$/",$GRE_score)) {
      echo "Only numbers allowed for your masters gpa\n";
      $inputErr++; 
    }
    
    
    if (!preg_match("/^[0-9]*$/",$GRE_verbal)) {
      echo "Only numbers allowed for your GRE verbal\n";
      $inputErr++; 
    }
    
    if (!preg_match("/^[0-9]*$/",$GRE_quantitative)) {
      echo "Only numbers allowed for your GRE quantitative\n";
      $inputErr++; 
    }
    
    if (!preg_match("/^[0-9]*$/",$GRE_year)) {
      echo "Only numbers allowed for your bachelor year\n";
      $inputErr++; 
    }
    
    if($TOEFL != ""){
    if (!preg_match("/^[0-9]*$/",$TOEFL)) {
      echo "Only numbers allowed for your TOEFL\n";
      $inputErr++; 
    }
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$email' is of an invalid format.\n";
    $inputErr++;
}  

    if (!filter_var($rec_email, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$email' is of an invalid format.\n";
    $inputErr++;
} 

      // End input check, continue if no errors

      if($inputErr == 0){
      $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";
      /*
      $servername = "localhost";
      $username = "";
      $password = "Chucknorris123!";
      $dbname = "davidealejos";
      */
      // define connection variable
      
      $conn = mysqli_connect($servername,$username,$password,$dbname);

      // Check connection
      
      if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }
      else{
        //echo "Connection successful <br/>";
      }
      
      
      // Check if app was already completed
      
      $query = "SELECT * from applicant where uid = $uid;";
      
      $result	=	mysqli_query($conn,$query);
      
      $num = mysqli_num_rows($result);
      
      if($num > 0){
        die("You have already sent an application.");
        //<input type=button onClick="location.href='mainpage.php'" value='Back to home page'>"
      }
      
      

      
  
      // define the sql_insert_query
      
      // Need to get uid from somewhere (PHP SESSION) using 4 for testing
      // Using 3 for rid (needs to change to auto increment)
      
      $query = "INSERT INTO recommendation (rec_fname,rec_lname,rec_title,uid) VALUES ('$rec_fname','$rec_lname','$rec_title',$uid);";
      
      $result	=	mysqli_query($conn,$query);
      
      if	($result)	{	
        $errCheck++;
        //echo		"New	record	created	successfully	<br/>";	
      }	
      else	{	
        echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);	
      }
      
      
      if(empty($_POST['GRE_score'])){
        $GRE_score = "NULL";
      }
      
      if(empty($_POST['masters_gpa'])){
        $masters_gpa = "NULL";
      }
      
      if(empty($_POST['masters_year'])){
        $masters_year = "NULL";
      }
      
      if(empty($_POST['TOEFL'])){
        $TOEFL = "NULL";
      }
      
      if(empty($_POST['TOEFL_year'])){
        $TOEFL_year = "NULL";
      }
      
        $query = "INSERT INTO application (uid,ssn,street,city,state,zip,email,app_term,GRE_verbal,GRE_quantitative,exam_year,bachelor_school,bachelor_degree,bachelor_major,bachelor_year,bachelor_gpa,area_of_interest, degree_seeking, TOEFL_year, TOEFL_score,GRE_subject,GRE_score,masters_school,masters_degree,masters_major,masters_year,masters_gpa) VALUES ($uid, '$ssn', '$street', '$city', '$state', '$zip', '$email', '$app_term', $GRE_verbal, $GRE_quantitative, $GRE_year, '$bachelor_school', '$bachelor_degree', '$bachelor_major', $bachelor_year, $bachelor_gpa, '$area_of_interest', '$degree', $TOEFL_year, $TOEFL,'$GRE_subject',$GRE_score,'$masters_school','$masters_degree','$masters_major',$masters_year,$masters_gpa);";
      
      
      
      $result	=	mysqli_query($conn,$query);
      
      if	($result)	{	
        $errCheck++;
        //echo		"New	record	created	successfully	<br/>";	
      }	
      else	{	
        echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);	
      }
      
      
      $query = "INSERT INTO applicant (first_name,last_name,uid,app_status) VALUES ('$first_name','$last_name',$uid,'pending');";
      
      $result	=	mysqli_query($conn,$query);
      
      if	($result)	{	
        $errCheck++;
        //echo		"New	record	created	successfully	<br/>";	
      }	
      else	{	
        echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);	
      }
      
      
      
      if($errCheck == 3){
      
      $query = "SELECT max(rid) FROM recommendation;";
 
   $result = mysqli_query($conn,$query);
   if($result){

   $row = mysqli_fetch_array($result);
   $rid = $row['max(rid)'];
   
   }   
      	
    
<<<<<<< HEAD
      $msg = "Send a recommendation for " . $first_name . " " . $last_name . " by following the link below: \n" . "Id number is: " . $rid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp1-XDJ/XDJ/LogIn/recommendation.html";
=======
      $msg = "Send a recommendation by following the link below: \n" . "Id number is: " . $rid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp1-XDJ/XDJ/LogIn/recommendation.html";
>>>>>>> 5409a7c30f2b4f723c954fdd1adf650ce6010c29

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($rec_email,"Recommendation",$msg); 


     
      echo '<br />Thanks for submitting the application <br />';
      }
      else{
        echo "There was a problem submiting your application, please try again or contact an administrator for assistance.\n" . $errCheck;
        echo "Youre subject score is: " . $GRE_score;
      }

}

      //close connection
      mysqli_close($conn);

    ?>
    <br />
  <input type=button onClick="location.href='mainpage.php'" value='Back to home page'>
  </body>
</html>
