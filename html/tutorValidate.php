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
            <h1>Validate Students</h1>

            <div class="wrapper">
                <!-- <table id = "adminTable">
                    <tr>
                        <th>Name</th>
                        <th>Date Registered</th>
                        <th>Days Since Registered</th>
                        <th>Validate?</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>15/01/2019</td>
                        <td>15</td>
                        <td id = "validate1"><button onclick = "checkCertain(1)">Validate</button></td>
                    </tr>
                    <tr>
                        <td>Andrew Russell</td>
                        <td>25/01/2019</td>
                        <td>5</td>
                        <td id = "validate2"><button onclick = "checkCertain(2)">Validate</button></td>
                    </tr>
                    <tr>
                        <td>Adam Reed</td>
                        <td>28/01/2019</td>
                        <td>2</td>
                        <td id = "validate3"><button onclick = "checkCertain(3)">Validate</button></td>
                    </tr>

                </table> -->

                <table id="adminTable">
                    <thead>
                        <th>Student ID</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Date Registered</th>
                        <th>Days Since Registered</th>
                        <th>Validate?</th>
                    </thead>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
                        // Limited to 6 due to container bug.
                        $sql = "SELECT studentID, forename, surname, dateRegistered FROM student WHERE authorised = 0 LIMIT 6";
                        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $i = 1;

                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_array($data)){
                                $id = $row["studentID"];
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
                            echo("No Students awaiting validation");
                        }

                    ?>
                </table>
                
                <br/>
                
                <div class="adminContent">
                    <a href="tutor.php"><p><i class="fas fa-arrow-left"></i> Return to Dashboard</p></a>
                </div>
                
            </div>
            
        </div>

    <script src="../scripts/navscripts.js"></script>
    <script src="../scripts/loadModal.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    
</body>
</html>