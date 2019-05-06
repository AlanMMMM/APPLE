
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

if(isset($_POST['decisionRec'])&& isset($_POST['decisionRecUID'])){
    $addingq=$_POST['decisionRec'];
    $commentq=$_POST['decisionRecCom'];
    $defq=$_POST['decisionRecDef'];
    $fid=$_SESSION['userID'];
    $addingqUID=$_POST['decisionRecUID'];
    $rejReaq=$_POST['rejRea'];
        $recAdvq=$_POST['decisionRecAdv'];

    $check="SELECT * from applicant A WHERE A.uid='$addingqUID'";
    $checkResult=$conn->query($check) or die("mysql error".$mysqli->error);

    if($checkResult->num_rows==0){
    echo "No Applicant Found";
    }else{

        while($cRow=$checkResult->fetch_assoc()){
            $recNum=$cRow["app_rec_received"];
        }

        if($recNum==0) {
            $aQuery = "UPDATE applicant A SET A.app_rec_received=1,A.rev_by1=$fid,A.app_rec1='$addingq',A.app_rec_advisor1='$recAdvq', A.reason_for_reject1='$rejReaq',A.app_rec_comment1='$commentq', A.app_deficiency_courses1='$defq' WHERE A.uid='$addingqUID'";
            $aResult = $conn->query($aQuery) or die("mysql error" . $mysqli->error);
        }
        if($recNum==1) {
            $aQuery = "UPDATE applicant A SET A.app_rec_received=2,A.rev_by2=$fid,A.app_rec2='$addingq',A.app_rec_advisor2='$recAdvq', A.reason_for_reject2='$rejReaq',A.app_rec_comment2='$commentq', A.app_deficiency_courses2='$defq' WHERE A.uid='$addingqUID'";
            $aResult = $conn->query($aQuery) or die("mysql error" . $mysqli->error);
        }
        if($recNum==3) {
            $aQuery = "UPDATE applicant A SET A.app_status='reviewed',A.app_rec_received=3,A.rev_by3=$fid,A.app_rec3='$addingq',A.app_rec_advisor3='$recAdvq', A.reason_for_reject3='$rejReaq',A.app_rec_comment3='$commentq', A.app_deficiency_courses3='$defq' WHERE A.uid='$addingqUID'";
            $aResult = $conn->query($aQuery) or die("mysql error" . $mysqli->error);
        }
    if($aResult==TRUE) {
        echo "decision recommendation updated successfully";
    }else{
        echo "failed to make decision recommendation, please try again";
    }}
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
<form style="text-align: center;" action="applicationCompleteList.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />
</form>
<br><br><br><br>
</body>
</html>
