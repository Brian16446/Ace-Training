<?php
    session_start();
    function sideNav(){
        echo('
            <nav id="sideNav">
            <div class="toggle">
                <span class="close" onclick="hide()">
                    <!-- <i class="menu_close fa fa-times fa-lg"></i> -->
                    <!-- To be added later with js. -->
                    <i class="menu_close fa fa-times fa-lg"></i>
                </span>
            </div>

            <ul id="sideNavUL">
                <li><a href="welcomepage.php" class="link">Home</a></li>
                <li><a href="#" class="link">News</a></li>
                <li><a href="#" class="link">Careers</a></li>
                <li><a href="#" class="link">Meet the Team</a></li>
            </ul>
            </nav>

            <div id="buttons">
                <span class="menu" onclick="show()">
                        <i class="menu_open fa fa-bars fa-lg"></i>
                </span>
            </div>
        ');
    }


    function topNav(){
        $num = 1;

        
        if( !isset($_SESSION["forename"])){
            echo('
                <div class="topnav">
                    <button id="login" onclick="location.href =\'login.php\' ">LOG IN</button>
                    <button id="signup" onclick="location.href = \'registerChoice.php\'">SIGN UP</button>
                </div>
                ');
        }else{ // THIS BIT WILL HAVE THE DROP DOWN THAT JUST SAYS RETURN TO MY DASHBOARD.
            $name = $_SESSION['forename'];
            echo('
                <div class="topnav">
                    <span onclick="showUserMenu()"><h3> '.$name.' <i class="fas fa-user-circle"></i></h3></span>
                    <div id="userMenu">
                        <ul>
                            <a href="phpFunctions/viewDashboard.php"><li>Dashboard</li></a>
                            <a href="phpFunctions/logout.php"><li>Logout</li></a>
                        </ul>
                    </div>
                </div>
                
            ');
        }
        
    }

    

?>

