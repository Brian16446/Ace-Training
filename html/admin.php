<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    

    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/signinstyles.css">
    <link rel="stylesheet" href="../styles/adminstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <title>Document</title>
</head>
<body>
    
    <?php
        include 'phpFunctions/navs.php';
        
        topNav();
        sideNav();
    ?>

    <div id="particles-js"></div>

    <?php

        $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");
        $sql = "SELECT studentID from student;";
        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $numStudents = mysqli_num_rows($data);

        $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");
        $sql = "SELECT tutorID from tutor WHERE usertype = 'tutor';";
        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $numTutors = mysqli_num_rows($data);


        $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");
        $sql = "SELECT tutorID from tutor WHERE usertype = 'admin';";
        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $numAdmins = mysqli_num_rows($data);

        $conn = mysqli_connect("localhost", "root", "root", "aceTrainingDataB");
        $sql = "SELECT courseID from course";
        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $numCourses = mysqli_num_rows($data);

        $totalUsers = $numStudents + $numTutors + $numAdmins;
        print_r($totalUsers);


        if($_SESSION["userType"] == "admin" && $_SESSION["authorised"] == 1){
            echo('
                <div class="outer">
                    <div class="dashboard">
                        <h1>Admin Dashboard</h1>

                        <div class="wrapper">
                            <div class="info" id="user">
                                <i class="fas fa-users"></i>
                                <h4>Total Users: </h4>
                                <h4>' . $totalUsers . '</h4>
                            </div>
                    
                            <div class="info" id="tutor">
                                <i class="fas fa-user"></i>
                                <h4>Total Tutors: </h4>
                                <h4>' . $numTutors . '</h4>
                            </div>

                            <div class="info" id="course">
                                <i class="fas fa-book-open"></i>
                                <h4>Total Courses: </h4>
                                <h4>' . $numCourses . '</h4>
                            </div>

                            <div class="info" id="admin">
                                <i class="fas fa-lock"></i>
                                <h4>Total Admins: </h4>
                                <h4>' . $numAdmins . '</h4>
                            </div>
                        </div>

                        <div class="content">
                            <a href="adminRegister.php"><p>Register Students from list</p></a>
                            <a href="adminValidate.php"><p>Validate Tutor onto Website</p></a>
                            <a href="adminValidateOntoCourse.php"><p>Validate Tutor onto Course</p></a>
                            <a href="tutor.php"><p>View Tutor Dashboard</p></a>
                        </div>
                    </div>
                </div>');
        }else{
            echo('
            <div class="outer">
                <div class="dashboard">
                    <h1>You must be an Admin to view this page</h1>
                </div>
            </div>');
        }
        
        

    ?>

    

    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>
</html>