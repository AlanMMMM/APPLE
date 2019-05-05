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
      $app_year = $_POST['app_year'];
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
      $rec_email1 = $_POST['rec_email1'];
      $rec_email2 = $_POST['rec_email2'];
      $rec_email3 = $_POST['rec_email3'];
      $uid = $_SESSION["uid"];
      $TOEFL_year = $_POST['TOEFL_year'];
      $GRE_score = $_POST['GRE_score'];
      $errCheck = 0;
      if($inputErr == 0){
      $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";

      // define connection variable
      $conn = mysqli_connect($servername,$username,$password,$dbname);
      // Check connection
      if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }

      // Check if app was already completed
      
      $query = "SELECT * from applicant where uid = $uid;";
      
      $result	=	mysqli_query($conn,$query);
      
      $num = mysqli_num_rows($result);
      
      if($num > 0){
        die("There is an Application on File, You can Edit your application on home page.");
        echo "<input type=button onClick=\"location.href='mainpage.php'\" value='Back to home page'>";
      }
      

          $msg1 = "Send a recommendation for " . $first_name . " " . $last_name . " by following the link below: \n" . "Student Id number is: " . $uid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp2-404TeamNotFound/404TeamNotFound/APPLE-APPS/LogIn/recommendation.html";
// use wordwrap() if lines are longer than 70 characters
          $msg1 = wordwrap($msg1,70);
// send email
          $mail1=mail("$rec_email1","Recommendation Letter Request","$msg1");

          $msg2 = "Send a recommendation for " . $first_name . " " . $last_name . " by following the link below: \n" . "Student Id number is: " . $uid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp2-404TeamNotFound/404TeamNotFound/APPLE-APPS/LogIn/recommendation.html";
// use wordwrap() if lines are longer than 70 characters
          $msg2 = wordwrap($msg2,70);
// send email
          $mail2=mail("$rec_email2","Recommendation Letter Request","$msg2");

          $msg3 = "Send a recommendation for " . $first_name . " " . $last_name . " by following the link below: \n" . "Student Id number is: " . $uid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp2-404TeamNotFound/404TeamNotFound/APPLE-APPS/LogIn/recommendation.html";
// use wordwrap() if lines are longer than 70 characters
          $msg3= wordwrap($msg3,70);
// send email
          $mail3=mail("$rec_email3","Recommendation Letter Request","$msg3");

          if(!$mail1||!$mail2||!$mail3){

              echo "There was a problem sending recommendation invitaiton, please try again or contact an administrator for assistance.\n" . $mail1.$mail2.$mail3;
      }
      else{
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
          $query = "INSERT INTO application (uid,ssn,street,city,state,zip,email,app_term,app_year,GRE_verbal,GRE_quantitative,exam_year,bachelor_school,bachelor_degree,bachelor_major,bachelor_year,bachelor_gpa,area_of_interest, degree_seeking, TOEFL_year, TOEFL_score,GRE_subject,GRE_score,masters_school,masters_degree,masters_major,masters_year,masters_gpa) VALUES ($uid, '$ssn', '$street', '$city', '$state', '$zip', '$email', '$app_term',$app_year, $GRE_verbal, $GRE_quantitative, $GRE_year, '$bachelor_school', '$bachelor_degree', '$bachelor_major', $bachelor_year, $bachelor_gpa, '$area_of_interest', '$degree', $TOEFL_year, $TOEFL,'$GRE_subject',$GRE_score,'$masters_school','$masters_degree','$masters_major',$masters_year,$masters_gpa);";
          $result	=	mysqli_query($conn,$query);
          if	($result)	{
              $errCheck++;
          }
          else	{
              echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);
          }
          $query = "INSERT INTO applicant (first_name,last_name,uid,app_status) VALUES ('$first_name','$last_name',$uid,'pending');";
          $result	=	mysqli_query($conn,$query);
          if	($result)	{
              $errCheck++;
          }
          else	{
              echo "Error:	"	.	$query	.	"<br/>"	.	mysqli_error($conn);
          }
          if($errCheck==2) {
              echo '<br />Thanks for submitting the application <br />';
          }else{
              echo "error submitting the application form";
          }
      }

}

      //close connection
      mysqli_close($conn);

    ?>
    <br />
  <input type=button onClick="location.href='mainpage.php'" value='Back to home page'>
  </body>
</html>
