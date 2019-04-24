<?php
    session_start();
    $_SESSION['userID'] = "";
    $_SESSION['userType'] = "";
    $_SESSION['pass'] = "";
    $_SESSION['user'] = "";
    $_SESSION['fname'] = "";
    $_SESSION['emptyErr'] = "You have been successfully logged out!";
    $_SESSION['status'] = "";
    header("Location: main.php");
?>