<?php
    session_start();
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
                        <li class="nav-item">
                            <a href="SettingsNickname.php" class="nav-link">
                            <i class="fa-solid fa-user-graduate"></i> 
                            <span class="Link-Text">Account</span> 
                            </a>
                        </li>  
                        <form action="index.php">
                            <li>
                                <a href="index.php" class="nav-link">
                                <i class="fa-solid fa-receipt"></i>
                                <span class="Link-Text">Logout</span> 
                                </a>
                            </li> 
                        </form>
                    </div>   
            </ul>
        </nav>
    </body>
</html>