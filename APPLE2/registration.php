<!DOCTYPE HTML>

<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Course Registration </h2>




  <form method="post" action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);">


      <label for="searchbar">Enter course ID: </label> <br />


      <input type="text" name="searchbar" required>
      <br>

      <input type="submit" value="Register" name="submit" />



    </form> <br/> <br/>

  <?php

  session_start();


  $userid = $_SESSION['userID'];


    $servername = "localhost";
    $username = "rmgordon";
    $password = "hockeyD8$";
    $dbname = "rmgordon";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }

      $searchTerm = $_POST["searchbar"];

      if($_SERVER[REQUEST_METHOD] == "POST")
      {

          $sql = "SELECT deptName, courseNumber, semester, startTime, day, endTime, creditHrs, preq1Dept, preq1Num, preq2Dept, preq2Num FROM course WHERE courseID = '$searchTerm' ";
          $result = $conn->query($sql);


          $check = "SELECT * FROM enroll WHERE courseID = '$searchTerm' AND sID = '$userid'";
          $checkRes = $conn->query($check);
          
          
          $check8 = "SELECT * FROM student WHERE sID = '$userid' AND hold = 0 ";
          $checkRes8 = $conn->query($check8);
          if(mysqli_fetch_array($checkRes8)!=0)
          {
  
            if($searchTerm > 0 && $searchTerm <= 20)
            {
              if(mysqli_fetch_array($checkRes)==0)
              {
                $row = mysqli_fetch_array($result);
                
  
                $time = "SELECT startTime FROM enroll WHERE startTime = '$row[startTime]' AND day = '$row[day]' AND sID = '$userid'";
                $checkTime = $conn->query($time);
  
                if(mysqli_fetch_array($checkTime)==0)
                {
                  $pre1 = "SELECT * FROM course WHERE courseID = '$searchTerm' AND preq1Dept = 'None' AND preq2Dept = 'None'";
                  $pre1Check = $conn->query($pre1);
  
  
                  if(mysqli_fetch_array($pre1Check) != 0)
                  {
                  $sql2 = "INSERT INTO enroll VALUES ('$userid', '$searchTerm', '$row[deptName]', '$row[courseNumber]', '$row[startTime]', '$row[endTime]', '$row[day]', '$row[semester]', '$row[creditHrs]', '2019', 'IP', NULL)";
  
                    $result2 = $conn->query($sql2);
                    echo "Successfully Registered";
                  }
  
                  else
                  {
                    $pre2 = "SELECT * FROM course WHERE courseID = '$searchTerm' AND preq1Dept != 'None' AND preq2Dept = 'None'";
                    $pre2Check = $conn->query($pre2);
  
                    if(mysqli_fetch_array($pre2Check) != 0)
                    {
                      $pre3 = "SELECT * FROM enroll WHERE sID = '$userid' AND deptName = '$row[preq1Dept]' AND courseNumber = '$row[preq1Num]' AND finalGrade != 'IP'";
                      $pre3Check = $conn->query($pre3);
                      if(mysqli_fetch_array($pre3Check) != 0)
                        {
                          $sql2 = "INSERT INTO enroll VALUES ('$userid', '$searchTerm', '$row[deptName]', '$row[courseNumber]', '$row[startTime]', '$row[endTime]', '$row[day]', '$row[semester]', '$row[creditHrs]', '2019', 'IP', NULL)";
  
                          $result2 = $conn->query($sql2);
  
                          echo "Successfully Registered";
                        }
                        else
                        {
                          echo "You do not have the required prequisites!";
                        }
                    }
                    else
                    {
                      $pre4 = "SELECT * FROM enroll WHERE sID = '$userid' AND deptName = '$row[preq1Dept]' AND courseNumber = '$row[preq1Num]' AND finalGrade != 'IP'";
                      $pre4Check = $conn->query($pre4);
  
                      $pre5 = "SELECT * FROM enroll WHERE sID = '$userid' AND deptName = '$row[preq2Dept]' AND courseNumber = '$row[preq2Num]' AND finalGrade != 'IP'";
                      $pre5Check = $conn->query($pre5);
  
                        if(mysqli_fetch_array($pre4Check) != 0 && mysqli_fetch_array($pre5Check))
                        {
                          $sql2 = "INSERT INTO enroll VALUES ('$userid', '$searchTerm', '$row[deptName]', '$row[courseNumber]', '$row[startTime]', '$row[endTime]', '$row[day]', '$row[semester]', '$row[creditHrs]', '2019', 'IP', NULL)";
  
                          $result2 = $conn->query($sql2);
  
                          echo "Successfully Registered";
                        }
                        else
                        {
                          echo "You do not have the required prequisites!";
                        }
                    }
                  }
  
  
  
                }
                else
                {
                  echo "Already registered for a class at that time!";
                }

            }
            else
            {
              echo "Already Registed for that Course!";
            }
            
            
            
            
            
          }
          else
          {
            echo "Invalid Course ID";
          }
          }
          else
              echo "You have a hold on your account!";

      }



  ?>
   <form action="enrolledIn.php">
    <input type="submit" value="Enrolled Courses" />
</form>

<form action="courseCatalog.php">
    <input type="submit" value="View Available Courses" />
</form>


<form action="profile.php">
    <input type="submit" value="View Profile" />
</form>

    <form action="dropCourse.php">
    <input type="submit" value="Drop a course" />
</form>

<form action="form.php">
    <input type="submit" value="Registration Form" />
</form>

</body>
</html>
