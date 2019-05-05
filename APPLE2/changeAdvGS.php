<!DOCTYPE html>
<?php session_start();?>
<html>

<head>
    <title>change Advisor</title>
    <link rel="stylesheet" href="style.css">
</head>



<h2 style="text-align:center;"> Change An Advisor </h2>

<body>
<form style="text-align:center;"  method="post">
    Chenge This Student's Advisor:  <input type="number" name="sID" max="99999999" required="required"><br>
    To:<select name="advisorSelection" required="required">
        <option disabled selected value> -- select an option -- </option>
        <?php

        $yquery = "SELECT *  FROM personnel WHERE personnelType='V'";
        $yresult = $conn->query($yquery) or die("mysql error".$mysqli->error);

        while($yrow = mysqli_fetch_assoc($yresult)){
            $rowadv=$yrow['fID'];
            echo "<option value=\"$rowadv\">".$yrow['fname']." ".$yrow['lname']. "</option>";
        }
        ?>
    </select>
    <input type="submit" name="changeAdv" value="Change" />
</form>

<br />

<?php
if(isset($_POST['changeAdv'])) {
    $advq = $_POST['advisorSelection'];
    $sidq = $_POST['sID'];

    $oQuery = "SELECT * FROM personnel WHERE fID=$advq ";
    $oResult = $conn->query($oQuery) or die("mysql error" . $mysqli->error);

    while ($oRow = $oResult->fetch_assoc()) {
        $advnameq = "$oRow[fname] $oRow[lname]";
    }
    $qQuery = "SELECT * FROM student WHERE sID=$sidq";
    $qResult = $conn->query($qQuery) or die("mysql error" . $mysqli->error);
    if ($qResult->num_rows == 0) {
        echo "No Students Found! Check sID! ";
    } else {
        $pQuery = "UPDATE student SET advisor='$advnameq' WHERE sID=$sidq";
        $pResult = $conn->query($pQuery) or die("mysql error" . $mysqli->error);
        echo "Total Number Of Admitted Applicants of " . $selectq . " Semester: ";
        while ($pRow = $pResult->fetch_assoc()) {
            echo $pRow["admissionNumber"] . "<br>";
        }
    }


}
$conn->close();
?>




</body>
</html>