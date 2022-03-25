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
        #next-block-div {
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
            display: block;
        }
        #next-block-text {
            width: auto;
            text-align: center;
        }
        div.tetris-block-main {
            position: absolute;
            left: 130px;
            top: 10px;
        }
        div.tetris-block-next {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
        div.tetris-block-piece {
            position: absolute;
            width: 30px;
            height: 30px;
        }

    </style>
</head>
<body onload="loadPage()">
    <ul>
        <li name="home" style="float:left"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a class="active" href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <div class="game" id="game">
            <div id="tetris-bg"></div>
            <button type="button" id="play-button" onclick="startGame()">Start the game</button>
            <div id="next-block-div">
                <p id="next-block-text">Next Block</p>
            </div>
        </div>
    </div>

    <script>
        // Globals
        var currentBlock;
        var nextBlock;
        var gameActive = false;
        var grid = [...Array(10)].map(e => Array(20));
        var shapes = {
            "L": [ [1,1],[2,1],[3,1],[3,2] ],
            "Z": [ [1,2],[2,2],[2,1],[3,1] ],
            "S": [ [1,1],[2,1],[2,2],[3,2] ],
            "T": [ [1,1],[2,1],[2,2],[3,1] ],
            "O": [ [1,1],[1,2],[2,1],[2,2] ],
            "I": [ [1,1],[1,2],[1,3],[1,4] ],
            "J": [ [1,1],[1,2],[2,1],[3,1] ]
        };

        // Executes at Page Load
        function loadPage() {
            document.getElementById("play-button").style.display="inline-block";
            document.getElementById("next-block-div").style.visibility="hidden";
        }

        // Executes When 'play-button' Pressed
        function startGame() {
            document.getElementById("play-button").style.display="none";
            document.getElementById("next-block-div").style.visibility=null;
            gameLoop();
        }

        // Select Random Shape
        function selectRandomBlock() {
            alert("selectRandomBlock()");
            var shapesIdArr = ["L","Z","S","T","O","I","J"];
            var blockId = shapesIdArr[Math.floor(Math.random()*7)];
            return blockId;
        }

        // Display Next Random Shape
        function assignNextBlock() {
            alert("assignNextBlock()");
            // Select random blockID
            var blockId = selectRandomBlock();

            // Check for existing tetris-block-next
            var nextBlockDivChildren = document.getElementById('next-block-div').children;
            for (i=0; i<nextBlockDivChildren.length; i++) {
                if (nextBlockDivChildren[i].getAttribute('class') === "tetris-block-next") {
                    alert("removing existing tetris-block-next");
                    nextBlockDivChildren[i].remove();
                    break;
                } else {
                    alert("tetris-block-next doesn't exist yet");
                }
            }

            // Create container for tetris block
            var tetrisBlockNext = document.createElement('div');
            tetrisBlockNext.setAttribute('class', 'tetris-block-next');

            // Append container to next-block-div
            document.getElementById('next-block-div').appendChild(tetrisBlockNext);

            // Create the tetris block inside container
            generateBlock(tetrisBlockNext, blockId);

            return tetrisBlockNext;
        }

        // Generate Block
        function generateBlock(parent, blockId) {
            alert("generateBlock()");
            for (let i=0; i<4; i++) {
                // Create blockPiece, assign class & ID
                var blockPiece = document.createElement('div');
                blockPiece.setAttribute('class', 'tetris-block-piece');
                blockPiece.setAttribute('id', blockId);

                // Assign Position of blockPiece
                var leftPosition = ((shapes[blockId][i][0] - 1)*30) + "px";
                blockPiece.style.left = leftPosition;
                var bottomPosition = ((shapes[blockId][i][1] - 1)*30) + "px";
                blockPiece.style.bottom = bottomPosition;

                // Append blockPiece to parent
                parent.appendChild(blockPiece);
            }
        }

        // Clone next block, assign to current block
        function cloneNextToCurrent() {
            alert("cloneNextToCurrent");
            currentBlock = nextBlock.cloneNode(true);
            currentBlock.setAttribute('class', 'tetris-block-main');
            document.getElementById('game').appendChild(currentBlock);
        }

        // Main Game Loop
        function gameLoop() {
            alert("gameLoop()");
            gameActive = true;
            nextBlock = assignNextBlock();
            for (let i=0; i<10; i++) {
                cloneNextToCurrent();
                var num = 30*i + 30;
                currentBlock.style.transform = 'translate(0px,'+num+'px)';
                nextBlock = assignNextBlock();
                gameActive=false;
            }
            alert("end of game");
        }
    </script>
</body>
</html>
