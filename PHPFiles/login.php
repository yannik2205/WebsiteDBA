<?php
    //Start of the session
    session_start();

    //Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Check if the email and password are provided
        if (isset($_POST['Username']) && isset($_POST['Password'])){
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $test = 2;
            global $test;

            //Establish a connection to MySQL
            $_SERVER = "localhost"; //Verbindung zu jonathans panel und dem server
            $user = "root";
            $pass ="";
            $db = "s28_project";

            $con = new mysqli($_SERVER, $user, $pass, $db);
        
            //check the connection
            /*if($conconnect_error){
                die("Connection failed:" . $con->connect_error);
            }*/
            //Prepare and execute the query
            $stmt = $con->prepare("SELECT * FROM Account WHERE Username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a matching user is found
            if ($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $storedPassword = $row['Passwd'];

                //Verify the Password
                if($password == $storedPassword){
                    //Authentication successful
                    $_SESSION['Username'] = $username; //Store the username in the session
                    $temp = $_SESSION['Username'];//store acc id in session
                    $getAccID = "SELECT Acc_ID FROM Account where Username = '$temp'";
                    $erggetAcc = mysqli_query($con, $getAccID);
                    $vargetAcc = mysqli_fetch_array($erggetAcc);
                    while ($row = mysqli_fetch_array($erggetAcc)){
                        $_SESSION['Acc_ID'] = $row["Acc_ID"];
                    }
                    header('Location: index.php'); //Redirect to the dashboard or another page
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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forum ACT - Gaming | Login</title>
        <link rel="stylesheet" href="CssFiles/Login.css">
        <script src="https://kit.fontawesome.com/b86feec811.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="login.php" method="post">
                        <h2>Login</h2>
                        <?php if (isset($error)) { ?>
                            <div class="error"><?php echo $error; ?></div>
                        <?php } ?>
                        <div class="inputbox">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="text" required name="Username">
                            <label for=""> Username </label>
                        </div>
                        <div class="inputbox">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" required name="Password">
                            <label for="">Password</label>
                        </div>
                        <button type="submit" name="abschicken" value="abschicken">Log in</button>
                        <div class="register">
                            <p>Don't have an account? <a href="#">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html><!--
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Forum ACT - Gaming | Login</title>
        <link rel="stylesheet" href="CssFiles/Login.css">
        <script src="https://kit.fontawesome.com/b86feec811.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="PHPFiles/login.php" method="post">
                        <h2>Login</h2>
                        <div class="inputbox">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="text" required name="Email">
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <i class="fa-solid fa-lock"></i>
                            <input type="text" required name="Password">
                            <label for="">Password</label>
                        </div>
                        <div class="forget">
                            <label for=""><input type="checkbox" name="Remember">Remember Me |<a href="#"> Forgot Password</a></label>
                        </div>
                        <button type="submit" name="abschicken" value="abschicken">Log in</button>
                        <div class="register">
                            <p>Don't have a account? <a href="#">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>-->