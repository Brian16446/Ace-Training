<?php

    $courseName = $_GET["courseName"];
    session_start();
    $_SESSION["courseName"] = $courseName;
    $studentID = $_SESSION["studentID"];
    $dir = "../Resources/$courseName/Quizzes/";
    $dateToday = date("Y-m-d"); 
    //$dateToday = str_replace("/", "-", $date);
    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");


?>

<div class="content" id="quizContent">

    <h1><?php echo($courseName) ?> Quizzes</h1>
    <table id="studentTable">               
        <tr>
            <th>Quiz Name</th> <th>Deadline</th> <th>Date Completed</th> <th>Attempt/Score</th>
        </tr>
    


<?php

if(is_dir($dir)){
    if($dh = opendir($dir)){
        while(($file = readdir($dh)) !== false){
            if(($file != '.') && ($file != '..')){ ?>
                <tr>
                    <?php
                        $sql = "SELECT startDate, endDate, quizID, numQuestions from quiz WHERE quizName = '$file'";
                        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if($row = mysqli_fetch_array($data)){
                            $startDate = $row["startDate"];
                            $startDate = date($startDate);
                            $endDate = $row["endDate"];
                            $endDate = date($endDate);
                            $quizID = $row["quizID"];
                            $numQuestions = $row["numQuestions"];
                        }
                    ?>
                    <td><?php echo($file) ?></td>
                    <td><?php echo($endDate) ?></td>
                    <!-- <td>Not yet completed</td> -->
                    
                    <!-- Check if within date parameters. And also check if its been done first  -->
                    <?php 

                        // replace 1 with the id's
                        $sql = "SELECT score, dateCompleted FROM studentQuiz WHERE studentID = $studentID AND quizID = $quizID";
                        $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $row = mysqli_fetch_array($data);
                        
                        if(empty($row)){
                            echo("<td>Not yet completed</td>");
                            if(($dateToday < $endDate) && ($dateToday > $startDate)){
                                ?> <td><button id="<?php echo($file) ?>" onclick="openQuiz(this.id)">Attempt</button></td>
                                <?php
                            }else{
                                echo("<td>Unavailable</td>");
                            }
                        }else{
                            $dateCompleted = $row["dateCompleted"];

                            echo("<td>Completed $dateCompleted</td>");
                            $score = $row["score"];
                            echo("<td>$score/$numQuestions</td>");
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



