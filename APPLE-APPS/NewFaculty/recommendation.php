<!DOCTYPE html>
<html>
<head>
    <title>Recommendation Letter</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>
<body>
<h2 style="text-align:center;"> Now please View and Grade the Recommendation Letter</h2>
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
if(isset($_POST['goSelect'])) {
    $rid = $_POST['selection'];
    $rQuery = "SELECT * FROM recommendation WHERE rid=$rid";
    $rResult = $conn->query($rQuery) or die("rresult wrong" . $mysqli->error);
    while ($rRow = $rResult->fetch_assoc()) {
        echo "Recommendation Letter ID: " . $rRow["rid"] . "<br>";
        echo "Recommender: " . $rRow["rec_fname"] . " " . $rRow["rec_lname"] . "<br>";
        echo "Recommender Tittle: " . $rRow["rec_title"] . "<br>";
        echo "Recommendation Letter Content: " . "<br>";
        echo $rRow["rec_letter"] . "<br>" . "<br>";
    }
}
?>
<form style="text-align: center;"  method="post">
    Recommendation Letter Rating: (Worst=1, Best=5) <select name="recRating" required="required">
        <option disabled selected value> -- select a score -- </option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=1>3</option>
        <option value=2>4</option>
        <option value=1>5</option>
    </select><br>
    Is the Recommendation Letter Generic? <select name="recGen" required="required">
        <option disabled selected value> -- select YES or NO -- </option>
        <option value="Y">Yes</option>
        <option value="N">No</option>
    </select><br>
    Is the Recommendation Letter Credible? <select name="recCre" required="required">
        <option disabled selected value> -- select YES or NO -- </option>
        <option value="Y">Yes</option>
        <option value="N">No</option>
    </select><br>
    <input type="submit" name="rate" value="Submit">
</form>
<?php

if(isset($_POST['rate'])) {
    echo "rid".$rid;
    $recGenq=$_POST['recGen'];
    $recCreq=$_POST['recCre'];
    $recRatingq=$_POST['recRating'];
    $aQuery = "UPDATE recommendation  SET  rec_rating=$recRatingq, rec_generic='$recGenq', rec_credible='$recCreq' WHERE rid=$rid";
    $aResult = $conn->query($aQuery) or die("aResult Wrong $mysqli->error" . $mysqli->error);
    if($aResult==TRUE) {
        echo "Grade Recommendation Letter Successfully";
    }else{
        echo "failed to make decision recommendation, please try again";
    }
    $conn->close();
}

?>
<form style="text-align: center;" action="reviewing.php" method="post">
    <input type="submit" name="goBackFromRec" value="GO BACK">
</form>
</body>
</html>

