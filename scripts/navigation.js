
// ELEMENTSF FOR DEFAULT MODAL
var modal = document.getElementById('modal');
var closeButton = document.getElementById('close');
var tickButton = document.getElementById('yes');
var backButton = document.getElementById('back');
var undoButton = document.getElementById('undo');

// ELEMENTS FOR BACK MODAL
var backModal = document.getElementById('backModal');
var backModalTickButton = document.getElementById('backYes');
var backModalCloseButton = document.getElementById('backClose');

// ELEMENTS FOR UNDO MODAL
var undoModal = document.getElementById('undoModal');
var undoModalTickButton = document.getElementById('undoYes');
var undoModalCloseButton = document.getElementById('undoClose');


// DEFAULT MODAL FUNCTIONS
closeButton.onclick = function(){
    modal.style.display = "none";
}

tickButton.onclick = function(){
    modal.style.display = "none";
}

if(undoButton != null){
    undoButton.onclick = function(){
        undoModal.style.display = "block";
    }
}

// BACK MODAL FUNCTIONS
backButton.onclick = function(){
    backModal.style.display = "block";
}

backModalCloseButton.onclick = function(){
    backModal.style.display = "none";
}

// UNDO MODAL FUNCTIONS
undoModalCloseButton.onclick = function(){
    undoModal.style.display = "none";
}

undoModalTickButton.onclick = function(){
    removeData();
    undoModal.style.display = "none";
}


function removeData(){
    var textBoxes = document.getElementsByTagName("input");
    for(var i=0; i<textBoxes.length; i++){
        textBoxes[i].value = "";
    }
}


var selectionCounter = 0;
function addSelect(){
    var select = document.getElementById("inner");
    var clone = select.cloneNode(true);
    var name = select.getAttribute("name") + selectionCounter++;
    clone.id = name;
    clone.setAttribute("name", name);
    document.getElementById("selectContainer").appendChild(clone);
}

function deleteSelect(){
    if(selectionCounter > 0){
        var id = "inner" + (selectionCounter-1);
        var select = document.getElementById(id);
        select.parentNode.removeChild(select);
        selectionCounter--;
    }
}