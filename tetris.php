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
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #04AA6D;
    }
    </style>
</head>
<body>
    <ul>
        <li name="home"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris"><a class="active" href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
</body>
</html>
