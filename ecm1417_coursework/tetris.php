<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Game</title>
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
            width: 100%;
            height: auto;
            overflow: auto;
            background-image: url("res/tetris.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: 95% auto;
        }
        div.game {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 300px;
            height: auto;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 200px;
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            position: relative;
        }
        #tetris-bg {
            width: 300px;
            height: 600px;
            background-image: url("res/tetris-grid-bg.png");
        }
        .next-block {
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            width: 150px;
            height: 150px;
            padding: 10px;
            position: absolute;
            right: -200px;
            top: 0;
            outline: 1px black solid;
            outline-offset: -10px;
        }
        #play-button {
            margin-top: 10px;
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
        #play-button:hover {
            background-color: blue;
            color: white;
        }
        #L { background-color: #ff7f00; }
        #Z { background-color: #ff0000; }
        #S { background-color: #00ff00; }
        #T { background-color: #800080; }
        #O { background-color: #ffff00; }
        #I { background-color: #00ffff; }
        #J { background-color: #0000ff; }
    </style>
</head>
<body onload="loadPage()">
    <ul>
        <li name="home" style="float:left"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a class="active" href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <div class="game">
            <div id="tetris-bg"></div>

            <button type="button" id="play-button" onclick="startGame()">Start the game</button>

            <div class="next-block">

            </div>
        </div>
    </div>

    <script>
        function loadPage() {
            document.getElementById("play-button").style.display="inline-block";
            document.getElementByClassName("next-block").style.display="none";
        }
        function startGame() {
            document.getElementById("play-button").style.display="none";
            document.getElementByClassName("next-block").style.display="block";
        }

        var grid = [...Array(10)].map(e => Array(20));
        var shapes = {
            "L": [ [1,1],[1,2],[1,3],[2,3] ],
            "Z": [ [1,1],[2,1],[2,2],[2,3] ],
            "S": [ [1,2],[2,1],[2,2],[3,1] ],
            "T": [ [1,1],[2,1],[2,2],[3,1] ],
            "O": [ [1,1],[1,2],[2,1],[2,2] ],
            "I": [ [1,1],[1,2],[1,3],[1,4] ],
            "J": [ [1,1],[2,1],[1,2],[1,3] ]
        };

        // Select Next Random Block
        switch Math.floor(Math.random()*7) {
            case 0:
                next = "L";
                break;
            case 1:
                next = "Z";
                break;
            case 2:
                next = "S";
                break;
            case 3:
                next = "T";
                break;
            case 4:
                next = "O";
                break;
            case 5:
                next = "I";
                break;
            case 6:
                next = "J";
                break;
        }

    </script>
</body>
</html>
