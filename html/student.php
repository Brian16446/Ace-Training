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
        <div class="dashboard">
            <h1><?php echo($_SESSION["forename"]);?></h1>
            <h1>Your Progress</h1>

            <?php
            // Getting the number of quizzes
                $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
                $studentID = $_SESSION["studentID"];
                if(isset($_SESSION["courseNames"])){
                    $courses = $_SESSION["courseNames"];
                    $numQuizzes = 0;
                    $numQuizzesCompleted = 0;
                    foreach($courses as $c){
                        $sql = "SELECT courseID FROM course WHERE courseName = '$c'";
                        $d = mysqli_query($conn, $sql); 
                        $row = mysqli_fetch_array($d);
                        $courseID = $row["courseID"];
                        $sql = "SELECT * FROM quiz WHERE courseID = $courseID";
                        $data = mysqli_query($conn, $sql);
                        $numQuizzes += mysqli_num_rows($data);
                        // $sql = "SELECT * FROM quiz WHERE courseID = $c";
                        // $data = mysqli_query($conn, $sql);
                        $sql = "SELECT score FROM studentQuiz WHERE courseID = $courseID AND studentID = $studentID";
                        $data = mysqli_query($conn, $sql);
                        $numQuizzesCompleted += mysqli_num_rows($data);
            
                    }
                }
            ?> 
            <input type="hidden" id="numQuizzes" value="<?php echo $numQuizzes ?>"/>
            <input type="hidden" id="numQuizzesCompleted" value="<?php echo $numQuizzesCompleted ?>"/>



            
            <div class="progress">
                <div id="progressBar">1%</div>
                <p>Complete quizzes to increase your progress</p>
            </div>
            <br/><br/>

            <div class="chart">
                <!-- THIS IS WHERE WE WILL HAVE A BAR CHART. THE BAR CHART WILL SHOW AVG KNOWLEDGE FOR EACH COURSE THE STUDENT IS TAKING -->
                <!-- If they're not signed up to a course p tag will show, if they are the bar chart will show. Might need AJAX for this -->
                <?php
                    if(isset($_SESSION["courseNames"])){
                        foreach($courses as $c){
                            echo("<p>$c</p>");
                        }
                    }else{
                        echo("<p>*YOU ARE CURRENTLY NOT SIGNED UP TO ANY COURSES*</p>");
                    }
                ?>
            </div>
            <br/>
            
            
            
            <div class="content">
                <a href="courseRegister.php"><p>Sign up to a course</p></a>  
                <a href="studentCourses.php"><p>My Courses</p></a>
            </div>


        </div>
    </div>

    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    <script type="text/javascript">var v = "<?= $numQuizzes ?></script>
    <script src="../scripts/progress.js"></script>
</body>
</html>