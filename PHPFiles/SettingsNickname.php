<?php
    session_start();

    $_SERVER = "panel.act-gaming.de:3306"; //Verbindung zu jonathans panel und dem server
    $user = "u28_DyMoTwUVAJ";
    $pass ="Pzn^3WcGa39^kwKlI8mksT@1";
    $db = "s28_project";

    $con = mysqli_connect($_SERVER, $user, $pass);
    mysqli_select_db($con, $db);

    $sessionemail = $_SESSION['E_Mail'];
    $newnickname = $_POST['NewNickname'];

    // get gamingtag which equals the sessionemail
    $stmt = $con->prepare("SELECT GamingTag FROM Account WHERE E_Mail = ?");//hier muss maksim seine scheiße machen
    $stmt->bind_param("s", $sessionemail);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0){
        echo "Da ist nix Nickname";
    }
    if ($result->num_rows == 1){
        $getnickname = ""; //maksim mach bidde
    }
    
    $sqlchange = "UPDATE persdat SET GamingTag = '$newnickname' WHERE E_Mail = $sessionemail";
    mysqli_query($con, $sqlchange);
    mysqli_close($con);
?>
<html>
    <head>
        <title> Forum ACT - Gaming </title>
        <link rel="stylesheet" href="CSSFiles/AccountSettings.css">
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <h1> Settings </h1>
                    <form  class = "Nickname" action="PHPFiles/SettingsNickname.php" method="post">
                        <div class="NicknameDiv">
                            <h3> Nickname </h3>
                            <p> Neuer Nickname</p>
                            <div class="inputbox">
                                <input type="text" name="NewNickname">
                            </div>
                            <div class="Button">
                                <button type="submit" name="abschicken" value="abschickenNickname">&Auml;ndern</button>
                            </div>
                        </div>
                    </form>
                    <form class="Email" action="PHPFiles/SettingsEmail.php">
                        <div class="EmailDiv">
                            <h4> Email </h4>
                            <p> Neue Email     </p>
                            <div class="inputbox">
                                <input type="text" name="NewEmail">
                            </div>
                            <div class="Button">
                                <button type="submit" name="abschicken" value="abschickenEmail">&Auml;ndern</button>
                            </div>
                        </div>
                    </form>
                    <form class="Password" action="PHPFiles/SettingsPassword.php">
                        <div class="PasswordDiv">
                            <h5> Password </h5>
                            <p> Neues Password </p>
                            <div class="inputbox">
                                <input type="text" name="NewPassword">
                            </div>
                            <div class="Button">
                                <button type="submit" name="abschicken" value="abschickenPassword">&Auml;ndern</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>