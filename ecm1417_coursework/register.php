<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Register</title>

    <!-- <?php
        // if( isset($_POST['display'])) {
        //     if ($_POST['display'] == "yes") {
        //         $display_val = 1;
        //     } else {
        //         $display_val = 0;
        //     }
        // require "res/connect.php";
        //     $sql = "INSERT INTO Users (username, firstName, lastName, Password, Display) VALUES ('";
        //         $sql .= $_POST['uname'];
        //         $sql .= "', '";
        //         $sql .= $_POST['fname'];
        //         $sql .= "', '";
        //         $sql .= $_POST['lname'];
        //         $sql .= "', '";
        //         $sql .= $_POST['pword'];
        //         $sql .= "', '";
        //         $sql .= $display_val;
        //         $sql .= "');";
        //     if (mysqli_query($conn, $sql)) {
        //         echo "New user added successfully";
        //     } else {
        //         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //     }
        // }
        // mysqli_close($conn);
    ?> -->

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
            height: 900px;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: 95% auto;
            overflow: auto;
        }

        .reg-form {
            margin-left: auto;
            margin-right: auto;
            margin-top: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40%;
            padding: 10px;
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
        }

        #reg-title {
            color: white;
            text-align: center;
            text-shadow: 1px 1px 1px black;
            font-size: 50px;
        }
    </style>
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <!-- <div class="gap" style="height: 200px;"></div> -->
        <div class="reg-form">
            <h1 id="reg-title">Registration Form</h1><br>
            <form id="register_form" action="/ecm1417_coursework/index.php" method="post">
                <label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Last name:</lable><br>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="uname">Username:</label><br>
                <input type="text" id="uname" name="uname"><br><br>
                <label for="pword">Password:</label><br>
                <input type="password" id="pword" name="pword" placeholder="Password"><br>
                <input type="password" id="cpword" name="cpword" placeholder="Confirm password"><br><br>
                <label for="display">Display Scores on Leaderboard</label><br>
                <label for="yes">Yes</label>
                <input type="radio" id="yes" name="display" value="yes" checked>
                <label for="no">No</label>
                <input type="radio" id="no" name="display" value="no"><br><br>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>
