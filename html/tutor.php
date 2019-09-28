<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/navstyles.css">
<!--     <link rel="stylesheet" href="../styles/signinstyles.css"> -->
    <link rel="stylesheet" href="../styles/tutor.css">
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
    
    
    
    <div id="pageHeading">
        <h1><?php
            include "tutorFirstName.php";
            echo $customHeading;
        ?></h1>
    </div>

    <div id="particles-js"></div>
    <div id="mainBody">
        <div id="wrapper0">
            <span class="tutorButtonWrapper">
                <a href="#"><h2>Show/Hide Resources</h2></a>
                <div class="tutorText">
                    <a href="http://"><p>Click here to go to the show/hide resources page</p></a>
                </div>
            </span>
        </div>
        <div id="wrapper1">
            <span class="tutorButtonWrapper"><a href="tutorUpload.php">
                <h2>Upload/Delete Resources</h2>
                <div class="tutorText">
                    <p>Click here to go to the upload/delete resources page</p>
                </div></a>
            </span>
        </div>
        <div id="wrapper2">
            <span class="tutorButtonWrapper">
                <h2>Upload Quiz</h2>
                <div class="tutorText">
                    <p>Click here to go to the upload/delete resources page</p>
                </div>
            </span>
        </div>
        <div id="wrapper3">
            <span class="tutorButtonWrapper">
                <h2>Register Course</h2>
                <div class="tutorText">
                    <p>Click here to go to the upload/delete resources page</p>
                </div>
            </span>
        </div>
        <div id="wrapper4">
            <span class="tutorButtonWrapper">
            <a href="tutorValidate.php"><h2>Register/Validate Student</h2></a>
                <div class="tutorText">
                    <a href="#"><p>Click here to go to the upload/delete resources page</p></a>
                </div>
            </span>
        </div>
    </div>

   

    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>
</html>