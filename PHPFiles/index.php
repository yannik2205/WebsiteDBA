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
        <img src="MainImages/BackgroundEldenRing.jpg" class="Background">
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
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
                    <div class="AccountStuff">
                        <li>
                            <a href="SettingsNickname.php" class="nav-link">
                            <i class="fa-solid fa-user-graduate"></i> 
                            <span class="Link-Text">Account</span> 
                            </a>
                        </li>
                            <?php if (session_status()==PHP_SESSION_NONE){?>
                                 <li>
                                 <a href="login.php" class="nav-link">
                                 <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                                 <span class="Link-Text">Login</span> 
                                 </a></li>
                                 <?php }?>
                                 <?php 
                                if (session_status()==PHP_SESSION_ACTIVE){session_start();?>
                                    <li>
                                    <button name="logoutbutton" value="logout"></button>
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                                    <?php
                                    $valuelog = $_POST['logoutbutton'];
                                    echo $valuelog;
                                    ?>
                                    </li>
                                 <?php }?>
                    </div>
                    <li>    
                        <p><?php echo "hallo"?></p>
                    </li>
            </ul>
        </nav>
    </body>
</html>
