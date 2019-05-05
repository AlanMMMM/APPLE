<?php
    session_start();

$servername = "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("Connection failed: " . mysql_connect_error());
    }

    $conn->query("drop table if exists student");
    $conn->query("drop table if exists personnel cascade");
    $conn->query("drop table if exists course cascade");
    $conn->query("drop table if exists enroll cascade");
    $conn->query("create table student (
        fname     varchar(20) not null,
        lname     varchar(20) not null,
        username  varchar(20) not null,
        email varchar(20),
        passwrd   varchar(20) not null,
        sID  int(8) not null,
        program  varchar(20) not null,
        address  varchar(20) not null
    )");
    $conn->query("INSERT INTO student VALUES ('Brian', 'Morgan', 'blmorgan', 'blmorgan@gwu.edu', 'abc123', 12345678, 'cs', 'pasadena')");
    $conn->query("INSERT INTO student VALUES ('Robert', 'Gordon', 'rmgordon', 'rmgordon@gwu.edu', 'def456', 30043201, 'cs', 'district')");
    $conn->query("INSERT INTO student VALUES ('Jae', 'Souk', 'jsouk', 'jsouk@gwu.edu', 'ghi789', 43318703, 'cs', 'fulton')");
    $conn->query("create table personnel (
        fname     varchar(20) not null,
        lname     varchar(20) not null,
        username  varchar(20) not null,
        passwrd   varchar(20) not null,
        fID  int(8) not null,
        personnelType  varchar(1) not null,
        address  varchar(100) not null
    )");
    $conn->query("INSERT INTO personnel VALUES ('Bhagi', 'Narahari', 'bnarahari', 'narahari123', 12353280, 'F', 'dc')");
    $conn->query("INSERT INTO personnel VALUES ('Roxanne', 'Leontie', 'rleontie', 'leontie222', 23442136, 'F', 'dc')");
    $conn->query("INSERT INTO personnel VALUES ('Maya', 'Shende', 'mshende', 'shende122', 34426892, 'G', 'dc')");
    $conn->query("INSERT INTO personnel VALUES ('Tom', 'Clancy', 'tclancy', 'clancy442', 42284007, 'A', 'md')");
    $conn->query("create table course (
        courseID int(3) not null,
        deptName  varchar(20) not null,
        courseNumber     int(4) not null,
        courseName varchar(50) not null,
        day varchar(1) not null,
        startTime     int(4) not null,
        endTime     int(4) not null,
        semester varchar(1) not null,
        creditHrs     int(1) not null,
        sectionNum	int(1) not null,
        instructor varchar(20),
        preq1Dept     varchar(20),
        preq1Num     varchar(20),
        preq2Dept     varchar(20),
        preq2Num     varchar(20)
    )");

    $conn->query("INSERT INTO course VALUES (1, 'CSCI', 6221, 'SW Paradigms', 'M', 1500, 1730, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (2, 'CSCI', 6461, 'Computer Architecture', 'T', 1500, 1730, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (3, 'CSCI', 6212, 'Algorithms', 'W', 1500, 1730, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (4, 'CSCI', 6232, 'Networks 1', 'M', 1800, 2030, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (5, 'CSCI', 6233, 'Networks 2', 'T', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6232', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (6, 'CSCI', 6241, 'Database 1', 'W', 1800, 2030, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (7, 'CSCI', 6242, 'Database 2', 'R', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6241', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (8, 'CSCI', 6246, 'Compilers', 'T', 1500, 1730, 'S', 3, 1, 'Narahari', 'CSCI', '6461', 'CSCI', '6212')");
    $conn->query("INSERT INTO course VALUES (9, 'CSCI', 6251, 'Cloud Computing', 'M', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6461', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (10, 'CSCI', 6254, 'SW Engineering', 'M', 1530, 1800, 'S', 3, 1, 'Narahari', 'CSCI', '6221', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (11, 'CSCI', 6260, 'Multimedia', 'R', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (12, 'CSCI', 6262, 'Graphics 1', 'W', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (13, 'CSCI', 6283, 'Security 1', 'T', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6212', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (14, 'CSCI', 6284, 'Cryptography', 'M', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6212', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (15, 'CSCI', 6286, 'Network Security', 'W', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6283', 'CSCI', '6232')");
    $conn->query("INSERT INTO course VALUES (16, 'CSCI', 6384, 'Cryptography 2', 'W', 1500, 1730, 'S', 3, 1, 'Choi', 'CSCI', '6284', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (17, 'ECE', 6241, 'Comunication Theory', 'M', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (18, 'ECE', 6242, 'Information Theory', 'T', 1800, 2030, 'S', 2, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (19, 'MATH', 6210, 'Logic', 'W', 1800, 2030, 'S', 2, 1, 'Choi', 'None', 'None', 'None', 'None')");
    $conn->query("INSERT INTO course VALUES (20, 'CSCI', 6339, 'Embedded Systems', 'R', 1600, 1830, 'S', 3, 1, 'Choi', 'CSCI', '6461', 'CSCI', '6212')");
    $conn->query("create table enroll (
        sID  int(8) not null,
        courseID     int(8) not null,
        deptName  varchar(20) not null,
        courseNumber     int(4) not null,
        startTime     int(4) not null,
        endTime     int(4) not null,
        day   varchar(1) not null,
        semester varchar(1) not null,
        creditHrs     int(1) not null,
        year		int(4) not null,
        finalGrade	varchar(2),
        gpa decimal(3,2)
    )");
    $sql = "SELECT * FROM enroll";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if($row == 0){
        $_SESSION['emptyErr'] = "Reset successful!";
    }else{
        $_SESSION['emptyErr'] = "Reset failed";
    }
    header("Location: main.php");
?>
