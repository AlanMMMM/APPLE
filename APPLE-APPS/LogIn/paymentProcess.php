<?php
session_start();
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $uid = $_SESSION["uid"];
    $pQuery = "UPDATE applicant A SET A.payment=1 WHERE A.uid='$uid'";
    $sQuery = "";
    $check="SELECT * from applicant A WHERE A.uid='$uid'";
    $checkResult=$conn->query($check) or die("mysql error".$mysqli->error);
    $row = mysqli_fetch_array($checkResult);
    $user="SELECT * from user A WHERE A.uid='$uid'";
    $userResult=$conn->query($user) or die("mysql error".$mysqli->error);
    $rowUser = mysqli_fetch_array($userResult);
    $application="SELECT * from application A WHERE A.uid='$uid'";
    $appResult=$conn->query($application) or die("mysql error".$mysqli->error);
    $rowApp = mysqli_fetch_array($appResult);
    if($checkResult->num_rows==0){
        echo "No Applicant Found";
    }else{
        $pResult = $conn->query($pQuery) or die("mysql error".$mysqli->error);
        if($pResult==TRUE) {
            $fname=$row['first_name'];
            $lname=$row['last_name'];
            $appyear=$row['app_year'];
            $username=$rowUser['username'];
            $email=$rowApp['email'];
            $password=$rowUser['password'];
            $city=$rowApp['city'];
            $sQuery = "INSERT INTO student VALUES ('$fname', '$lname', '$username', '$email','Dawn Ginetti',1, '$password', $uid, 'cs', '$city',$appyear)";
            $sResult=$conn->query($sQuery) or die("mysql error".$mysqli->error);
            echo "Payment Received!";
            echo " <input type=button onClick=\"location.href='../../APPLE2/login.php'\" value='Student Portal'>";
        }else{
            echo "failed to make payment, please try again";
        }
    }
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>
<body>
<form style="text-align: center;" action="cac.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />

</form>
<br><br><br><br>
</body>
</html>