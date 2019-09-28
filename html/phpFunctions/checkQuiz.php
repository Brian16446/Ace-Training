<?php
session_start();
$quizName = $_SESSION["quizName"];
$courseName = $_SESSION["courseName"];


$quiz = file("../../Resources/$courseName/Quizzes/$quizName");

$data = $_POST;
$conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
$sql = "SELECT numQuestions, quizID FROM quiz WHERE quizName= '$quizName'";
$sqldata = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$r = mysqli_fetch_array($sqldata);
$numQuestions = $r["numQuestions"];
$quizID = $r["quizID"];
print_r($quizID);

// Quizzes might have different number of quiestions so 4 needs to be changed with the number of questions in the quiz
// Can pull this info from the quiz table in database
if(count($data) < $numQuestions){
    echo("you haven't completed all answers");
}else{
    checkMarks($quiz, $quizID, $data);
}

mysqli_close($conn);
// Maybe instead make a new page that says quizcompleted, you scored x/x. click to go back.
header('Location: ../studentCourses.php');

function checkMarks($quiz, $quizID, $data){

    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
    $studentID = $_SESSION["studentID"];
    $courseName = $_SESSION["courseName"];
    
    $studentAnswers = array();

    for($i = 1; $i<=count($data); $i++){
        $studentAnswer = $_POST["$i"];
        array_push($studentAnswers, $studentAnswer);
    }   

    $lineNum = 1;
    $questionNum = 0;
    $correctAnswers = 0;

    foreach ($quiz as $line){
        if($lineNum % 6 == 0){
            // Need to trim the invisible file characters like \n \r as string comparisson won't work.
            $answer = trim($line, " \t\n\r\0\x0B" );
            if($answer === $studentAnswers[$questionNum]){
                $correctAnswers++;
            }
            $questionNum++;
        }
        $lineNum++;
    
    }

    $sql = "SELECT courseID from course WHERE courseName = '$courseName' ";
    $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($data);
    $courseID = $row["courseID"];
    print_r($courseID);

    echo($correctAnswers);
    $dateToday = date("Y-m-d");
    $sql = "INSERT INTO studentQuiz(quizID, studentID, score, dateCompleted, courseID) 
            VALUES($quizID, $studentID, $correctAnswers, $dateToday, $courseID)";
    $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));



    mysqli_close($conn);
}


?>