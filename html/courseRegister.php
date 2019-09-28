<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">
    <link rel="stylesheet" href="../styles/jquerydatestyles.css">
    <link rel="stylesheet" href="../styles/modalstyles.css">
    <link rel="stylesheet" href="../styles/tooltipstyles.css">
    <link rel="stylesheet" href="../styles/registerstyles.css">
    
    <!-- External web fonts. Internet connection required -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../scripts/jquerydate.js"></script>

    <!-- More scripts at bottom of body -->


    <title>Student Register</title>


</head>
<body>

    <!-- THREE MODALS NEEDED DUE TO EACH HAVING DIFFERENT FUNCTIONALITY -->


    <?php
        include 'phpFunctions/modals.php';
        showStudentBackModal();

        include 'phpFunctions/navs.php';
        
        topNav();
        sideNav();
    ?>

    <div id="particles-js"></div>
    <div class="outer">
    <div id="container" class="dashboard">
        <h1>Reigster for a course</h1>
        <form id="courseRegister" name = "frmRegister" action="phpFunctions/savecourse.php" onsubmit="return checkRegisterDate(registerDate.value);" method="POST">
            <input class ="fullSize" type="text" name="registerDate" id="registerDate" placeholder="Date Registered">
            <p>Please select the courses you wish to take</p>

            <div class="selectContainer" id="selectContainer">
                <div class="innerContainer" id="inner" name = "inner">
                    <select class ="courseSelect" id = "course" name="course[]">
                        <option value="Computer Science">Computer Science</option>
                        <option value="Physics">Physics</option>
                        <option value="Maths">Maths</option>
                        <option value="Psychology">Psychology</option>
                        <option value="OS">OOSD</option>
                        <option value="OS">Algorithm Design</option>
                    </select>
                    <span class="addSelect" id="addSelect" onclick="addSelect()"><i class="fas fa-plus"></i></span>
                    <span class="addSelect" id="addSelect" onclick="deleteSelect()"><i class="fas fa-times"></i></span>
                </div>
            </div>
   
            <input id="submit" type="submit" value="Submit">

            </br></br>
            <!-- Tooltips for buttons for extra clarity -->
            <div id="btns">
                <span class="formBtns" id = "back">
                    <a href="phpFunctions/viewDashboard.php"><i class="fas fa-arrow-left" onclick=""></i> Return to dashboard</a>
                    <span class="tooltip">Back</span>
                </span>

            </div>
        </form>

        
    </div>
</div>


    <!-- These scripts have to be at the bottom so they execute after content loaded due to event listeners -->
    <script src="../scripts/validations.js"></script>
    <script src="../scripts/navigation.js"></script>
    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>

</body>
</html>