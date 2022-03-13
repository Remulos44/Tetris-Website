<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Home</title>

    <?php session_start(); ?>

    <?php
    if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['pword']) && isset($_POST['display'])) {
    require "res/connect.php";
        $sql = "INSERT INTO Users (username, firstName, lastName, Password, Display) VALUES ('";
            $sql .= $_POST['uname'];
            $sql .= "', '";
            $sql .= $_POST['fname'];
            $sql .= "', '";
            $sql .= $_POST['lname'];
            $sql .= "', '";
            $sql .= $_POST['pword'];
            $sql .= "', '";
            $sql .= $_POST['display'];
            $sql .= "');";
        if (mysqli_query($conn, $sql)) {
            echo "New user added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>

    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: blue;
        position: fixed;
        top: 0;
        width: 100%;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-family: Arial;
        font-weight: bold;
        font-size: 12px;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    a.active {
        background-color: #04AA6D;
    }

    div.main {
        background-image: url("res/tetris.png");
        width: 100%;
        height: 700px;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: 95% auto;
    }

    #logged-in, #not-logged-in {
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 40%;
        padding: 10px;
        background-color: #c7c7c7;
        box-shadow: 5px 5px 10px;
    }

    .div-title {
        color: white;
        text-align: center;
        text-shadow: 1px 1px 1px black;
        font-size: 50px;
    }

    .play-button {
        background-color: white;
        border: 2px solid blue;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        cursor: pointer;
        border-radius: 8px;
        transition-duration: 0.4s;
    }

    .play-button:hover {
        background-color: blue;
        color: white;
    }
    </style>
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a class="active" href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
        <li name="logout" style="float:right"><a href="/ecm1417_coursework/res/logout.php" <?php if (isset($_SESSION['loggedin'])){?>style="display: block"<?php }else{?>style="display:none"<?php } ?>>LogOut</a></li>
    </ul>
    <div class="main">
        <div class="gap" style="height: 200px;"></div>
        <div id="logged-in" <?php if (isset($_SESSION['loggedin'])){?>style="display: flex"<?php }else{?>style="display:none"<?php } ?>>
            <h1 class="div-title">Welcome to Tetris</h1><br>
            <?php echo"<p>Welcome back ".$_SESSION['username']."</p>" ?>
            <a href="tetris.php"><button type="button" class="play-button">Click here to play</button></a>
        </div>
        <div id="not-logged-in" <?php if (isset($_SESSION['loggedin'])){?>style="display: none"<?php }else{?>style="display:flex"<?php } ?>>
            <h1 class="div-title">Login Form</h1><br>
            <form class="login-form" method="post" action="res/auth.php">
                <label for="log-uname">Username:</label><br>
                <input type="text" id="log-uname" name="log-uname" placeholder="username"><br>
                <label for="log-pword">Password:<label><br>
                <input type="password" id="log-pword" name="log-pword"><br><br>
                <input type="submit" value="Login" name="log-submit">
            </form>
            <p>Don't have a user account? <a href="register.php">Register now</a></p>
        </div>
    </div>
</body>
</html>
