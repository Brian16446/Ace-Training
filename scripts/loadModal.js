var modal = document.getElementById('modal');
var closeButton = document.getElementById('close');
var tickButton = document.getElementById('yes');
var rowID = {id: 0};
var student = {id: 0};
var tutor = {id:0};



function checkCertain(idNum){
    modal.style.display = "block";
    document.getElementById("modalText").innerHTML = "Are you sure you want to validate this person?";
    rowID.id = idNum;
    student.id = document.getElementById(rowID.id).innerHTML;
}

closeButton.onclick = function(){
    modal.style.display = "none";
}



tickButton.addEventListener('click', function(){
    modal.style.display = "none";
    document.getElementById("validate" + rowID.id).innerHTML = "Validated";
    // Get the variable from the form, then add to the query string.
    var pageURL = document.location.href.substring(document.location.href.lastIndexOf("/")+1, document.location.href.length);
    if(pageURL == "tutorValidate.php"){
        authoriseStudent(); 
    }
    else if(pageURL == "adminValidate.php"){
        authoriseTutor();
    }
    else if(pageURL == "adminValidateOntoCourse.php"){
        var course = document.getElementById("course" + rowID.id).innerHTML;
        authoriseTutorOntoCourse(course);
    }
})



function authoriseStudent(){    
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            console.log(result);
        }
    }

    id = parseInt(student.id);

    xhttp.open("GET", "phpFunctions/authoriseStudent.php?studentID=" + id, true);
    xhttp.send();
}

function authoriseTutor(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            console.log(result);
        }
    }
    
    //variable for student id is working as tutor id 
    id = parseInt(student.id);

    xhttp.open("GET", "phpFunctions/authoriseTutor.php?tutorID=" + id, true);
    xhttp.send();
}

function authoriseTutorOntoCourse(course){
    var xhttp = new XMLHttpRequest();
console.log(course);
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            console.log(result);
        }
    }
    
    //variable for student id is working as tutor id 
    id = parseInt(student.id);
    // get the variable course name from the form and pass it into query string

    xhttp.open("GET", "phpFunctions/authoriseTutorOntoCourse.php?tutorID=" + id + '&course=' + course, true);
    xhttp.send();
}