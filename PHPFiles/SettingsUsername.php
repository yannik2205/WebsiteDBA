<?php
    session_start();

    $_SERVER = "panel.act-gaming.de:3306"; //Verbindung zu jonathans panel und dem server
    $user = "u28_DyMoTwUVAJ";
    $pass ="Pzn^3WcGa39^kwKlI8mksT@1";
    $db = "s28_project";

    $con = mysqli_connect($_SERVER, $user, $pass);
    mysqli_select_db($con, $db);

    $sessionemail = $_SESSION['E_Mail'];
    $newusername = $_POST['NewUsername'];

    $sqlchange = "UPDATE Account SET Username = '$newusername' WHERE E_Mail = $sessionemail";
    mysqli_query($con, $sqlchange);
    mysqli_close($con);
?>