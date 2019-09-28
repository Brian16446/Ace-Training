window.onload = function (){
    
    var numQuizzes = document.getElementById('numQuizzes').value;
    var numQuizzesCompleted = document.getElementById('numQuizzesCompleted').value;
    
    var result = numQuizzesCompleted / numQuizzes * 100;
    var progressPercent = Math.floor(result);



    var bar = document.getElementById('progressBar');
    var width = 1;
    var id = setInterval(frame, 10); //every 10ms execute frame function
    function frame(){
        if (width >= progressPercent){
            clearInterval(id);  // stop the interval timer
        }else{
            width++;
            bar.style.width = width + '%';
            bar.innerHTML = width + '%';
        }
    }
}