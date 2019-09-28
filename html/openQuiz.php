<?php
    session_start();
    $quizName = $_GET["quizName"];
    $_SESSION["quizName"] = $quizName;
    $courseName = $_SESSION["courseName"];
    echo("<h1>$courseName $quizName</h1>");

    $quiz = file("../Resources/$courseName/Quizzes/$quizName");

    $lineNum = 0;
    $name = 0;
    $c = 'A';
    echo("<form action='phpFunctions/checkQuiz.php' method='post'>");
    

    
    foreach ($quiz as $line) {
        if ($lineNum % 6 == 0) {
            echo("<br/>");
            echo "<h3>$line</h3>";
            $name++;
            $c = 'A';
        }
        else if ($lineNum % 6 >= 1 && $lineNum % 6 <= 4) {
            if(strlen($line) != 2){
                echo "$line <input type='radio' name='$name' value='$c'/><br/>";
                $c++;
            }
        }
        
    $lineNum++;
    }
    echo('<br/>');
    echo('<input id="submit" type="submit" value="Submit">');
    echo("</form>");

?>


