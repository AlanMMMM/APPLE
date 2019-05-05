<!DOCTYPE html>
<?php session_start();?>
<html>

<head>
    <title>stats</title>
    <link rel="stylesheet" href="style.css">
</head>



<h2 style="text-align:center;"> Application Statistics </h2>

<body>
<form style="text-align:center;"  method="post">
    View Stats By Application Semester: <select name="semesterSelection" required="required">
        <option disabled selected value> -- select an option -- </option>
        <?php
        $servername= "localhost";
        $username = "amstg";
        $password = "seas";
        $dbname = "amstg";

        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $squery = "SELECT DISTINCT A.app_term FROM application A, applicant B WHERE A.uid=B.uid";
        $sresult = $conn->query($squery) or die("mysql error".$mysqli->error);

        while($srow = mysqli_fetch_assoc($sresult)){
            $rowTerm=$srow['app_term'];
            echo "<option value=\"$rowTerm\">".$rowTerm . "</option>";
        }

        ?>
    </select>
    <input type="submit" name="semester" value="Select" />
</form>

<br />

<form style="text-align:center;"  method="post">
    Generate List By Application Year: <select name="yearSelection" required="required">
        <option disabled selected value> -- select an option -- </option>
        <?php

        $yquery = "SELECT DISTINCT A.app_year FROM application A, applicant B WHERE A.uid=B.uid";
        $yresult = $conn->query($yquery) or die("mysql error".$mysqli->error);

        while($yrow = mysqli_fetch_assoc($yresult)){
            $rowYear=$yrow['app_year'];
            echo "<option value=\"$rowYear\">".$rowYear. "</option>";
        }
        ?>
    </select>
    <input type="submit" name="year" value="Select" />
</form>
<br />

<form style="text-align:center;"  method="post">
    Generate List By Degree Program: <select name="majorSelection" required="required">
        <option disabled selected value> -- select an option -- </option>
        <?php

        $mquery = "SELECT DISTINCT A.area_of_interest FROM application A, applicant B WHERE A.uid=B.uid";
        $mresult = $conn->query($mquery) or die("mysql error".$mysqli->error);

        while($mrow = mysqli_fetch_assoc($mresult)){
            $rowMajor=$mrow['area_of_interest'];
            echo "<option value=\"$rowMajor\">".$rowMajor. "</option>";
        }
        ?>
    </select>
    <input type="submit" name="major" value="Select" />
</form>
<br />

<?php
if(isset($_POST['semester'])){
    $selectq=$_POST['semesterSelection'];

    $oQuery= "SELECT COUNT(A.uid) AS applicantsNumber FROM application A WHERE A.app_term='$selectq' ";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Applicants of ".$selectq." Semester: ";
    while($oRow = $oResult->fetch_assoc()){
        echo $oRow["applicantNumber"]."<br>";
    }

    $pQuery= "SELECT COUNT(A.uid) AS admissionNumber FROM application A, applicant B WHERE A.app_terrm='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $pResult= $conn->query($pQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Admitted Applicants of ".$selectq." Semester: ";
    while($pRow = $pResult->fetch_assoc()){
        echo $pRow["admissionNumber"]."<br>";
    }

    $qQuery= "SELECT COUNT(A.uid) AS rejectNumber FROM application A, applicant B WHERE A.app_terrm='$selectq' AND A.uid=B.uid AND B.decision=3";
    $qResult= $conn->query($qQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Rejected Applicants of ".$selectq." Semester: ";
    while($qRow = $qResult->fetch_assoc()){
        echo $qRow["rejectNumber"]."<br>";
    }

    $rQuery= "SELECT AVG(A.GRE_quantitative) AS avgGreQuan FROM application A, applicant B WHERE A.app_terrm='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $rResult= $conn->query($rQuery) or die("mysql error".$mysqli->error);
    echo "Average GRE Quantitative Score Of Admitted Applicants of ".$selectq." Semester: ";
    while($rRow = $rResult->fetch_assoc()){
        echo $rRow["avgGreQuan"]."<br>";
    }

    $sQuery= "SELECT AVG(A.GRE_math) AS avgGreMath FROM application A, applicant B WHERE A.app_terrm='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $sResult= $conn->query($sQuery) or die("mysql error".$mysqli->error);
    echo "Average GRE Math Score Of Admitted Applicants of ".$selectq." Semester: ";
    while($sRow = $sResult->fetch_assoc()){
        echo $sRow["avgGreMath"]."<br>";
    }




}else if(isset($_POST['year'])){
    $selectq=$_POST['yearSelection'];
    $oQuery= "SELECT COUNT(A.uid) AS applicantsNumber FROM application A WHERE A.app_year='$selectq' ";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Applicants of ".$selectq." : ";
    while($oRow = $oResult->fetch_assoc()){
        echo $oRow["applicantNumber"]."<br>";
    }

    $pQuery= "SELECT COUNT(A.uid) AS admissionNumber FROM application A, applicant B WHERE A.app_year='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $pResult= $conn->query($pQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Admitted Applicants of ".$selectq." : ";
    while($pRow = $pResult->fetch_assoc()){
        echo $pRow["admissionNumber"]."<br>";
    }

    $qQuery= "SELECT COUNT(A.uid) AS rejectNumber FROM application A, applicant B WHERE A.app_year='$selectq' AND A.uid=B.uid AND B.decision=3";
    $qResult= $conn->query($qQuery) or die("mysql error".$mysqli->error);
    echo "Total Number Of Rejected Applicants of ".$selectq." : ";
    while($qRow = $qResult->fetch_assoc()){
        echo $qRow["rejectNumber"]."<br>";
    }

    $rQuery= "SELECT AVG(A.GRE_quantitative) AS avgGreQuan FROM application A, applicant B WHERE A.app_year='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $rResult= $conn->query($rQuery) or die("mysql error".$mysqli->error);
    echo "Average GRE Quantitative Score Of Admitted Applicants of ".$selectq." : ";
    while($rRow = $rResult->fetch_assoc()){
        echo $rRow["avgGreQuan"]."<br>";
    }

    $sQuery= "SELECT AVG(A.GRE_math) AS avgGreMath FROM application A, applicant B WHERE A.app_year='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $sResult= $conn->query($sQuery) or die("mysql error".$mysqli->error);
    echo "Average GRE Math Score Of Admitted Applicants of ".$selectq." : ";
    while($sRow = $sResult->fetch_assoc()){
        echo $sRow["avgGreMath"]."<br>";
    }



}else if(isset($_POST['major'])) {
    $selectq = $_POST['majorSelection'];

    $oQuery = "SELECT COUNT(A.uid) AS applicantsNumber FROM application A WHERE A.area_of_interest='$selectq' ";

    $oResult = $conn->query($oQuery) or die("mysql error" . $mysqli->error);
    echo "Total Number Of Applicants of " . $selectq . " Major: ";
    while ($oRow = $oResult->fetch_assoc()) {
        echo $oRow["applicantNumber"] . "<br>";
    }

    $pQuery = "SELECT COUNT(A.uid) AS admissionNumber FROM application A, applicant B WHERE A.area_of_interest='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $pResult = $conn->query($pQuery) or die("mysql error" . $mysqli->error);
    echo "Total Number Of Admitted Applicants of " . $selectq . " Major: ";
    while ($pRow = $pResult->fetch_assoc()) {
        echo $pRow["admissionNumber"] . "<br>";
    }

    $qQuery = "SELECT COUNT(A.uid) AS rejectNumber FROM application A, applicant B WHERE A.area_of_interest='$selectq' AND A.uid=B.uid AND B.decision=3";
    $qResult = $conn->query($qQuery) or die("mysql error" . $mysqli->error);
    echo "Total Number Of Rejected Applicants of " . $selectq . " Major: ";
    while ($qRow = $qResult->fetch_assoc()) {
        echo $qRow["rejectNumber"] . "<br>";
    }

    $rQuery = "SELECT AVG(A.GRE_quantitative) AS avgGreQuan FROM application A, applicant B WHERE A.area_of_interest='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $rResult = $conn->query($rQuery) or die("mysql error" . $mysqli->error);
    echo "Average GRE Quantitative Score Of Admitted Applicants of " . $selectq . " Major: ";
    while ($rRow = $rResult->fetch_assoc()) {
        echo $rRow["avgGreQuan"] . "<br>";
    }

    $sQuery = "SELECT AVG(A.GRE_math) AS avgGreMath FROM application A, applicant B WHERE A.area_of_interest='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";
    $sResult = $conn->query($sQuery) or die("mysql error" . $mysqli->error);
    echo "Average GRE Math Score Of Admitted Applicants of " . $selectq . " Major: ";
    while ($sRow = $sResult->fetch_assoc()) {
        echo $sRow["avgGreMath"] . "<br>";
    }
}
$conn->close();
?>




</body>
</html>