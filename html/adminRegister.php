<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    

    <link rel="stylesheet" href="../styles/navstyles.css">
    <link rel="stylesheet" href="../styles/signinstyles.css">
    <link rel="stylesheet" href="../styles/adminstyles.css">
    <link rel="stylesheet" href="../styles/defaultstyles.css">
    <link rel="stylesheet" href="../styles/modalstyles.css">

    <title>Document</title>
</head>
<body>

<?php
        include 'phpFunctions/navs.php';
        include 'phpFunctions/modals.php';

        showSimpleModal();
        
        topNav();
        sideNav();
    ?>

    <div id="particles-js"></div>
        <div class="outer">
            <div class="dashboard">
                <h1>Admin Dashboard</h1>
                <p>Add a txt file to register the students listed in the file</p>
                <br/>
                <br/>
                <div class="wrapper">
                    <form action="phpFunctions/uploadStudents.php" method="POST" enctype="multipart/form-data">
                        <label id = "fileLabel" for="uploadFile"><i class="fas fa-upload"></i> Choose File</label>
                        <input type="file" name = "file" id="uploadFile">
                        <br/>
                        <br>
                        <br>
                        <button type="submit" name="submit">Upload</button>
                    </form>
                </div>
            
                <div class="adminContent">
                    <a href="admin.php"><p><i class="fas fa-arrow-left"></i> Return to Dashboard</p></a>
                </div>
            </div>           
        </div>
    </div>

    <script src="../scripts/navscripts.js"></script>
    <script src="../scripts/loadModal.js"></script>
    <script src="../scripts/admin.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    
</body>
</html>