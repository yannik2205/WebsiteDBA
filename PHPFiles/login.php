<?php
/* just the basic login via php without safe transfer bc fuck it */
 //Connect yallah
    $_SERVER = "datenbank.act-gaming.de"; //Verbindung zu jonathans panel und dem server
    $user = "u28_DyMoTwUVAJ";
    $pass ="Pzn^3WcGa39^kwKlI8mksT@1"
    $db = "s28_project";
    $con = mysqli_connect($_SERVER, $user, $pass);


// ganzen posts einmal in eine Variable speichern ist vermutlich besser so
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $Remember = $_POST["Remember"];

    mysqli_select_db($con, $db);
    $EMailAbfrage = "SELECT COUNT(email) FROM account WHERE email = '".mysqli_real_escape_string($_POST['EmailIf'])."'";
    $erg = mysqli_query($EMailAbfrage);
    $var = mysqli_fetch_object($erg);
    if ($var ->anzahl == 1){
        $getPasswort = "SELECT passwort FROM account WHERE email = $email";
        $erg = mysqli_query($getPasswort);
        $var = mysqli_fetch_object($erg);
        if ($password == $erg){
         //login = true
        }
        else{
            //login = false
        }
    }
    else{
        print("Wir finden diesen Benutzernamen ncht nimm doch mal den richtigen");
    }



