<?php
require_once("connection.php");
global $con;
global $db;

$uname = $_POST["Username"];
$email = $_POST["Email"];
$pass = $_POST["Password"];
mysqli_select_db($con, $db);


// den user erst eintragen, wenn die abfrage erfolgt, ob der user schon existiert!!
$Inserten = "INSERT INTO Account (Username, E_Mail, Passwd) VALUES 
('$uname', '$email', '$pass')";
mysqli_query($con, $Inserten);

$sqlSelectAll = "SELECT * FROM Account";
$erg = mysqli_query($con, $sqlSelectAll);
$var = mysqli_fetch_array($erg);
while ($row = mysqli_fetch_array($erg)){
    echo $row["Acc_ID"] ." ".
         $row["Username"]." ".
         $row["E_Mail"]." ".
         $row["Passwd"]."<br>";
}