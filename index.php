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
        width: 50px;
        height: 50px;
    }
    </style>
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a class="active" href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">

    </div>
</body>
</html>
