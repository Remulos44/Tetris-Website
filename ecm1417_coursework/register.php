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
    }
    </style>
</head>
<body>
    <ul>
        <li name="home"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris"><a href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
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
            <input type="radio" id="display" name="display" value="Yes">
            <input type="radio" id="display" name="display" value="No">
        </form>
    </div>
</body>
</html>
