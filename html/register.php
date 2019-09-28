<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/topnavstyles.css">

    <link rel="stylesheet" href="../styles/registerstyles.css">
    <link rel="stylesheet" href="../styles/jquerydatestyles.css">
    <link rel="stylesheet" href="../styles/modalstyles.css">
    <link rel="stylesheet" href="../styles/tooltipstyles.css">
    <link rel="stylesheet" href="../styles/buttonstyles.css">

    
    <!-- External web fonts. Internet connection required -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../scripts/jquerydate.js"></script>

    <!-- More scripts at bottom of body -->


    <title>Portfolio 1</title>


</head>
<body>

    <!-- THREE MODALS NEEDED DUE TO EACH HAVING DIFFERENT FUNCTIONALITY -->


    <?php
        include 'phpFunctions/modals.php';
        showModal();

        include 'phpFunctions/topNav.php';
        include 'phpFunctions/sideNav.php';
        
        topNav();
        sideNav();
    ?>
    
    <div class="container">
        <h1>Sign up to Ace Training</h1>
        <form name = "frmRegister" action="doNothing.html" onsubmit="return validation();" method="POST">
            <input class="halfSize" type="text" name="fName" placeholder="First Name">
            <input class="halfSize" type="text" name="sName" placeholder="Surname">
            <!--<input type="email" name="email" required placeholder="E-mail"> -->
            <input type="text" name="registerDate" id="registerDate" placeholder="Date Registered">
            <input type="text" id="dob" name="dob" placeholder="Date of Birth (dd/mm/yyyy)">
            <input type="text" id="age" name="age" placeholder="Age">
            <label><input type="radio" name="gender" id="male" value="M">Male</label>
            <label><input type="radio" name="gender" id="female">Female</label>
            <select name="course">
                <option value="Databases">Databases</option>
                <option value="Networks">Networks</option>
                <option value="WebDev">Web Development</option>
                <option value="OS">Operating Systems</option>
                <option value="OS">OOSD</option>
                <option value="OS">Algorithm Design</option>
            </select>
            <input id="submit" type="submit" value="Submit">

            <!-- Tooltips for buttons for extra clarity -->
            <div id="btns">
                <span class="formBtns" id = "back">
                    <i class="fas fa-arrow-left"></i>
                    <span class="tooltip">Back</span>
                </span>
                <span class="formBtns" id = "undo">
                    <i class="fas fa-undo"></i>
                    <span class="tooltip">Clear</span>
                </span>
            </div>
        </form>
    </div>


    <!-- These scripts have to be at the bottom so they execute after content loaded due to event listeners -->
    <script src="../scripts/validations.js"></script>
    <script src="../scripts/navigation.js"></script>
    <script src="../scripts/navscripts.js"></script>

</body>
</html>