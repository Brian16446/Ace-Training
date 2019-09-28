<?php
    $studentID = $_GET["studentID"];
    
    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
    $sql = "UPDATE student SET authorised = 1 WHERE studentID = $studentID";

    mysqli_query($conn, $sql);


?>
