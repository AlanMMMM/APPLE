<!DOCTYPE html>
<?php session_start();?>
<html>

<head>
    <title>Adimitted Students List</title>
    <link rel="stylesheet" href="style.css">
</head>



<h2 style="text-align:center;"> Welcome </h2>
<h3 style="text-align: center;"> Please Select A Way to Generate The List </h3>
<body>
<form style="text-align:center;"  method="post">
    Generate List By Application Semester: <select name="semesterSelection" required="required">
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
        $squery = "SELECT DISTINCT app_term FROM application A, applicant B WHERE B.decision=1 OR B.decision=2 AND A.uid=B.uid";
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

        $yquery = "SELECT DISTINCT app_year FROM application A, applicant B WHERE B.decision=1 OR B.decision=2 AND A.uid=B.uid";
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

        $mquery = "SELECT DISTINCT area_of_interest FROM application A, applicant B WHERE B.decision=1 OR B.decision=2 AND A.uid=B.uid";
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

    $oQuery= "SELECT * FROM application A, applicant B WHERE A.app_term='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Graduate Applicant List of ".$selectq." Semester:<br>";
    while($oRow = mysqli_fetch_assoc(oResult)){
        echo $oRow["first_name"]." ".$oRow["last_name"]." ".$oRow["uid"]."<br>";
    }
}else if(isset($_POST['year'])){
    $selectq=$_POST['yearSelection'];

    $oQuery= "SELECT * FROM application A, applicant B WHERE A.app_year='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Graduate Applicant List of ".$selectq." Year:<br>";
    while($oRow = mysqli_fetch_assoc(oResult)){
        echo $oRow["first_name"]." ".$oRow["last_name"]." ".$oRow["uid"]."<br>";
    }
}else if(isset($_POST['major'])){
    $selectq=$_POST['majorSelection'];

    $oQuery= "SELECT * FROM application A, applicant B WHERE A.area_of_interest='$selectq' AND A.uid=B.uid AND (B.decision=1 OR B.decision=2)";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Graduate Applicant List of ".$selectq." Degree Program:<br>";
    while($oRow = mysqli_fetch_assoc(oResult)){
        echo $oRow["first_name"]." ".$oRow["last_name"]." ".$oRow["uid"]."<br>";
    }
}
$conn->close();
?>




</body>
</html>