<?php


    $dir = "../../Resources/";

    $f = $_FILES["file"];
    $file = $_FILES["file"]["name"];
    $fileTemp = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    $fileSize = $_FILES["file"]["size"];

    $safeUpload = 0;

    if($fileType != "text/plain"){
        echo("Please upload a txt file only");
        $safeUpload = 1;
    };

    if($fileSize > 5242880){
        echo("File must be less than 5MB in size");
        $safeUpload = 1;
    }

    if($safeUpload == 0){
        if(move_uploaded_file($fileTemp, $dir . $file)){
            echo("File has been uploaded to the server");
        }else{
            echo("Something went wrong");
        }
    }

    

    $studentsFile = file($dir . $file);
    $linenum = 0;
    
    $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");

    foreach($studentsFile as $line){
        $attributes = array();
        $result = explode(',', $line);
        foreach($result as $attr){
            //create an array and add attr to the array
            //$cleanedAttr = mysqli_real_escape_string($conn, $attr);
            array_push($attributes, $attr);
            echo("<p>$attr</p>");
        }
        echo("<h1>NEW LINE</h1>");
        // then loop through array and add to database.
        // foreach($attributes as $a){
        //     echo("<p>$a</p>");
        // }
        
        $sql = "INSERT INTO student(
            forename, surname, addressL1, postcode, dateRegistered, dateOfBirth, age, gender, email, password, intStudent, visaexp, passportNo, authorised, nextOfKinID, userType)
            VALUES (";
        $sql .= implode(',', $attributes);
        $sql .= ");";


        mysqli_query($conn, $sql) or die(mysqli_error($conn));

    }
    mysqli_close($conn);    

    // now insteaad of adding a 1 to end of each string, upload that to db.

?>
