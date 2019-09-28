<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    

    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">
    <link rel="stylesheet" href="../styles/studentstyles.css">
    

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
    <div class="outer">
        <div class="dashboard" id="mycoursesDashboard">
            <h1>My Courses</h1>

            <!-- Can maybe have the headers open up a drop down of modules? -->
            <!-- Will make it so that clicking on Quizzes under computer science opens the CS quizzes etc. -->


            <?php
                if(isset($_SESSION["courseNames"])){
                    $courses = $_SESSION["courseNames"];
                    foreach($courses as $c){
                        echo("
                            <h3 class='courseHeader'>$c</h3>
                            <a onclick='loadQuiz(this.id)' id='$c'><p>Quizzes</p></a>
                            <a onclick='loadPowerPoints(this.id)' id='$c'><p>PowerPoints</p></a> 
                            <a onclick='loadResource(this.id)' id='$c' ><p>Documents</p></a>
                            <br/><br/>
                        ");
                    }
                }else{
                    echo("<p>*YOU ARE CURRENTLY NOT SIGNED UP TO ANY COURSES*</p>");
                }
            ?>

            <br><br>

            <div class="adminContent">
                <a href="student.php"><p><i class="fas fa-arrow-left"></i> Return to Dashboard</p></a>
            </div>
        </div>
    </div>

    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    <script src="../scripts/loadResource.js"></script>
    <script src="../scripts/openQuiz.js"></script>
</body>
</html>