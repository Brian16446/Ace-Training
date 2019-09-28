<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">

    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/signinstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  

    <title>Sign In</title>
</head>
<body>

    <?php
        include 'phpFunctions/navs.php';
        
        topNav();
        sideNav();
        
    ?>  
    
    <div id="particles-js"></div>
    <div class="signin">
        <form id="signinForm" method="POST" action="signin.php">
            <h2>Sign In</h2>
            <input id="username" type="text" placeholder="Enter Username" name="username"></input>
            <input id="password" type="password" placeholder="Enter Password" name="password"></input>
            <input type = "submit" id="signinBtn" value="Sign In"></input>
            <p>Don't have an account? Click <a href = "registerChoice.php">Here</a></p>
        </form>
    </div>

    <script src="particles.js"></script>
    <script src="app.js"></script>
    <script src="../scripts/navscripts.js"></script>
</body>
</html>