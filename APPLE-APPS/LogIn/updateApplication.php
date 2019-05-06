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
<form style="text-align: center;"  method="post">
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
            if($rowTerm=='app_year') {
                echo "<option value=\"$rowTerm\">" . "Application Year" . "</option>";
            }
            if($rowTerm=='GRE_verbal') {
                echo "<option value=\"$rowTerm\">" . "GRE Verbal Score" . "</option>";
            }
            if($rowTerm=='GRE_quantitative') {
                echo "<option value=\"$rowTerm\">" . "GRE Quantitative Score" . "</option>";
            }
            if($rowTerm=='exam_year') {
                echo "<option value=\"$rowTerm\">" . "GRE Exam Year" . "</option>";
            }
            if($rowTerm=='GRE_score') {
                echo "<option value=\"$rowTerm\">" . "GRE Subject Test Score" . "</option>";
            }
            if($rowTerm=='GRE_subject') {
                echo "<option value=\"$rowTerm\">" . "GRE Subject" . "</option>";
            }
            if($rowTerm=='TOEFL_score') {
                echo "<option value=\"$rowTerm\">" . "TOEFL Score" . "</option>";
            }
            if($rowTerm=='TOEFL_year') {
                echo "<option value=\"$rowTerm\">" . "TOEFL Exam Year" . "</option>";
            }
            if($rowTerm=='bachelor_school') {
                echo "<option value=\"$rowTerm\">" . "Bachelor Degree School" . "</option>";
            }
            if($rowTerm=='bachelor_degree') {
                echo "<option value=\"$rowTerm\">" . "Bachelor Degree Type" . "</option>";
            }
            if($rowTerm=='bachelor_major') {
                echo "<option value=\"$rowTerm\">" . "Bachelor Degree Major" . "</option>";
            }
            if($rowTerm=='bachelor_year') {
                echo "<option value=\"$rowTerm\">" . "Bachelor Degree Year" . "</option>";
            }
            if($rowTerm=='bachelor_gpa') {
                echo "<option value=\"$rowTerm\">" . "Bachelor Degree GPA" . "</option>";
            }
            if($rowTerm=='master_school') {
                echo "<option value=\"$rowTerm\">" . "Master Degree School" . "</option>";
            }
            if($rowTerm=='master_degree') {
                echo "<option value=\"$rowTerm\">" . "Master Degree Type" . "</option>";
            }
            if($rowTerm=='master_major') {
                echo "<option value=\"$rowTerm\">" . "Master Degree Major" . "</option>";
            }
            if($rowTerm=='master_year') {
                echo "<option value=\"$rowTerm\">" . "Master Degree Year" . "</option>";
            }
            if($rowTerm=='master_gpa') {
                echo "<option value=\"$rowTerm\">" . "Master Degree GPA" . "</option>";
            }
            if($rowTerm=='area_of_interest') {
                echo "<option value=\"$rowTerm\">" . "Area Of Interest" . "</option>";
            }
            if($rowTerm=='degree_seeking') {
                echo "<option value=\"$rowTerm\">" . "Degree Seeking" . "</option>";
            }
        }

        ?>
    </select>
    <input type="submit" name="change" value="Select" />
</form>
<br><br>
<form style="text-align: center;"  method="post">
    Change It To:
    <?php
    if(isset($_POST["change"])){
        $term=$_POST["infoSelection"];
        $_SESSION['term']=$term;
    if($term=='ssn') {
        echo "<input type=\"number\" required = \"required\" name=\"ssn\" max = \"999999999\" ><br />";
    }
    if($term=='street') {
        echo "<input type=\"text\" required = \"required\" name=\"street\" maxlength = \"20\" >";
    }
    if($term=='city') {
        echo "<input type=\"text\" required = \"required\" name=\"city\" maxlength = \"15\" >";
    }
    if($term=='state') {
        echo "<input type=\"text\" required = \"required\" name=\"state\" maxlength = \"15\" >";
    }
    if($term=='zip') {
        echo "<input type=\"number\" required = \"required\" name=\"zip\" max=\"99999\" min=\"10000\">";
    }
    if($term=='email') {
        echo "<input type=\"email\" required = \"required\" name=\"email\" >";
    }
    if($term=='app_term') {
        echo "<input type=\"radio\" required = \"required\" name=\"app_term\" value=\"Fall\"> Fall<br>
    <input type=\"radio\" name=\"app_term\" value=\"Spring\"> Spring<br>";
    }
    if($term=='app_year') {
        echo "<input type=\"number\" required=required name=\"app_year\" max=\"9999\" min=\"2019\">";
    }
    if($term=='GRE_verbal') {
        echo "<input type=\"number\"  required = \"required\" name=\"GRE_verbal\" max=\"999\" min=\"0\">";
    }
    if($term=='GRE_quantitative') {
        echo "<input type=\"number\" name=\"GRE_quantitative\" max=\"999\" min=\"0\" required = \"required\">";
    }
    if($term=='exam_year') {
        echo "<input type=\"number\" name=\"exam_year\" max=\"2020\" min=\"1000\" required = \"required\">";
    }
    if($term=='GRE_score') {
        echo "<input type=\"number\" name=\"GRE_score\" max=\"9999\" min=\"0\" required = \"required\"/>";
    }
    if($term=='GRE_subject') {
        echo "<input type=\"text\" name=\"GRE_subject\" maxlength = \"10\" required = \"required\"/>";
    }
    if($term=='TOEFL_score') {
        echo "<input type=\"number\" name=\"TOEFL_score\" max=\"120\" min=\"0\" required = \"required\"/>";
    }
    if($term=='TOEFL_year') {
        echo "<input type=\"number\" name=\"TOEFL_year\" max=\"9999\" min=\"1000\" required = \"required\"/>";
    }
    if($term=='bachelor_school') {
        echo "<input type=\"text\" required = \"required\" name=\"bachelor_school\" maxlength = \"25\" />";
    }
    if($term=='bachelor_degree') {
        echo "<input type=\"text\" required = \"required\" name=\"bachelor_degree\" maxlength = \"25\" />";
    }
    if($term=='bachelor_major') {
        echo "<input type=\"text\" required = \"required\" name=\"bachelor_major\" maxlength = \"25\" />";
    }
    if($term=='bachelor_year') {
        echo "<input type=\"number\" required = \"required\" name=\"bachelor_year\" max=\"2020\" min=\"1000\" >";
    }
    if($term=='bachelor_gpa') {
        echo "<input type=\"number\" step=\"0.01\" required = \"required\" name=\"bachelor_gpa\" />";
    }
    if($term=='master_school') {
        echo "<input type=\"text\" name=\"masters_school\" maxlength = \"25\" required = \"required\"/>";
    }
    if($term=='master_degree') {
        echo "<input type=\"text\" name=\"masters_degree\" maxlength = \"25\" required = \"required\"/>";
    }
    if($term=='master_major') {
        echo "<input type=\"text\" name=\"masters_major\" maxlength = \"25\" required = \"required\"/>";
    }
    if($term=='master_year') {
        echo "<input type=\"number\" name=\"masters_year\" max=\"2020\" min=\"1000\" required = \"required\">";
    }
    if($term=='master_gpa') {
        echo "<input type=\"number\" step=\"0.01\" name=\"masters_gpa\" required = \"required\"/>";
    }
    if($term=='area_of_interest') {
        echo "<input type=\"text\" required = \"required\" name=\"area_of_interest\"  maxlength = \"25\">";
    }
    if($term=='degree_seeking') {
        echo "<input type=\"radio\" required = \"required\" name=\"degree_seeking\" value=\"MS\"> MS<br>
    <input type=\"radio\" name=\"degree_seeking\" value=\"PHD\"> PHD<br>";
    }
    echo "<input type=\"submit\" name=\"changeTo\" value=\"SUBMIT\">";
    }
    ?>

</form>
<?php
if(isset($_POST["changeTo"]))
{
    $termm=$_SESSION['term'];
    echo $termm;
    if(isset($_POST["$termm"])) {

        $value=$_POST["$termm"];
        $uid=$_SESSION['uid'];
        echo $value;
        echo $uid;
        $cquery = "UPDATE application SET $termm='$value' WHERE uid=$uid";
        $cresult = $conn->query($cquery) or die("mysql error".$mysqli->error);
        if	($cresult)	{
            echo		"Updated Successfully	<br/>";
        }
        else	{
            echo "Error:	";
            echo "The Update could not be submitted";
        }
    }



}
?>
</body>
</html>
