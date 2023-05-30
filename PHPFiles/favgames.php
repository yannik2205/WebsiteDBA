<?php
    require_once("connection.php");
    global $con;
    global $db;
    mysqli_select_db($con, $db);

    $getallgames = "SELECT Game_Name FROM games";
    $erggetallgames = mysqli_query($con, $getallgames);
?>


<html>
    <head>
        <title> Forum ACT - Gaming </title>
        <link rel="stylesheet" href="../CSSFiles/FavGames.css">
    </head>
    <body>
        <section>
            <h1 class="top"> All <h1>
            <h1> Favourite <h1>
            <h2> Games <h2>
            <div class="form-box">
                <div class="form-value">
                    <div class="echos">  
                        <?php while ($row = mysqli_fetch_array($erggetallgames)){ ?>
                            <p> <?php echo $row["Game_Name"]; ?> </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>