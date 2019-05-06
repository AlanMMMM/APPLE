<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Send Transcript Online</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
    <h2>Send A Transcript Submission Link</h2>
</head>
<body>

<form style="text-align: center;"  method="post">
    Send Link To:<input type="email" required="required" name="email">
    <input type="submit" name="send" value="Send Link Now">
</form>
<?php
if(isset($_POST['send']))
{
    $email=$_POST['email'];
    $servername= "localhost";
    $username = "amstg";
    $password = "seas";
    $dbname = "amstg";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $uid = $_SESSION["uid"];
    $pQuery = "SELECT * FROM applicant WHERE uid=$uid";
    $userResult=$conn->query($pQuery) or die("mysql error".$mysqli->error);
    $row= mysqli_fetch_array($userResult);
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $msg1 = "Send the transcript for " . $first_name . " " . $last_name . " by following the link below: \n" . "Student Id number is: " . $uid . " \n" . "http://gwupyterhub.seas.gwu.edu/~sp19DBp2-404TeamNotFound/404TeamNotFound/APPLE-APPS/LogIn/transcript.php";
    $mail1=mail("$email","Transcript Request","$msg1");
    if(!$mail1){

        echo "There was a problem sending the link, please try again or contact an administrator for assistance.\n" . $mail1.$mail2.$mail3;
        $conn->close();
    }else{
        echo "Link Sent Successfully Now You can go back";
        $conn->close();
    }
}
?>
<form style="text-align: center;"  method="post" action="mainpage.php">
    <input type="submit" name="goB" value="Go Back">
</form>
</body>
</html>

