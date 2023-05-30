<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Check if the email and password are provided
    if (isset($_POST['Username']) && isset($_POST['Password'])){
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $email = $_POST['E_Mail'];

        //Establish a connection to MySQL
        
        require_once("connection.php");
        global $con;
        global $db;

        mysqli_select_db($con, $db);
        //Prepare and execute the query
        $stmt = $con->prepare("SELECT * FROM Account WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching user isnt found
        if ($result->num_rows == 0){
            $stmt = $con->prepare("SELECT * FROM Account WHERE Passwd = ?");
            $stmt->bind_param("s", $password);
            $stmt->execute();
            $result = $stmt->get_result();
            //Verify the Password
            if($result->num_rows == 0){
                //Authentication successful
                $Inserten = "INSERT INTO Account (Username, E_Mail, Passwd) VALUES 
                ('$username', '$email', '$password')";
                mysqli_query($con, $Inserten);
                session_start();
                $_SESSION['Username'] = $username; //Store the username in the session
                $temp = $_SESSION['Username'];//store acc id in session
                $getAccID = "SELECT Acc_ID FROM Account where Username = '$temp'";
                $erggetAcc = mysqli_query($con, $getAccID);
                while ($row = mysqli_fetch_array($erggetAcc)){
                    $_SESSION['Acc_ID'] = $row["Acc_ID"];
                }
                $temp2 = $_SESSION["Acc_ID"];
                $InsertenPers = "INSERT INTO Persdat (Vorname, Nachname, GamingTag, FavGame, Acc_ID) VALUES ('leer', 'leer', 'leer', 'leer', '$temp2')";
                mysqli_query($con, $InsertenPers);
                header('Location: indexlogin.php'); //Redirect to the dashboard or another page
                exit;
            }else{
                //Authentication failed
                $error = 'Invalid Username or Password';
            }
        }else{
                //Authentication failed
                $error = 'Invalid Username or password';
        }

        //close the statement and connection
        $stmt->close();
        $con->close();
        }else{
            $error = 'Username and password are required';
        }
    }


// den user erst eintragen, wenn die abfrage erfolgt, ob der user schon existiert!!
/*$Inserten = "INSERT INTO Account (Username, E_Mail, Passwd) VALUES 
('$uname', '$email', '$pass')";
mysqli_query($con, $Inserten);*/
?>

<html>
    <head>
        <title> Register</title>
        <link rel="stylesheet" href="../CssFiles/Register.css">
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-group">
                    <h1> Register</h1>
            <form action="register.php" method="post">
                <div class="TextInput">
                    <input  type="text" name="Username">
                    <label for="Username">Username</label>
                </div>
                <div class="TextInput">
                    <input type="text" name="E_Mail">
                    <label for="E_Mail">E_Mail</label>
                </div>
                <div class="TextInput">
                    <input type="text" name="Password">
                    <label for="Password">Password</label>
                </div>
                <button type="submit" name="submit" value="submit">Register</button>
            </form>
            </div>
            </div>
        </section>
    </body>
</html>