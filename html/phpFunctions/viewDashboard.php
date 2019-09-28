<?php
    session_start();
    if($_SESSION["userType"] == "student"){
        header("location:../student.php");
    }
    elseif($_SESSION["userType"] == "tutor"){
        header("location:../tutor.php");
    }
    elseif($_SESSION["userType"] == "admin"){
        header("location:../admin.php");
    }
?>
