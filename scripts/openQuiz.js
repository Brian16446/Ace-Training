function openQuiz(quizName){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            document.getElementById("quizContent").innerHTML = result;
        }
    }
   
    xhttp.open("GET", "openQuiz.php?quizName=" + quizName, true);
    xhttp.send();
}

function openResource(fileName){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            document.getElementById("quizContent").innerHTML = result;
        }
    }
   
    xhttp.open("GET", "openResource.php?quizName=" + quizName, true);
    xhttp.send();
}