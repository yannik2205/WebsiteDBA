<?php
    //Start of the session
    session_start();

    //Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Check if the email and password are provided
        if (isset($_POST['Email']) && isset($_POST['Password'])){
            $email = $_POST['Email'];
            $password = $_POST['Password'];

            //Establish a connection to MySQL
            $_SERVER = "panel.act-gaming.de:3306"; //Verbindung zu jonathans panel und dem server
            $user = "u28_DyMoTwUVAJ";
            $pass ="Pzn^3WcGa39^kwKlI8mksT@1";
            $db = "s28_project";

            $con = new mysqli($_SERVER, $user, $pass);
        
            //chek the connection
            if($con->connect_error){
                die("Connection failed:" . $con->connect_error);
            }

            //Prepare and execute the query
            $stmt = $con->prepare("SELECT * FROM Account WHERE E_Mail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a matching user is found
            if ($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $storedPassword = $row['Passwd'];

                //Verify the Password
                if($password == $storedPassword){
                    //Authentication successful
                    $_SESSION['E_Mail'] = $email; //Store the email in the session
                    header('Location: index.html'); //Redirect to the dashboard or another page
                    exit;
                }else{
                    //Authentication failed
                    $error = 'Invalid email or password';
                }
            }else{
                    //Authentication failed
                    $error = 'Invalid email or password';
            }

            //close the statement and connection
            $stmt->close();
            $con->close();
            }else{
                $error = 'Email and password are required';
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
                            <input type="email" required name="Email">
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" required name="Password">
                            <label for="">Password</label>
                        </div>
                        <div class="forget">
                            <label for=""><input type="checkbox" name="Remember">Remember Me |<a href="#"> Forgot Password</a></label>
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