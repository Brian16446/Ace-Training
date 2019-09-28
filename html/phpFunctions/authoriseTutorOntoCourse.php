<?php
    $tutorID = $_GET["tutorID"];
    $courseName = $_GET["course"];

    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");

    $sql = "SELECT courseID FROM course WHERE courseName = '$courseName'";
    $data = mysqli_query($conn, $sql)or die(mysqli_error($conn)); 
    $row =  mysqli_fetch_array($data);
    $courseID = $row["courseID"];
    print_r($courseID);

    $sql = "SELECT courseID FROM course WHERE courseName = $courseName";
    $sql = "UPDATE tutoroncourse SET authorised = 1 WHERE tutorID = $tutorID AND courseID = $courseID";

    mysqli_query($conn, $sql); 


?>
