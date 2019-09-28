<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/registerstyles.css">
    <link rel="stylesheet" href="../styles/modalstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">
    <link rel="stylesheet" href="../styles/tooltipstyles.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../scripts/jquerydate.js"></script>

    <title>Document</title>
</head>
<body>
    <?php
        include 'phpFunctions/modals.php';
        showModal();

        include 'phpFunctions/navs.php';
        
        topNav();
        sideNav();
    ?>    
    
    <div id="particles-js"></div>
    <div class="outer">
        <div id="registerContainer" class="dashboard">
            <h1>Sign up to Ace Training</h1>
            <form name = "frmRegister">
                <div class="buttonContainer">
                    <p>Sign up as a Tutor or a Student?</p>
                    <br/>
                    <button type="button" id="studentBtn" value="student" onclick="location.href = 'studentRegister.php'">Student</button>
                    <button type="button" id="tutorBtn" value="tutor" onclick="location.href = 'tutorRegister.php'">Tutor</button>
                    
                </div>
            </form>
        </div>
    </div>


    <script src="../scripts/validations.js"></script>
    <script src="../scripts/navscripts.js"></script>
    <script src="../scripts/info.js"></script>
    <script src="../scripts/submitChoice.js"></script>
    <script src="../scripts/navigation.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>
</html>