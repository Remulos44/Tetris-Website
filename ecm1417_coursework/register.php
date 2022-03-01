<!DOCTYPE html>
<html>
<head>
    <title>index</title>
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
        width: auto;
        height: 1000px;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: 95% auto;
        margin-top: 50px;
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
        <form id="register_form" action="/ecm1417_coursework/index.php">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name:</lable><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname"><br>
            <label for="pword">Password:</label><br>
            <input type="password" id="pword" name="pword" placeholder="Password"><br>
            <label for="cpword">Confirm password:</label><br>
            <input type="password" id="cpword" name="cpword" placeholder="Confirm password"><br>
            <label for="display">Display Scores on Leaderboard</label><br>
            <label for="#yesdisplay">Yes</label>
            <input type="radio" id="yesdisplay" name="display" value="Yes" checked>
            <label for="#nodisplay">No</label>
            <input type="radio" id="nodisplay" name="display" value="No">
        </form>
    </div>
</body>
</html>
