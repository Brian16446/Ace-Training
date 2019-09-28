<?php
    session_start();
    $arraysize = sizeof($_POST["course"]);
    $studentID = $_SESSION["studentID"];
    $registerDate = $_POST["registerDate"];

    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");

    
    $feesowed = 0;
    if ($arraysize > 0){
        for ($i = 0; $i < $arraysize; $i++) {

            $course = $_POST["course"][$i];
    
            $sql = "SELECT * FROM course WHERE courseName = '$course' ";
    
            $data = mysqli_query($conn, $sql);
    
            $row = mysqli_fetch_array($data);
    
            $courseID = $row["courseID"];
    
            $sql = "INSERT INTO studentoncourse (studentID, courseID, dateRegistered, authorised)
            VALUES ('$studentID', '$courseID', '$registerDate', '0')";
    
            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $sql = "SELECT * FROM course WHERE courseName = '$course'";

            $data = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($data);

            $fees = $row["fee"];

            $feesowed = $feesowed + $fees;
    
        }
    }

    else {
        $course = $_POST["course"];

        $sql = "SELECT * FROm course WHERE courseName = '$course'";

        $data = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($data);

        $courseID = $row["courseID"];

        $sql = "INSERT INTO studentoncourse (studentID, courseID, dateRegistered, authorised)
            VALUES ('$studentID', '$courseID', '$registerDate', '0')";
    
        mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $sql = "SELECT * FROM course WHERE courseName = '$course'";

        $data = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($data);

        $feesowed = $row["fee"];
        
    }

    $sql = "UPDATE student SET feesowed = $feesowed WHERE studentID = $studentID";      
    $data = mysqli_query($conn, $sql);

    mysqli_close($conn);

?>