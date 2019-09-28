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

    <title>Admin</title>
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
            <h1>Validate Tutors</h1>

            <div class="wrapper">
                <table id="adminTable">
                    <thead>
                        <th>ID</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Date Registered</th>
                        <th>Days Since Registered</th>
                        <th>Validate?</th>
                    </thead>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
                        // Limited to 6 due to container bug.
                        $sql = "SELECT tutorID, forename, surname, dateRegistered FROM tutor WHERE authorised = 0 LIMIT 6";
                        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $i = 1;

                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_array($data)){
                                $id = $row["tutorID"];
                                $val = "validate";
                                ?>
                                <tr>
                                    <td id="<?php echo($i); ?>" value="<?php echo($id) ?>" ><?php echo $id?></td>
                                    <td><?php echo $row["forename"]?></td>
                                    <td><?php echo $row["surname"]?></td>
                                    <td><?php echo $row["dateRegistered"]?></td>
                                    <td><?php echo("PHP WORK THIS OUT")?></td>
                                    <td id = "<?php echo($val . $i)?>">
        
                                        <!-- <input id="<?php echo($i) ?>" type="hidden" value="<?php echo($id) ?>"> -->
                                        <button onclick = "<?php echo("checkCertain($i)"); ?>">Validate</button>
                                        
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }else{
                            echo("No Tutors awaiting validation");
                        }

                    ?>
                </table>
                
                <br/>
                
                <div class="adminContent">
                    <a href="admin.php"><p><i class="fas fa-arrow-left"></i> Return to Dashboard</p></a>
                </div>
                
            </div>
            
        </div>

        

    <script src="../scripts/navscripts.js"></script>
    <script src="../scripts/loadModal.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    
</body>
</html>