<?php

    $courseName = $_GET["courseName"];
    session_start();
    $_SESSION["courseName"] = $courseName;
    $studentID = $_SESSION["studentID"];
    $type = $_GET["type"];
    if($type == "powerpoint"){
        $dir = "../Resources/$courseName/PowerPoints/";
    }else{
        $dir = "../Resources/$courseName/Other/";
    }
    $dateToday = date("Y-m-d"); 
    //$dateToday = str_replace("/", "-", $date);
    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");


?>

<div class="content" id="quizContent">

    <h1><?php echo($courseName) ?> Resources </h1>
    <table id="studentTable">               
        <tr>
            <th>Resource Name</th> <th>Active Date</th> <th>End Date</th> <th>View Resource</th>
        </tr>
    


<?php

if(is_dir($dir)){
    if($dh = opendir($dir)){
        while(($file = readdir($dh)) !== false){
            if(($file != '.') && ($file != '..')){ ?>
                <tr>
                    <?php
                        print_r($file);
                        $sql = "SELECT startDate, endDate from resource WHERE fileName = '$file'";
                        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if($row = mysqli_fetch_array($data)){
                            $startDate = $row["startDate"];
                            $startDate = date($startDate);
                            $endDate = $row["endDate"];
                            $endDate = date($endDate);
                        }
                    ?>
                    <td><?php echo($file); ?></td>
                    <td><?php echo($startDate); ?></td>
                    <td><?php echo($endDate); ?></td>
                    <?php
                        // Check if the document is within the date parameters

                        if(($dateToday < $endDate) && ($dateToday > $startDate)){
                            $filePath = $dir . $file;
                            // Need to figure out how to actually download the file.
                            ?> <td><?php  echo("<a href='openResource.php?fileName=$dir$file'><button>open</button></a>") ?></td>
                            <?php
                        }else{
                            echo("<td>Unavailable</td>");
                        }
                    ?>
                </tr>
                <?php
            }
        }
        closedir($dh);
    }
}

mysqli_close($conn);

?>

    </table>    
</div>

<div class="content">
    <a href="studentCourses.php"><p><i class="fas fa-arrow-left"></i> Return to Dashboard</p></a>
</div>



