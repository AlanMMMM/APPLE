<?php
session_start();
?>
<html>

<head>
    <title>My Decision</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>

<body>
<h1>Your Decision:</h1>

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

$row = mysqli_fetch_array($result);   // Goes through results and displays them

if(isset($_POST['goAccept'])){
$aQuery = "UPDATE applicant A SET A.accept_offer=1 WHERE A.uid='$uid'";

$checkResult=$conn->query($query) or die("mysql error".$mysqli->error);
if($checkResult->num_rows==0){
    echo "No Applicant Found";
}else{
    $aResult = $conn->query($aQuery) or die("mysql error".$mysqli->error);
    if($aResult==TRUE) {
        echo "Thank you for your choice! Now Please make your payment!<br />";
        echo "<input type=button onClick=\"location.href='payment.php'\" value='Make Your Payment'></body></html><br />";
        echo "<input type=button onClick=\"location.href='mainpage.php'\" value='Make Payment Later'></body></html><br />";
    }else{
        echo "failed to make your choice, please try again";
    }
}
}
if(isset($_POST['goDecline'])){
    $aQuery = "UPDATE applicant A SET A.accept_offer=2 WHERE A.uid='$uid'";

    $checkResult=$conn->query($query) or die("mysql error".$mysqli->error);
    if($checkResult->num_rows==0){
        echo "No Applicant Found";
    }else{
        $aResult = $conn->query($aQuery) or die("mysql error".$mysqli->error);
        if($aResult==TRUE) {
            echo "Sorry To Hear That! Please Consider Us Next Time!<br />";

        }else{
            echo "failed to make your choice, please try again";
        }
    }

}




mysqli_close($conn);
?>
<br />

<input type=button onClick="location.href='mainpage.php'" value='Back to home page'>
</body>
</html>

