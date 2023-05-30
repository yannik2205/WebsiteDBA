<?php
    global $test;
    if ($test == 1){
        echo "penis";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["logoutbutton"] == "logout"){
        session_destroy();
        header("Location: index.php");
        }
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
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-magnifying-glass"></i> 
                        <span class="Link-Text">Search</span> 
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
                <?php if (isset($_SESSION["Username"])){?>
                    <div class="AccountStuff">
                        <li class="nav-item">
                            <a href="SettingsNickname.php" class="nav-link">
                            <i class="fa-solid fa-user-graduate"></i> 
                            <span class="Link-Text">Account</span> 
                            </a>
                        </li>
                        <li class="nav-item">                       
                            <button type="submit" class="logoutbutton" name="logoutbutton" value="logout">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </button>
                        </li>    
                    </div>
                    <?php }  else{?>
                    <div class="AccountStuff">
                        <li>
                            <a href="login.php" class="nav-link">
                            <i class="fa-solid fa-receipt"></i>
                            <span class="Link-Text">Login</span> 
                            </a>
                        </li>
                        <li>
                            <a href="register.php" class="nav-link">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            <span class="Link-Text">Register</span>
                            </a> 
                        </li>    
                    </div>   
                    <?php } ?> 
            </ul>
        </nav>
    </body>
</html>