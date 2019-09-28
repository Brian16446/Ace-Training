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
        showModal();

        include 'phpFunctions/navs.php';
        
        topNav();
        sideNav();
    ?>
    <div id="particles-js"></div>
    <div class="outer">
    <div id="container" class="dashboard">
        <h1>Sign up as a Student</h1>
        <form name = "frmRegister" action="phpFunctions/saveUser.php" onsubmit="return validation();" method="POST">
            <input class="halfSize" type="text" name="fName" placeholder="First Name">
            <input class="halfSize" type="text" name="sName" placeholder="Surname">

            <input type="text" class = "seventyPercent" id="address" name="address" placeholder="First Line of Address">
            <input type="text" class = "twentyPercent" id="postCode" name="postcode" placeholder="Post Code">

            <input type="text" class = "fullSize" name="registerDate" id="registerDate" placeholder="Date Registered">
            <input type="text" class = "seventyPercent" id="dob" name="dob" placeholder="Date of Birth (dd/mm/yyyy)">
            <input type="text" class = "twentyPercent" id="age" name="age" placeholder="Age">
            <div id="labels">
                <label><input type="radio" name="gender" id="male" value="M">Male</label>
                <label><input type="radio" name="gender" id="female">Female</label>
            </div>

            <input class = "fullSize" id="email" type="text" name="email" placeholder="E-mail">
            <input type="password" id="password" class="fullSize" name="password" placeholder="Create a Password">
            <br>
            <span id="internationalStudent">
                <p>Click this box if you are an international student: <input type="checkbox" name="international"> </p>
            </span>

            <input type="text" id="visa" name="visa" placeholder="Visa Expiry Date (dd/mm/yyyy)" class="halfSize">
            <input type="text" id="passport" name="passport" placeholder="Passport Number" class="halfSize">
            <br>
            <p>Next of Kin details: </p>
            <input class="halfSize" type="text" name="nokForename" placeholder="Next of Kin First Name">
            <input class="halfSize" type="text" name="nokSurname" placeholder="Next of Kin Surname">

            <input type="text" class = "seventyPercent" id="nokAddress" name="nokaddress" placeholder="First Line of Address">
            <input type="text" class = "twentyPercent" id="nokPostcode" name="nokpostcode" placeholder="Post Code">
            <input type="text" class = "fullSize" id="nokContact" name="nokContact" placeholder="Contact Telephone Number">
            
            
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
    </div>


    <!-- These scripts have to be at the bottom so they execute after content loaded due to event listeners -->
    <script src="../scripts/validations.js"></script>
    <script src="../scripts/navigation.js"></script>
    <script src="../scripts/navscripts.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>

</body>
</html>