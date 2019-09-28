<?php
    $fName = $_POST["fName"];
    $sName = $_POST["sName"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];
    $registerDate = $_POST["registerDate"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $gender = $_POST["gender"]; //THIS IS FROM RADIO BUTTONS
    $email = $_POST["email"];
    $password = $_POST["password"];

    // International Student
    if (isset($_POST["international"])){
        $international = 1;
    }
    else {
        $international = 0;
    }
    $visa = $_POST["visa"];
    $passport = $_POST["passport"];

    // Next of kin
    $nokForename = $_POST["nokForename"];
    $nokSurname = $_POST["nokSurname"];
    $nokAddress = $_POST["nokaddress"];
    $nokPostcode = $_POST["nokpostcode"];
    $nokContact = $_POST["nokContact"];

    $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");

     $sql = "INSERT INTO nextOfKin (
        forename, surname, addressL1, postcode, telephoneNumber)
    VALUES (
        '$nokForename', '$nokSurname', '$nokAddress', '$nokPostcode', '$nokContact');";    
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    }
    $sql = "INSERT INTO student (
        forename, surname, addressL1, postcode, dateRegistered, dateOfBirth, age, gender, email, password, intStudent, visaexp, passportNo, authorised, nextOfKinID)
    VALUES (
    '$fName', '$sName', '$address', '$postcode', '$registerDate', '$dob', '$age', '$gender', '$email', '$password', '$international', '$visa', '$passport', '0', '$last_id');";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    

    mysqli_close($conn);    


?>
