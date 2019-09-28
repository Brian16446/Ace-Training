<?php

    // NEED TO FIGURE OUT WHAT COURSE THE TUTOR IS ENROLLED ONTO. 
    // THEN CHANGE THE DIR TO BE ../../COURSE/RESOURCES/
    // EVERYTHING ELSE MIGHT BE ABLE TO STAY THE SAME
    
    $course = $_POST["course"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    print_r($startDate);
    print_r($endDate);
    echo("<br>");

    $todaysDate = date("Y-m-d");


    $dir = "../../Resources/$course/";

    $f = $_FILES["file"];
    $file = $_FILES["file"]["name"];
    $fileTemp = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    $fileSize = $_FILES["file"]["size"];



    $safeUpload = 0;
    print_r($f);

    if($fileSize > 5242880){
        echo("File must be less than 5MB in size");
        $safeUpload = 1;
    }

    // Make a array of acceptable file types
    // Check if the file type is not in the array. If its not, safe upload = 1
    // and echo a message saying file type not supported.


    if($fileType == "text/plain"){
        $dir .= "Quizzes/";
        $quiz = file("../../Resources/$course/Quizzes/$file");
        if($safeUpload == 0){
            $lineNum = 1;
            $numQuestions = 0;
            foreach ($quiz as $line){
                if($lineNum % 6 == 0){
                    $numQuestions++;
                }
                $lineNum++;
            }
            print_r($numQuestions);
            moveFile($fileTemp, $dir, $file);
            $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
            $sql = "INSERT INTO quiz(
                quizName, startDate, endDate, numQuestions, courseID)
                VALUES(
                    '$file', '$startDate', '$endDate', $numQuestions, 1 
                );";
            mysqli_query($conn, $sql) or die($conn);

        }
    }
    else{
        if($fileType == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
            $dir .= "PowerPoints/";
        }else{
            $dir .= "Other/";
        }
        moveFile($fileTemp, $dir, $file);
        // Update resources db table
        $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
        //doesnt add the owner.
        // Need to also get the dates as inputs from the tutor.
        $sql = "INSERT INTO resource(
            filename, uploadDate, startDate, endDate, visible)
            VALUES(
                '$file', '$todaysDate', '2000-10-10', '2019-08-10', 1);
            ";
        mysqli_query($conn, $sql) or die($conn);
    }

    function moveFile($fileTemp, $dir, $file){
        if(move_uploaded_file($fileTemp, $dir . $file)){
            echo("File has been uploaded to the server");
        }else{
            echo("Something went wrong");
        }
    }

    // Then update the database resources folder
    

?>
