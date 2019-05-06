<?php
session_start();
?>
<html>
<head>
    <title>Send Transcript Online</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
    <h2>Submit Transcript</h2>
</head>
<body>

<form method="post" >
    Student Id number(referred in Email):<input type="number" name="id_num" required="required" max="99999999"/><br /><br />


    Attach Transcript PDF File Here: <br />
    <input type="file" required="required" name="transcriptFile" accept=".pdf"><br />




    <input type="submit" value="Submit Recommendation" name="submit" /><br/><br/>
</form>
<?php
if(isset($_POST['submit']))
{
    $servername= "localhost";
    $username = "amstg";
    $password = "seas";
    $dbname = "amstg";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $uid = $_SESSION["uid"];
    $query="UPDATE applicant SET transcript_received='Yes' WHERE uid=$uid";
    $result=$conn->query($query) or die("mysql error".$mysqli->error);
    if($result)
    {
        echo "Transcript Received! Thank You";
    }else{
        echo "Transcript submission failed. Check your file and student id";
    }
}
?>
</body>
</html>