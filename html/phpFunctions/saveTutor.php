<?php
    $fName = $_POST["fName"];
    $sName = $_POST["sName"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];
    $registerDate = $_POST["registerDate"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $gender = $_POST["gender"]; 
    $email = $_POST["email"];
    $password = $_POST["tutorPassword"];
    $officeNum = $_POST["officeNum"];
    $extNum = $_POST["extNum"];
    $NIN = $_POST["NIN"];


    //Next Of Kin
    $nokForename = $_POST["nokForename"];
    $nokSurname = $_POST["nokSurname"];
    $nokAddress = $_POST["nokAddress"];
    $nokPostcode = $_POST["nokPostcode"];
    $nokContact = $_POST["nokContact"];


    $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");
    $sql = "INSERT INTO nextOfKin (
        forename, surname, addressL1, postcode, telephoneNumber)
    VALUES (
        '$nokForename', '$nokSurname', '$nokAddress', '$nokPostcode', '$nokContact');";

    
    

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    }

    $sql = "INSERT INTO tutor (
        forename, surname, addressL1, postcode, dateRegistered, dateOfBirth, age, email, gender, officeNo, extensionNo, NiN, NextOfKinID, password, authorised)
        VALUES ('$fName', '$sName', '$address', '$postcode', '$registerDate', '$dob', '$age', '$email', '$gender', '$officeNum', '$extNum', '$NIN', '$last_id', '$password', '0');";

    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    mysqli_close($conn); 
?>
