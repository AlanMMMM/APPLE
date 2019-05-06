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
<form>
    <?php
    if(isset($_POST["change"]))
        $term=$_POST["infoSelection"];
    if($term=='ssn') {
        echo "<option value=\"$rowTerm\">" . "Social Security Number" . "</option>";
    }
    if($term=='street') {
        echo "<option value=\"$rowTerm\">" . "Street Address" . "</option>";
    }
    if($term=='city') {
        echo "<option value=\"$rowTerm\">" . "City" . "</option>";
    }
    if($term=='state') {
        echo "<option value=\"$rowTerm\">" . "State" . "</option>";
    }
    if($term=='zip') {
        echo "<option value=\"$rowTerm\">" . "Zip Code" . "</option>";
    }
    if($term=='email') {
        echo "<option value=\"$rowTerm\">" . "Email Address" . "</option>";
    }
    if($term=='app_term') {
        echo "<option value=\"$rowTerm\">" . "Application Semester" . "</option>";
    }
    if($term=='app_year') {
        echo "<option value=\"$rowTerm\">" . "Application Year" . "</option>";
    }
    if($term=='GRE_verbal') {
        echo "<option value=\"$rowTerm\">" . "GRE Verbal Score" . "</option>";
    }
    if($term=='GRE_quantitative') {
        echo "<option value=\"$rowTerm\">" . "GRE Quantitative Score" . "</option>";
    }
    if($term=='exam_year') {
        echo "<option value=\"$rowTerm\">" . "GRE Exam Year" . "</option>";
    }
    if($term=='GRE_score') {
        echo "<option value=\"$rowTerm\">" . "GRE Subject Test Score" . "</option>";
    }
    if($term=='GRE_subject') {
        echo "<option value=\"$rowTerm\">" . "GRE Subject" . "</option>";
    }
    if($term=='TOEFL_score') {
        echo "<option value=\"$rowTerm\">" . "TOEFL Score" . "</option>";
    }
    if($term=='TOEFL_year') {
        echo "<option value=\"$rowTerm\">" . "TOEFL Exam Year" . "</option>";
    }
    if($term=='bachelor_school') {
        echo "<option value=\"$rowTerm\">" . "Bachelor Degree School" . "</option>";
    }
    if($term=='bachelor_degree') {
        echo "<option value=\"$rowTerm\">" . "Bachelor Degree Type" . "</option>";
    }
    if($term=='bachelor_major') {
        echo "<option value=\"$rowTerm\">" . "Bachelor Degree Major" . "</option>";
    }
    if($term=='bachelor_year') {
        echo "<option value=\"$rowTerm\">" . "Bachelor Degree Year" . "</option>";
    }
    if($term=='bachelor_gpa') {
        echo "<option value=\"$rowTerm\">" . "Bachelor Degree GPA" . "</option>";
    }
    if($term=='master_school') {
        echo "<option value=\"$rowTerm\">" . "Master Degree School" . "</option>";
    }
    if($term=='master_degree') {
        echo "<option value=\"$rowTerm\">" . "Master Degree Type" . "</option>";
    }
    if($term=='master_major') {
        echo "<option value=\"$rowTerm\">" . "Master Degree Major" . "</option>";
    }
    if($term=='master_year') {
        echo "<option value=\"$rowTerm\">" . "Master Degree Year" . "</option>";
    }
    if($term=='master_gpa') {
        echo "<option value=\"$rowTerm\">" . "Master Degree GPA" . "</option>";
    }
    if($term=='area_of_interest') {
        echo "<option value=\"$rowTerm\">" . "Area Of Interest" . "</option>";
    }
    if($term=='degree_seeking') {
        echo "<option value=\"$rowTerm\">" . "Degree Seeking" . "</option>";
    }
    ?>
</form>
</body>
</html>
