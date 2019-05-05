<?php
session_start();


if(isset($_POST['goList'])) {
    $toolName = $_POST['toolSelection'];
    if($toolName=="graduateList") {
        header('Location: gsGraduateList.php');

    }
    if($toolName=="admittedList"){
        header('Location: gsAdmittedList.php');
    }

    if($toolName=="currentList"){
        header('Location: gsCurrentList.php');
    }




}
?>