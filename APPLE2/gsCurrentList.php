<!DOCTYPE html>
<?php session_start();?>
<html>

<head>
    <title>Current Students List</title>
    <link rel="stylesheet" href="style.css">
</head>



<h2 style="text-align:center;"> Welcome </h2>
<h3 style="text-align: center;"> Please Select A Way to Generate The List </h3>
<body>

<form style="text-align:center;"  method="post">
    Generate List By Admission Year: <select name="yearSelection" required="required">
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
        $yquery = "SELECT DISTINCT app_year FROM student";
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

        $mquery = "SELECT DISTINCT program FROM student";
        $mresult = $conn->query($mquery) or die("mysql error".$mysqli->error);

        while($mrow = mysqli_fetch_assoc($mresult)){
            $rowMajor=$mrow['program'];
            echo "<option value=\"$rowMajor\">".$rowMajor. "</option>";
        }
        ?>
    </select>
    <input type="submit" name="major" value="Select" />
</form>
<br />

<?php
if(isset($_POST['year'])){
    $selectq=$_POST['yearSelection'];

    $oQuery= "SELECT * FROM student A WHERE A.app_year='$selectq'";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Graduate Applicant List of ".$selectq." Year:<br>";
    while($oRow = mysqli_fetch_assoc($oResult)){
        echo $oRow["fname"]." ".$oRow["lname"]." ".$oRow["sID"]."<br>";
    }
}else if(isset($_POST['major'])){
    $selectq=$_POST['majorSelection'];

    $oQuery= "SELECT * FROM student A WHERE A.program='$selectq'";

    $oResult= $conn->query($oQuery) or die("mysql error".$mysqli->error);
    echo "Graduate Applicant List of ".$selectq." Degree Program:<br>";
    while($oRow = mysqli_fetch_assoc($oResult)){
        echo $oRow["fname"]." ".$oRow["lname"]." ".$oRow["sID"]."<br>";
    }
}
$conn->close();
?>




</body>
</html>