<?php
    
    function showModal(){
        echo('
        <div id="modal" class="outerModal">
            <div class="modalContent">
                <p id="modalText">Are you sure you want to do this?</p>
                <span class = "modalButton" id="yes"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="close"><i class="fas fa-times"></i></span>
            </div>
        </div>

        <!-- MODAL FOR THE BACK BUTTON -->
        <div id="backModal" class="outerModal">
            <div class="modalContent">
                <p id="backModalText">Are you sure you wish to go back?</p>
                <span class = "modalButton" id="backYes" onclick="location.href=\'registerChoice.php\'"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="backClose"><i class="fas fa-times"></i></span>
            </div>
        </div>

        <!-- MODAL FOR THE UNDO BUTTON -->

        <div id="undoModal" class="outerModal">
            <div class="modalContent">
                <p id="undoModalText">Are you sure you wish to clear the form?</p>
                <span class = "modalButton" id="undoYes"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="undoClose"><i class="fas fa-times"></i></span>
            </div>
        </div>
        ');
    }


    function showStudentBackModal(){
        echo('
        <div id="modal" class="outerModal">
            <div class="modalContent">
                <p id="modalText">Are you sure you want to do this?</p>
                <span class = "modalButton" id="yes"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="close"><i class="fas fa-times"></i></span>
            </div>
        </div>

        <!-- MODAL FOR THE BACK BUTTON -->
        <div id="backModal" class="outerModal">
            <div class="modalContent">
                <p id="backModalText">Are you sure you wish to go back?</p>
                <span class = "modalButton" id="backYes" onclick="location.href=\'student.php\'"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="backClose"><i class="fas fa-times"></i></span>
            </div>
        </div>

        <!-- MODAL FOR THE UNDO BUTTON -->

        <div id="undoModal" class="outerModal">
            <div class="modalContent">
                <p id="undoModalText">Are you sure you wish to clear the form?</p>
                <span class = "modalButton" id="undoYes"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="undoClose"><i class="fas fa-times"></i></span>
            </div>
        </div>
        ');
    }

    // Trying to make the modal useable on other places on the website without having to do too much to it.
    // There's a fair bit of JS invovled in loading it so messing with it too much might break it and take a while to figure out.



    function showSimpleModal(){
        echo('
        <div id="modal" class="outerModal">
            <div class="modalContent">
                <p id="modalText">Are you sure you want to do this?</p>
                <span class = "modalButton" id="yes"><i class="fas fa-check"></i></span>
                <span class = "modalButton" id="close"><i class="fas fa-times"></i></span>
            </div>
        </div>
        ');
    }


?>



