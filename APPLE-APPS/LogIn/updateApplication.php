<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update My Application</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>
<body>
<h2>Update My Application</h2>
<form style="text-align: center;" action="updateApplicationProcessing" method="post">
    Select A Info Type: <select name="infoSelection" required="required">
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
        $squery = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'amstg' AND TABLE_NAME = 'application';";
        $sresult = $conn->query($squery) or die("mysql error".$mysqli->error);

        while($srow = mysqli_fetch_assoc($sresult)){
            $rowTerm=$srow['COLUMN_NAME'];
            if($rowTerm=='ssn') {
                echo "<option value=\"$rowTerm\">" . "Social Security Number" . "</option>";
            }
            if($rowTerm=='street') {
                echo "<option value=\"$rowTerm\">" . "Street Address" . "</option>";
            }
            if($rowTerm=='city') {
                echo "<option value=\"$rowTerm\">" . "City" . "</option>";
            }
            if($rowTerm=='state') {
                echo "<option value=\"$rowTerm\">" . "State" . "</option>";
            }
            if($rowTerm=='zip') {
                echo "<option value=\"$rowTerm\">" . "Zip Code" . "</option>";
            }
            if($rowTerm=='email') {
                echo "<option value=\"$rowTerm\">" . "Email Address" . "</option>";
            }
            if($rowTerm=='app_term') {
                echo "<option value=\"$rowTerm\">" . "Application Semester" . "</option>";
            }
        }

        ?>
    </select>
    <input type="submit" name="semester" value="Select" />

</form>
<br><br><br><br>
</body>
</html>
