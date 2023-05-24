<?php
    session_start();

    $_SERVER = "panel.act-gaming.de:3306"; //Verbindung zu jonathans panel und dem server
    $user = "u28_DyMoTwUVAJ";
    $pass ="Pzn^3WcGa39^kwKlI8mksT@1";
    $db = "s28_project";

    $con = mysqli_connect($_SERVER, $user, $pass);
    mysqli_select_db($con, $db);

    //sessionvariables
    $sessionemail = "Peter@gmail.com";//$_SESSION['Email'];
    $sessionaccid = "12";

    //ALl about Nicknames
    //get nickname for placeholder
    $sqlGetNickname = "SELECT GamingTag from Persdat WHERE Acc_ID = '$sessionaccid'";
    $ergGetNickname = mysqli_query($con, $sqlGetNickname);

    //change Nickname
    //Is there already this Nickname?
    
        $newnickname = $_POST["NewNickname"];
        $stmt = $con->prepare("SELECT GamingTag FROM Persdat WHERE GamingTag = '$newnickname'");
        $stmt->bind_param("s", $sessionaccid);
        $stmt->execute();
        $result = $stmt->get_result();
    
        //nickname not available
        if ($result->num_rows == 1){
            $error = 'Tag already in use';
        }
        if ($result->num_rows == 0){
            $updateNickname = "UPDATE persdat SET GamingTag = '$newnickname' WHERE Acc_ID = '$sessionaccid'";
        }
    

    mysqli_close($con);
?>
<html>
    <head>
        <title> Forum ACT - Gaming </title>
        <link rel="stylesheet" href="htdocs/WebsiteDBA/CSSFiles/AccountSettings.css">
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <h1> Settings </h1>
                    <form  class = "Nickname" action="SettingsNickname.php" method="post">
                        <div class="NicknameDiv">
                            <h3> Nickname </h3>
                            <p>Aktueller Gaming Tag:<?php while ($row = mysqli_fetch_array($ergGetNickname)){echo $row["GamingTag"];}?></p>
                            <p> Neuer Nickname</p>
                            <div class="inputbox">
                                <input type="text" value= "NewNickname" name="NewNickname" style="margin:0px;">
                                <?php if (isset($error)) { ?>
                                <div class="error"><?php echo $error; ?></div>
                                <?php } ?>
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