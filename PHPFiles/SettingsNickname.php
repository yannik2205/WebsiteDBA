<?php
    session_start();

    require_once("connection.php");
    global $con;
    global $db;
    mysqli_select_db($con, $db);

    //sessionvariables
    $sessionaccid = $_SESSION['Acc_ID'];
    $sessionusername = $_SESSION['Username'];//$_SESSION['Username'];

    //ALL ABOUT EMAIL - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    //get current email
    $sqlGetEmail = "SELECT E_Mail FROM Account WHERE Acc_ID = '$sessionaccid'";
    $ergGetEmail = mysqli_query($con, $sqlGetEmail);
    while ($row = mysqli_fetch_array($ergGetEmail)){
        $currentemail = $row["E_Mail"];
    }
    //change email
    //is there already this email?
    if (isset($_POST['NewEmail'])){
        if($_POST['NewEmail'] !== ""){
        $newemail = $_POST["NewEmail"];
        $stmt = $con->prepare("SELECT E_Mail FROM Account WHERE E_Mail = ?");
        $stmt->bind_param("s", $newemail);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_array($ergGetEmail)){
            $currentemail = $row["E_Mail"];
        }
        //Email not available
        if ($result->num_rows == 1){
            $erroremail = 'Email already in use';
        }
        //Email available
        if ($result->num_rows == 0){
            $updateEmail = "UPDATE Account SET E_Mail = '$newemail' WHERE Acc_ID = '$sessionaccid'";
            mysqli_query($con, $updateEmail);
            mysqli_query($con, $updateEmail);
                $ergGetEmail = mysqli_query($con, $sqlGetEmail);
                while ($row = mysqli_fetch_array($ergGetEmail)){
                    $currentemail = $row["E_Mail"];
                }
            $erroremail = "noice";
        }
    }
    }
        //ALL about password - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        //is there already this password?
        if (isset($_POST['NewPassword'])){
            if ($_POST['NewPassword'] !== ""){
            $newpassword = $_POST["NewPassword"];
            $stmt = $con->prepare("SELECT Passwd FROM Account WHERE Passwd = ?");
            $stmt->bind_param("s", $newpassword);
            $stmt->execute();
            $result = $stmt->get_result();
            //Email not available
            if ($result->num_rows == 1){
                $error = 'Password already in use';
            }
            //Email available
            if ($result->num_rows == 0){
                $updatePassword = "UPDATE Account SET Passwd = '$newpassword' WHERE Acc_ID = '$sessionaccid'";
                mysqli_query($con, $updatePassword);
                
            }
        }
    }
    //ALl about Nicknames - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    
    //get nickname
    $sqlGetNickname = "SELECT GamingTag from Persdat WHERE Acc_ID = '$sessionaccid'";
    $ergGetNickname = mysqli_query($con, $sqlGetNickname);
    while ($row = mysqli_fetch_array($ergGetNickname)){
        $currentnickname = $row["GamingTag"];
    }
    //change Nickname
    //Is there already this Nickname?
        if (isset($_POST['NewNickname'])){
            if($_POST['NewNickname'] !== ""){
                $newnickname = $_POST["NewNickname"];
                $stmt = $con->prepare("SELECT GamingTag FROM Persdat WHERE GamingTag = ?");
                $stmt->bind_param("s", $newnickname);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = mysqli_fetch_array($ergGetNickname)){
                    $currentnickname = $row["GamingTag"];
                }
                //nickname not available
                if ($result->num_rows == 1){
                    $errornickname = 'Tag already in use';
                }
                //nickname available
                if ($result->num_rows == 0){
                    $updateNickname = "UPDATE Persdat SET GamingTag = '$newnickname' WHERE Acc_ID = '$sessionaccid'";
                    mysqli_query($con, $updateNickname);
                    $ergGetNickname = mysqli_query($con, $sqlGetNickname);
                    while ($row = mysqli_fetch_array($ergGetNickname)){
                        $currentnickname = $row["GamingTag"];
                    }      
                }
            }
            
        }
        //ALL about name - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        //get current vorname
        $sqlGetVorname = "SELECT Vorname FROM Persdat WHERE Acc_ID = '$sessionaccid'";
        $ergGetVorname = mysqli_query($con, $sqlGetVorname);
        while ($row = mysqli_fetch_array($ergGetVorname)){
            $currentvorname = $row["Vorname"];
        }
        if (isset($_POST['NewVorname'])){
            if ($_POST['NewVorname'] !== ""){
            $newvorname = $_POST["NewVorname"];
                $updateVorname = "UPDATE Persdat SET Vorname = '$newvorname' WHERE Acc_ID = '$sessionaccid'";
                mysqli_query($con, $updateVorname);
                mysqli_query($con, $updateVorname);
                $ergGetVorname = mysqli_query($con, $sqlGetVorname);
                while ($row = mysqli_fetch_array($ergGetVorname)){
                    $currentvorname = $row["Vorname"];
                }
            }
    }
        //ALL about last name - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        //get current last name
        $sqlGetNachname = "SELECT Nachname FROM Persdat WHERE Acc_ID = '$sessionaccid'";
        $ergGetNachname = mysqli_query($con, $sqlGetNachname);
        while ($row = mysqli_fetch_array($ergGetNachname)){
            $currentnachname = $row["Nachname"];
        }
        if (isset($_POST['NewNachname'])){
            if ($_POST['NewNachname'] !== ""){
            $newnachname = $_POST["NewNachname"];
                $updateNachname = "UPDATE Persdat SET Nachname = '$newnachname' WHERE Acc_ID = '$sessionaccid'";
                mysqli_query($con, $updateNachname);
                mysqli_query($con, $updateNachname);
                $ergGetNachname = mysqli_query($con, $sqlGetNachname);
                while ($row = mysqli_fetch_array($ergGetNachname)){
                    $currentnachname = $row["Nachname"];
                }
            }
    }
        //ALL about Fav Game - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        //get current fav game
        $sqlGetFavGame = "SELECT FavGame FROM Persdat WHERE Acc_ID = '$sessionaccid'";
        $ergGetFavGame = mysqli_query($con, $sqlGetFavGame);
        while ($row = mysqli_fetch_array($ergGetFavGame)){
            $currentfavgame = $row["FavGame"];
        }
        if (isset($_POST['NewFavGame'])){
            if ($_POST['NewFavGame'] !== ""){
            $newfavgame = $_POST["NewFavGame"];
                $updateFavGame = "UPDATE Persdat SET FavGame = '$newfavgame' WHERE Acc_ID = '$sessionaccid'";
                mysqli_query($con, $updateFavGame);
                mysqli_query($con, $updateFavGame);
                $ergGetFavGame = mysqli_query($con, $sqlGetFavGame);
                while ($row = mysqli_fetch_array($ergGetFavGame)){
                    $currentfavgame = $row["FavGame"];
                }
            }
    }
    mysqli_close($con);
?>
<html>
    <head>
        <title> Forum ACT - Gaming </title>
        <link rel="stylesheet" href="../CSSFiles/AccountSettings1.css">
    </head>
    <body>
        <h1> Settings </h1>
    <form class="Changes" action="SettingsNickname.php" method="post">
        <section>
                <div class="form-box">
                    <div class="form-value">
                        
                            <div class="EmailDiv">
                                <h4> Email </h4>
                                <p>Aktuelle Email: <?php echo $currentemail?></p>
                                <p> Neue Email     </p>
                                <div class="inputbox">
                                    <input type="text" name="NewEmail">
                                </div>
                                <?php if (isset($erroremail)) { ?>
                                    <div class="error"><?php echo $erroremail; ?></div>
                                    <?php } ?>
                            
                            </div>
                        <div class="PasswordDiv">
                            <h5> Password </h5>
                            <p> Neues Password </p>
                            <div class="inputbox">
                                <input type="text" name="NewPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <div class="form-value">
                        <div class="NicknameDiv">
                            <h3> Nickname </h3>
                            <p>Aktueller Gaming Tag:<?php echo $currentnickname?></p>
                            <p> Neuer Nickname</p>
                            <div class="inputbox">
                                <input type="text"name="NewNickname" style="margin:0px;">
                            </div>
                            <?php if (isset($errornickname)) { ?>
                                <div class="error"><?php echo $errornickname; ?></div>
                                <?php } ?>
                            
                        </div>
                        <div class="VornameDiv">
                            <h5> Vorname </h5>
                            <p>Aktueller Vorname: <?php echo $currentvorname?></p>
                            <p> Neuer Vorname </p>
                            <div class="inputbox">
                                <input type="text" name="NewVorname">
                            </div>  
                        </div>
                        <div class="NachnameDiv">
                            <h5> Nachname </h5>
                            <p>Aktueller Nachname: <?php echo $currentnachname?></p>
                            <p> Neuer Nachname </p>
                            <div class="inputbox">
                                <input type="text" name="NewNachname">
                            </div>  
                        </div>
                        <div class="FavGameDiv">
                            <h5> FavGame </h5>
                            <p>Aktuelles Favourite Game: <?php echo $currentfavgame?></p>
                            <p> Neues Favourite Game </p>
                            <div class="inputbox">
                                <input type="text" name="NewFavGame">
                            </div>
                            <div class="Button">
                                <button type="submit" name="abschicken" value="abschickenFavGame">Apply Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>>
    </body>
</html>