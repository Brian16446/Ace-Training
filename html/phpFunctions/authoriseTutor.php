<?php
    $tutorID = $_GET["tutorID"];
    
    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
    $sql = "UPDATE tutor SET authorised = 1 WHERE tutorID = $tutorID";

    mysqli_query($conn, $sql);


?>
