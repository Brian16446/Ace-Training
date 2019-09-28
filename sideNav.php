<?php

function loadNav(){
    echo('
        <nav id="sideNav">
        <div class="toggle">
            <span class="close" onclick="hide()">
                <!-- <i class="menu_close fa fa-times fa-lg"></i> -->
                <!-- To be added later with js. -->
                <i class="menu_close fa fa-times fa-lg"></i>
            </span>
        </div>

        <ul>
            <li><a href="#" class="link">Home</a></li>
            <li><a href="#" class="link">Progress</a></li>
            <li><a href="#" class="link">Resources</a></li>
            <li><a href="#" class="link">Chill</a></li>
        </ul>
        </nav>
    ')
}

?>
