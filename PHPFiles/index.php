<?php
    session_start();
    if (isset($_SESSION["Username"])){
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="images/png" href="../MainImages/eren.png">
        <title> Forum ACT - Gaming</title>
        <script src="https://kit.fontawesome.com/b86feec811.js" crossorigin="anonymous"></script>

        
        <!-- Stylesheets-->
        <link rel="stylesheet" href="../CSSFiles/Menu1.css">
        <link rel="stylesheet" href="../CSSFiles/General.css">
    </head>

    <body>
        <img src="../MainImages/BackgroundEldenRing.jpg" class="Background">
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fa-solid fa-earth-americas"></i>
                        <span class="Link-Text">Home</span> 
                    </a>
                </li>

                <li class="nav-item">
                    <a href="favgames.php" class="nav-link">
                        <i class="fa-solid fa-magnifying-glass"></i> 
                        <span class="Link-Text">Fav Games</span> 
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-message"></i>
                        <span class="Link-Text">Dm's</span> 
                        </a>
                    </li>

                <li class="nav-item" >
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-file"></i>
                        <span class="Link-Text">Files</span>
                     </a>
                </li>

                <li class="nav-item">
                    <a href="https://panel.act-gaming.de/portal" class="nav-link">
                        <i class="fa-solid fa-plug"></i> 
                        <span class="Link-Text">Server</span> 
                    </a>
                </li>
                    <div class="AccountStuff">
                        <li>
                            <a href="login.php" class="nav-link">
                            <i class="fa-solid fa-receipt"></i>
                            <span class="Link-Text">Login</span> 
                            </a>
                        </li>
                    </div>
            </ul>
        </nav>
    </body>
</html>