
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
$fid=$_SESSION["userID"];
if(isset($_POST['goBackFromRec'])){

    $recuid=$_SESSION["completeUid"];
    $selectq=$_SESSION["completeUid"];
    $oQuery = "SELECT * FROM applicant A, application B WHERE A.uid=$selectq AND A.uid=B.uid  AND A.app_status='completed' AND rev_by1!=$fid AND rev_by2!=$fid AND rev_by3!=$fid";

    $oResult= $conn->query($oQuery) or die("oResult Wrong $mysqli->error".$mysqli->error);


    while($oRow = $oResult->fetch_assoc()){
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>"."Name: ". $oRow["first_name"]." ".$oRow["last_name"]."</td>";
        echo "<td>"."Student UID: ". $oRow["uid"]."</td>";
        echo "Semester of Application: ". $oRow["app_term"]."</td>";
        echo "<td>"."Applying for Degree: ".$oRow["degree_seeking"]."</td>";
        echo "<td>"."Area of Interest: ". $oRow["area_of_interest"]."</td>";

        echo "<td>"."Exams"."</td>";
        echo "<td>"."GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $oRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$oRow["GRE_quantitative"]."</td>";
        echo "<td>"."Year of Exam: ".$oRow["exam_year"]."</td>";
        echo "<td>"."GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$oRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$oRow["GRE_subject"]."</td>";
        echo "<td>"."TOEFL Score: ".$oRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$oRow["TOEFL_year"]."</td>";

        echo "<td>"."Prior Degrees"."</td>";
        echo "<td>"."Bachelor Degree: ".$oRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$oRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$oRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$oRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$oRow["bachelor_school"]."</td>";
        echo "<td>"."Master Degree: ".$oRow["masters_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$oRow["masters_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$oRow["masters_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$oRow["masters_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$oRow["masters_school"]."</td>";

        echo "<td>"."Application Material"."</td>";
        echo "<td>"."Transcript Received: ". $oRow["transcript_received"]."</td>";
        echo "<td>"."Recommendation Letter Received: ". $oRow["rec_received"]."</td>";
        echo "</tr>";
        echo "</table>";
    }

}
else if(isset($_POST['goSelect'])){




    $selectq=$_POST['selection'];
    $recuid = $selectq;
    $_SESSION['completeUid'] = $recuid;



    $oQuery = "SELECT * FROM applicant A, application B, recommendation C WHERE A.uid=$selectq AND A.uid=B.uid AND A.uid=C.uid AND A.app_status='completed' AND rev_by1!=$fid AND rev_by2!=$fid AND rev_by3!=$fid";

    $oResult= $conn->query($oQuery) or die($mysqli->error);


    while($oRow = $oResult->fetch_assoc()){

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>"."Name: ". $oRow["first_name"]." ".$oRow["last_name"]."</td>";
        echo "<td>"."Student UID: ". $oRow["uid"]."</td>";
        echo "Semester of Application: ". $oRow["app_term"]."</td>";
        echo "<td>"."Applying for Degree: ".$oRow["degree_seeking"]."</td>";
        echo "<td>"."Area of Interest: ". $oRow["area_of_interest"]."</td>";

        echo "<td>"."Exams"."</td>";
        echo "<td>"."GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $oRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$oRow["GRE_quantitative"]."</td>";
        echo "<td>"."Year of Exam: ".$oRow["exam_year"]."</td>";
        echo "<td>"."GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$oRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$oRow["GRE_subject"]."</td>";
        echo "<td>"."TOEFL Score: ".$oRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$oRow["TOEFL_year"]."</td>";

        echo "<td>"."Prior Degrees"."</td>";
        echo "<td>"."Bachelor Degree: ".$oRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$oRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$oRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$oRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$oRow["bachelor_school"]."</td>";
        echo "<td>"."Master Degree: ".$oRow["masters_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$oRow["masters_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$oRow["masters_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$oRow["masters_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$oRow["masters_school"]."</td>";

        echo "<td>"."Application Material"."</td>";
        echo "<td>"."Transcript Received: ". $oRow["transcript_received"]."</td>";
        echo "<td>"."Recommendation Letter Received: ". $oRow["rec_received"]."</td>";
        echo "</tr>";
        echo "</table>";

    }

}else if(isset($_POST['goSearch'])){
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];

        $sQuery = "SELECT * FROM applicant A, application B WHERE A.uid=$searchq AND A.uid=B.uid  AND A.app_status='completed' AND rev_by1!=$fid AND rev_by2!=$fid AND rev_by3!=$fid";
        $sResult = $conn->query($sQuery) or die("mysql error".$mysqli->error);

        if($sResult->num_rows==0)
        {
            echo "No Applicant Found or Applicant Doesn't Complete Application";
        }else{
            while($sRow = $sResult->fetch_assoc()) {
                $recuid=$sRow["uid"];

                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>"."Name: ". $sRow["first_name"]." ".$sRow["last_name"]."</td>";
                echo "<td>"."Student UID: ". $sRow["uid"]."</td>";
                echo "Semester of Application: ". $sRow["app_term"]."</td>";
                echo "<td>"."Applying for Degree: ".$sRow["degree_seeking"]."</td>";
                echo "<td>"."Area of Interest: ". $sRow["area_of_interest"]."</td>";

                echo "<td>"."Exams"."</td>";
                echo "<td>"."GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $sRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$sRow["GRE_quantitative"]."</td>";
                echo "<td>"."Year of Exam: ".$sRow["exam_year"]."</td>";
                echo "<td>"."GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$sRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$sRow["GRE_subject"]."</td>";
                echo "<td>"."TOEFL Score: ".$sRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$sRow["TOEFL_year"]."</td>";

                echo "<td>"."Prior Degrees"."</td>";
                echo "<td>"."Bachelor Degree: ".$sRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$sRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$sRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$sRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$sRow["bachelor_school"]."</td>";
                echo "<td>"."Master Degree: ".$sRow["masters_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$sRow["masters_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$sRow["masters_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$sRow["masters_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$sRow["masters_school"]."</td>";

                echo "<td>"."Application Material"."</td>";
                echo "<td>"."Transcript Received: ". $sRow["transcript_received"]."</td>";
                echo "<td>"."Recommendation Letter Received: ". $sRow["rec_received"]."</td>";
                echo "</tr>";
                echo "</table>";

            }    }}
}else if(isset($_POST['goSearchLN'])){
    if(isset($_POST['searchLN'])){
        $searchq = $_POST['searchLN'];

        $sQuery = "SELECT * FROM applicant A, application B, recommendation C WHERE A.last_name='$searchq' AND A.uid=B.uid AND A.uid=C.uid AND A.app_status='completed' AND rev_by1!=$fid AND rev_by2!=$fid AND rev_by3!=$fid";
        $sResult = $conn->query($sQuery) or die("mysql error".$mysqli->error);

        if($sResult->num_rows==0)
        {
            echo "No Applicant Found";
        }else{
            while($sRow = $sResult->fetch_assoc()) {
                $recuid=$sRow["uid"];
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>"."Name: ". $sRow["first_name"]." ".$sRow["last_name"]."</td>";
                echo "<td>"."Student UID: ". $sRow["uid"]."</td>";
                echo "Semester of Application: ". $sRow["app_term"]."</td>";
                echo "<td>"."Applying for Degree: ".$sRow["degree_seeking"]."</td>";
                echo "<td>"."Area of Interest: ". $sRow["area_of_interest"]."</td>";

                echo "<td>"."Exams"."</td>";
                echo "<td>"."GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $sRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$sRow["GRE_quantitative"]."</td>";
                echo "<td>"."Year of Exam: ".$sRow["exam_year"]."</td>";
                echo "<td>"."GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$sRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$sRow["GRE_subject"]."</td>";
                echo "<td>"."TOEFL Score: ".$sRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$sRow["TOEFL_year"]."</td>";

                echo "<td>"."Prior Degrees"."</td>";
                echo "<td>"."Bachelor Degree: ".$sRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$sRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$sRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$sRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$sRow["bachelor_school"]."</td>";
                echo "<td>"."Master Degree: ".$sRow["masters_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$sRow["masters_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$sRow["masters_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$sRow["masters_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$sRow["masters_school"]."</td>";

                echo "<td>"."Application Material"."</td>";
                echo "<td>"."Transcript Received: ". $sRow["transcript_received"]."</td>";
                echo "<td>"."Recommendation Letter Received: ". $sRow["rec_received"]."</td>";
                echo "</tr>";
                echo "</table>";

            }}}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Application Review Advise</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>
<body>
<h2 style="text-align:center;"> Now please make a decision recommendation</h2>
<form style="text-align:center;" action="recommendation.php" method="post">
    View Recommendation Letter <select name="selection" required="required">
        <option disabled selected value> -- select a recommendation letter to view -- </option>
        <?php
        if(isset($_POST['goSearchLN'])) {
            if($sResult->num_rows!=0){
                $query = "SELECT * FROM applicant A,  recommendation C WHERE A.uid=$recuid  AND A.uid=C.uid AND A.app_status='completed'";
                $result = $conn->query($query) or die("mysql error" . $mysqli->error);

                while ($row = mysqli_fetch_assoc($result)) {
                    $rowRid = $row['rid'];
                    echo "<option value=\"$rowRid\">" . "Recommendation Letter From " . $row['rec_fname'] . " " . $row['rec_lname'] . "</option>";
                }
                $conn->close();
            }}
        if(isset($_POST['goSearch'])){
            if($sResult->num_rows!=0){
                $query = "SELECT * FROM applicant A,  recommendation C WHERE A.uid=$recuid  AND A.uid=C.uid AND A.app_status='completed'";
                $result = $conn->query($query) or die("mysql error" . $mysqli->error);

                while ($row = mysqli_fetch_assoc($result)) {
                    $rowRid = $row['rid'];
                    echo "<option value=\"$rowRid\">" . "Recommendation Letter From " . $row['rec_fname'] . " " . $row['rec_lname'] . "</option>";
                }
                $conn->close();
            }
        }
        if(isset($_POST['goSelect'])){
            if($oResult->num_rows!=0){
                $query = "SELECT * FROM applicant A,  recommendation C WHERE A.uid=$recuid  AND A.uid=C.uid AND A.app_status='completed'";
                $result = $conn->query($query) or die("mysql error" . $mysqli->error);

                while ($row = mysqli_fetch_assoc($result)) {
                    $rowRid = $row['rid'];
                    echo "<option value=\"$rowRid\">" . "Recommendation Letter From " . $row['rec_fname'] . " " . $row['rec_lname'] . "</option>";
                }
                $conn->close();
            }
        }
        if(isset($_POST['goBackFromRec'])){
            $query = "SELECT * FROM applicant A,  recommendation C WHERE A.uid=$recuid  AND A.uid=C.uid AND A.app_status='completed'";
            $result = $conn->query($query) or die("mysql error" . $mysqli->error);

            while ($row = mysqli_fetch_assoc($result)) {
                $rowRid = $row['rid'];
                echo "<option value=\"$rowRid\">" . "Recommendation Letter From " . $row['rec_fname'] . " " . $row['rec_lname'] . "</option>";
            }
            $conn->close();
        }
        ?>
    </select>
    <br><br>
    <input type="submit" name="goSelect" value="select" />
</form>

<form style="text-align: center;" action="makeRec.php" method="post">
    Student UID: (please type in numbers) <input type="number" required="required" name="decisionRecUID"><br>


    Decision Recommendation: <select name="decisionRec" required="required">

        <option disabled selected value> -- Make A Recommendation -- </option>
        <option value=1>Reject</option>
        <option value=2>borderline</option>
        <option value=3>admit without aid</option>
        <option value=4>admit with aid</option>
    </select><br>
    Reason for Rejection: <select name="rejRea">
        <option disabled selected value> -- Choose A Reason -- </option>
        <option value="A">Incomplete Record</option>
        <option value="B">Does not meet minimum Requirements</option>
        <option value="C">Problems with Letters</option>
        <option value="D">Not competitive</option>
        <option value="E">Other reasons</option>
    </select><br>
    Deficiency Courses if Any: (Max:40 Charactors)<input type="text" name="decisionRecDef" maxlength=40><br>
    Reviewer Comment: (Max:40 Charactors) <input type="text" name="decisionRecCom" maxlength=40><br>
    Recommend Advisor: (Max:40 Charactors) <input type="text" name="decisionRecAdv" maxlength=40><br>
    <input type="submit" value="Submit" >
</form>

<br><br><br><br>



</body>
</html>








