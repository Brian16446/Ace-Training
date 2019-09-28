<?php
    $conn = mysqli_connect("localhost", "root", "root");

    $sql = "CREATE DATABASE IF NOT EXISTS aceTrainingDataB";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");

    $sql = "CREATE TABLE IF NOT EXISTS nextOfKin (
                nextOfKinID integer auto_increment,
                forename varchar(40) NOT NULL,
                surname varchar(50) NOT NULL,
                addressL1 varchar(40) NOT NULL,
                postcode varchar(6) NOT NULL,
                telephoneNumber varchar(15) NOT NULL,
            
                primary key (nextOfKinID)
            );";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $sql = "CREATE TABLE IF NOT EXISTS student (
        studentID integer auto_increment,
        forename varchar(40) NOT NULL,
        surname varchar(50) NOT NULL,
        addressL1 varchar(50) NOT NULL,
        postcode varchar(6) NOT NULL,
        dateRegistered varchar(15) NOT NULL,
        dateOfBirth varchar(15) NOT NULL,
        age integer NOT NULL,
        gender varchar(8) NOT NULL,
        email varchar(50) NOT NULL,
        password varchar(255) NOT NULL,
        intStudent tinyint NOT NULL,
        visaexp varchar(15),
        passportNo varchar(12),
        authorised tinyint NOT NULL,
        nextOfKinID integer NOT NULL,
        usertype varchar(10) NOT NULL,
        
    
        primary key (studentID),
        foreign key (nextOfKinID) references nextOfKin(nextOfKinID)
    );";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));  

    $sql = "CREATE TABLE IF NOT EXISTS tutor (
        tutorID integer auto_increment,
        forename varchar(40) NOT NULL,
        surname varchar(50) NOT NULL,
        addressL1 varchar(50) NOT NULL,
        postcode varchar(6) NOT NULL,
        dateRegistered varchar(15) NOT NULL,
        dateOfBirth varchar(15) NOT NULL,
        age integer NOT NULL,
        email varchar(50) NOT NULL,
        gender varchar(8) NOT NULL,
        officeNo varchar(10) NOT NULL,
        extensionNo varchar(10) NOT NULL,
        NiN varchar(10) NOT NULL,
        NextOfKinID integer NOT NULL,
        password varchar(255) NOT NULL,
        authorised tinyint NOT NULL,
        usertype varchar(10) NOT NULL,
    
        primary key (tutorID),
        foreign key (nextOfKinID) references nextOfKin(nextOfKinID)
    
    );";


    mysqli_query($conn, $sql) or die(mysqli_error($conn));  

    $sql = "CREATE TABLE IF NOT EXISTS course (
        courseID integer auto_increment,
        courseName varchar(100) NOT NULL,
        startDate varchar(20) NOT NULL,
        endDate varchar(20) NOT NULL,
        fee int(11) NOT NULL,
        
        primary key (courseID)
        );";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));  

    $sql = "CREATE TABLE IF NOT EXISTS studentoncourse ( 
        studentID int NOT NULL,
        courseID int NOT NULL,
        dateRegistered date NOT NULL,
        authorised tinyint NOT NULL,

        primary key (studentID, courseID),
        foreign key (studentID) references student(studentID),
        foreign key (courseID) references course(courseID)
       );";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $sql = "CREATE TABLE IF NOT EXISTS tutoroncourse (
        tutorID int NOT NULL,
        courseID int NOT NULL,
        authorised tinyint NOT NULL,
   
        primary key (tutorID, courseID),
        foreign key (tutorID) references tutor(tutorID),
        foreign key (courseID) references course(courseID)
        );";
    
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

    $sql = "CREATE TABLE IF NOT EXISTS quiz(
            quizID int auto_increment,
            quizName varchar(70) not null,
            startDate date not null,
            endDate date not null,
            numQuestions int not null,
            courseID int not null,

            primary key(quizID),
            foreign key(courseID) references course(courseID));
        ";

    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

    $sql = "CREATE TABLE IF NOT EXISTS studentquiz(
        quizID int NOT NULL, 
        studentID int NOT NULL,
        score int, 
        dateCompleted varchar(10),
        courseID int NOT NULL,

        primary key(quizID, studentID),
        foreign key(quizID) references quiz(quizID),
        foreign key(studentID) references student(studentID),
        foreign key(courseID) references course(courseID)
        );";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $sql = "CREATE TABLE IF NOT EXISTS resource (
        resourceID int auto_increment,
        name varchar(50) NOT NULL,
        fileName varchar(30) NOT NULL,
        owner varchar(50) NOT NULL,
        uploadDate varchar(10) NOT NULL,
        startDate varchar(10),
        endDate varchar(10),
        visible tinyint NOT NULL,
        
        primary key (resourceID)
        );";

    
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    

    mysqli_close($conn);
?>



<!-- INSERT INTO quiz(
    quizName, startdate, enddate, numquestions, courseID)
    VALUES(
        'Networks.txt', 01-01-2000, 20-08-2019, 4, 1
    ); -->