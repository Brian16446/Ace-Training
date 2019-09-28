<?php 

    $forename = $_POST["username"];
    $password = $_POST["password"];
    
    // THIS IS HORRIBLE CODE ITS REPEATING LOADS OF STUFF. THERE HAS TO BE A BETTER WAY OF DOING THIS.
    // ALSO NEED TO REDIRECT THE TUTOR TO TUTOR DASHBOARD

    $conn = mysqli_connect("localhost", "root", "root", "acetrainingdatab");
    $sql = "SELECT * FROM student WHERE forename='$forename' AND password='$password'";
    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data) == 0){
        $sql = "SELECT * FROM tutor WHERE forename='$forename' AND password='$password'";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data) > 0){
            $row = mysqli_fetch_array($data);

            $tutorID = $row["tutorID"];
            $forename = $row["forename"];
            $surname = $row["surname"];
            $userType = $row["usertype"];
            $authorised = $row["authorised"];

            session_start();
            $_SESSION["forename"] = $forename;
            $_SESSION["surname"] = $surname;
            $_SESSION["userType"] = $userType;
            $_SESSION["authorised"] = $authorised;
            $_SESSION["tutorID"] = $tutorID;

            $sql = "SELECT courseID FROM tutoroncourse WHERE tutorID = $tutorID";
            $data = mysqli_query($conn, $sql);

            if(mysqli_num_rows($data) > 0){
                $courses = array();
    
                while($row = mysqli_fetch_array($data)){
                    array_push($courses, $row["courseID"]);
                }
    
                $courseNames = array();
                foreach($courses as $c){
                    $sql = "SELECT courseName from course WHERE courseID = $c";
                    $data = mysqli_query($conn, $sql);
                    // print_r($data);
                    echo("<br/>");
                    $row = mysqli_fetch_array($data);
                    
                    array_push($courseNames, $row["courseName"]);
        
                }
                $_SESSION["courseNames"] = $courseNames;
                print_r($_SESSION["courseNames"]);
            }

        }

    }else{
        if(mysqli_num_rows($data) > 0){
            $row = mysqli_fetch_array($data);
    
            $studentID = $row["studentID"];
            $forename = $row["forename"];
            $surname = $row["surname"];
            $userType = $row["usertype"];
            $authorised = $row["authorised"];
    
            session_start();
            $_SESSION["forename"] = $forename;
            $_SESSION["surname"] = $surname;
            $_SESSION["userType"] = $userType;
            $_SESSION["authorised"] = $authorised;
            $_SESSION["studentID"] = $studentID;
    
    
            $sql = "SELECT courseID FROM studentoncourse WHERE studentID = $studentID";
            $data = mysqli_query($conn, $sql);
            // print_r($data);
            echo("<br/>");
            
    
            if(mysqli_num_rows($data) > 0){
                $courses = array();
    
                while($row = mysqli_fetch_array($data)){
                    array_push($courses, $row["courseID"]);
                }
    
                $courseNames = array();
                foreach($courses as $c){
                    $sql = "SELECT courseName from course WHERE courseID = $c";
                    $data = mysqli_query($conn, $sql);
                    // print_r($data);
                    echo("<br/>");
                    $row = mysqli_fetch_array($data);
                    
                    array_push($courseNames, $row["courseName"]);
        
                }
                $_SESSION["courseNames"] = $courseNames;
                print_r($_SESSION["courseNames"]);
            }
    
    
            if($userType == "student"){
                header("location:student.php");
            }
            if($userType == "tutor"){
                header("location:tutor.php");
            }
            if($userType == "admin"){
                header("location:admin.php");
            }
        }else{
            echo("USERNAME OR PASSWORD DOES NOT EXIST");
        }
    }






    // if($username == "admin"){
    //     header("Location: admin.php");
    // }
    // elseif($username == "student"){
    //     header("Location: student.php");
    // }
    // elseif($username == "tutor"){
    //     echo"LINK TO TUTOR DASHBOARD HERE";
    // }
    // else{
    //     echo "Please enter a correct username or password";
    //     echo "<a href='login.php'><p>Click here to go back</p></a>";
    // }

    // Needs to be polished. Maybe just use AJAX for this bit.
?>