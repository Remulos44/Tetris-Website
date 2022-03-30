<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Game</title>
    <style>
        ul.top-list {
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
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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
            margin-bottom: 10px;
            background-color: white;
            border: 2px solid #dd67db;
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
        .score-div {
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            width: 200px;
            height: 50px;
            padding: 10px;
            position: absolute;
            right: -230px;
            outline: 1px black solid;
            outline-offset: -10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .score-text {
            color: white;
            text-shadow: 1px 1px 1px black;
            font-size: 24px;
        }
        #instructions-div {
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            width: 300px;
            height: auto;
            padding: 10px;
            position: absolute;
            right: 330px;
            top: 0;
            outline: 1px black solid;
            outline-offset: -10px;
            display: block;
        }
        #instructions-text {
            color: black;
            text-shadow: 1px 1px 1px white;
            font-size: 18px;
        }
        #next-block-div {
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            width: 200px;
            height: 200px;
            padding: 10px;
            position: absolute;
            right: -230px;
            top: 0;
            outline: 1px black solid;
            outline-offset: -10px;
            display: block;
        }
        #next-block-text {
            width: auto;
            text-align: center;
            color: white;
            text-shadow: 1px 1px 1px black;
            font-size: 24px;
        }
        div.tetris-block-main {
            position: absolute;
            left: 130px;
            top: 10px;
        }
        div.tetris-block-next {
            position: absolute;
            left: 65px;
            bottom: 20px;
        }
        div.tetris-block-piece {
            position: absolute;
            width: 30px;
            height: 30px;
        }
        div.pause-menu {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 60%;
            height: auto;
            padding: 10px;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            top: 400px;
            background-color: #c7c7c7;
            box-shadow: 5px 5px 10px;
            position: absolute;
            outline: 1px black solid;
            outline-offset: -10px;
        }
        .pause-title {
            color: white;
            text-align: center;
            text-shadow: 1px 1px 1px black;
            font-size: 50px;
        }

    </style>
</head>
<body onload="loadPage()">
    <ul class="top-list">
        <li name="home" style="float:left"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a class="active" href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <div class="game" id="game">
            <div id="tetris-bg"></div>
            <div id="next-block-div">
                <h1 id="next-block-text">Next Block</h1>
            </div>
            <div class="score-div" style='top: 230px;'>
                <h1 class="score-text" id="score">Score: 0</h1>
            </div>
            <div class="score-div" style='top: 310px;'>
                <h1 class="score-text" id="rows-completed">Rows: 0</h1>
            </div>
            <div id="instructions-div">
                <h1 id="score-text">Instructions:</h1>
                <ul id="instructions-text">
                    <li><strong>Left Arrow</strong> > Move Left</li><br>
                    <li><strong>Right Arrow</strong> > Move Right</li><br>
                    <li><strong>Up Arrow</strong> > Rotate (WIP)</li><br>
                    <li><strong>Down Arrow</strong> > Move Down</li><br>
                    <li><strong>Space</strong> > Instantly Place Block</li><br>
                    <li><strong>Esc</strong> > Pause</li>
                </ul>
            </div>
        </div>
        <!-- <button type="button" id="play-button" onclick="startGame()">Start the game</button> -->
    </div>

    <script>

        /*
        TODO
        > Rotation
        > Score
        > > End of Game
        */

        // Globals
        var currentBlock;
        var nextBlock;
        var pauseBlock;
        var currentBlockId;
        var nextBlockId;
        var coords = [4,20];
        var score;
        var gameActive = false;
        var paused = false;
        var grid = [...Array(10)].map(e => Array(20)); // grid[column][row]
        var shapes = {
            "L": [ [1,1],[2,1],[3,1],[3,2] ],
            "Z": [ [1,2],[2,2],[2,1],[3,1] ],
            "S": [ [1,1],[2,1],[2,2],[3,2] ],
            "T": [ [1,1],[2,1],[2,2],[3,1] ],
            "O": [ [1,1],[1,2],[2,1],[2,2] ],
            "I": [ [1,1],[1,2],[1,3],[1,4] ],
            "J": [ [1,1],[1,2],[2,1],[3,1] ]
        };
        var newBlockEvent = new CustomEvent('nextBlock');
        var timer;
        var music = new Audio('res/tetris_music.mp3');
        music.play();
        music.loop = true;

        // Executes at Page Load
        function loadPage() {
            // document.getElementById("play-button").style.display="inline-block";
            // document.getElementsByClassName("pause-menu")[0].style.visibility="hidden";
            var button = document.createElement('button');
            button.setAttribute('type', 'button');
            button.setAttribute('id', 'play-button');
            button.setAttribute('onclick', 'startGame()');
            button.innerText = 'Start the Game';
            document.getElementsByClassName('main')[0].appendChild(button);
        }

        // Executes When 'play-button' Pressed
        function startGame() {
            // document.getElementById("play-button").style.visibility="hidden";
            document.getElementById('play-button').remove();
            document.getElementsByClassName('game')[0].style.marginBottom = '76px';

            score = 0;
            if (gameActive) { // For when resetting the game
                if (paused) { unPauseGame(); }
                if (currentBlock != null) { currentBlock.remove(); }
                currentBlock = null;
                coords = [4,20];
                removeExistingBlockPieces();
            }
            gameActive = true;
            nextBlock = assignNextBlock();

            document.dispatchEvent(newBlockEvent);
            timer = setInterval(function(e) {move('autoDown');}, 1000);
        }

        // Next Block Event Handler
        document.addEventListener('nextBlock', function(e) {
            cloneNextToCurrent();
            nextBlock = assignNextBlock();
        });

        // Keydown Event Listener
        document.addEventListener('keydown', function(e) {
            if (gameActive) {
                switch(e.keyCode) {
                    case 37: move("left")   ; break;
                    case 39: move("right")  ; break;
                    case 40: move("down")   ; break;
                    case 38: alert("rotate"); break;
                    case 32: instantPlace() ; break;
                    case 27:
                        if (paused) {
                            unPauseGame();
                        } else {
                            pauseGame();
                        }
                }
            }
        });

        // Remove Existing Block Pieces in Grid (for resetting the game)
        function removeExistingBlockPieces() {
            for (let row=0; row<20; row++) {
                for (let column=0; column<10; column++) {
                    if (grid[column][row] != null) {
                        grid[column][row] = null;
                        let block = document.getElementsByClassName('tetris-block-piece '+column+','+row)[0];
                        if (block) {
                            block.remove();
                        }
                    }
                }
            }
        }

        // Select Random Shape
        function selectRandomBlock() {
            var shapesIdArr = ["L","Z","S","T","O","I","J"];
            var blockId = shapesIdArr[Math.floor(Math.random()*7)];
            return blockId;
        }

        // Display Next Random Shape
        function assignNextBlock() {
            // Select random blockID
            nextBlockId = selectRandomBlock();

            // Check for existing tetris-block-next
            var nextBlockDivChildren = document.getElementById('next-block-div').children;
            for (i=0; i<nextBlockDivChildren.length; i++) {
                if (nextBlockDivChildren[i].getAttribute('class') === "tetris-block-next") {
                    nextBlockDivChildren[i].remove();
                    break;
                }
            }

            // Create container for tetris block
            var tetrisBlockNext = document.createElement('div');
            tetrisBlockNext.setAttribute('class', 'tetris-block-next');

            // Append container to next-block-div
            document.getElementById('next-block-div').appendChild(tetrisBlockNext);

            // Create the tetris block inside container
            generateBlock(tetrisBlockNext, nextBlockId);

            return tetrisBlockNext;
        }

        // Generate Block
        function generateBlock(parent, blockId) {
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
            currentBlock = nextBlock.cloneNode(true);
            currentBlock.setAttribute('class', 'tetris-block-main');

            var tempCoords = [];
            var a = 0;
            var b;
            for (let i=0; i<4; i++) {
                for (let j=0; j<2; j++) {
                    tempCoords[j] = coords[j] + (shapes[nextBlockId][i][j] - 1);
                }
                // Check Horizontal
                if (tempCoords[0] >=10) {
                        b = tempCoords[0]-9;
                        if (b > a) {
                            a = b;
                        }
                    }
            }

            coords = [coords[0]-a,20];
            currentBlock.style.left = (10+(coords[0]*30)) + 'px';
            document.getElementById('game').appendChild(currentBlock);
            currentBlockId = nextBlockId;
        }

        // Move the Block
        function move(direction) {
            var left;
            var down;
            var leftTR;
            var downTR;
            var currentTranslation = [];
            var noCollision = checkCollision(direction);

            if (noCollision) {
                switch(direction) {
                    case 'left'    : left = -1; down = 0; break;
                    case 'right'   : left =  1; down = 0; break;
                    case 'down'    : left =  0; down = 1; break;
                    case 'autoDown': left =  0; down = 1; break;
                }
                currentTranslation = getCurrentTranslation(currentBlock);
                if (currentTranslation) {
                    leftTR = parseInt(currentTranslation[0]) + (left*30);
                    downTR = parseInt(currentTranslation[1]) + (down*30);
                    currentBlock.style.transform = 'translate('+leftTR+'px,'+downTR+'px)';
                } else {
                    currentBlock.style.transform = 'translate('+left*30+'px,'+down*30+'px)';
                }

                coords[0] += left;
                coords[1] -= down;
            }
            if (direction === 'autoDown' && !noCollision) {
                setBlock();
                if (gameActive) {
                document.dispatchEvent(newBlockEvent);
                }
            }
        }

        // Check For Any Complete Lines
        function checkForLines() {
            loop1:
            for (let row=0; row<20; row++) {
                let lineFull = true;
                loop2:
                for (let column=0; column<10; column++) {
                    if (grid[column][row] == null) {
                        lineFull = false;
                        break loop2;
                    }
                }
                if (lineFull) {
                    reAdjustBlocks(row);
                    checkForLines();
                    break loop1;
                }
            }
        }

        // Adjusts blocks if row is removed
        function reAdjustBlocks(rowRemoved) {
            // Remove the Row
            for (let column=0; column<10; column++) {
                grid[column][rowRemoved] = null;
                let className = 'tetris-block-piece ' + column + ',' + rowRemoved;
                document.getElementsByClassName(className)[0].remove();
            }

            // Move above, down
            for (let row=rowRemoved+1; row<20; row++) {
                for (let column=0; column<10; column++) {
                    if (grid[column][row] != null) {
                        grid[column][row-1] = grid[column][row];
                        grid[column][row] = null;
                        let className = 'tetris-block-piece ' + column + ',' + row;
                        let block = document.getElementsByClassName(className)[0];
                        let bottom = parseInt(block.style.bottom.match(/[0-9]+/));
                        let newBottom = bottom-30;
                        block.style.bottom = newBottom + 'px';
                        let newRowClass = row-1;
                        let newClass = 'tetris-block-piece ' + column + ',' + newRowClass;
                        block.setAttribute('class', newClass);
                    }
                }
            }
        }

        // Instantly Move Block to Bottom
        function instantPlace() {
            var noCollision = true;
            while (noCollision) {
                noCollision = checkCollision("down");
                move("autoDown");
            }
        }

        // Get Current Translation
        function getCurrentTranslation(block) {
            var str = block.style.transform;
            var xyArr = [];
            if (str != '') {
                xyArr = str.match(/-?[0-9]+/g);
                if (xyArr.length === 1) {
                    xyArr[1]='0';
                }
            } else {
                xyArr = ['0','0'];
            }
            return xyArr;
        }

        // Check Block is Within Bounds
        function checkCollision(direction) {
            var noCollision = true;
            var tempCoords = [];
            var left;
            var down;
            switch(direction) {
                case 'left'    : left = -1; down =  0; break;
                case 'right'   : left =  1; down =  0; break;
                case 'down'    : left =  0; down = -1; break;
                case 'autoDown': left =  0; down = -1; break;
            }
            for (let i=0; i<4; i++) {
                for (let j=0; j<2; j++) {
                    tempCoords[j] = coords[j] + (shapes[currentBlockId][i][j] - 1);
                }
                // Check Vertical
                if (tempCoords[1] <= 20) {
                    if (grid[tempCoords[0]+left][tempCoords[1]+down] != null ||
                        tempCoords[1]+down < 0) {
                            noCollision = false;
                            break;
                        }
                }
                // Check Horizontal
                if (tempCoords[0]+left < 0 ||
                    tempCoords[0]+left >=10) {
                        noCollision = false;
                        break;
                    }
            }
            return noCollision;
        }

        // Set the block into grid
        function setBlock() {
            var tempCoords = [];
            for (let i=0; i<4; i++) {
                for (let j=0; j<2; j++) {
                    tempCoords[j] = coords[j] + (shapes[currentBlockId][i][j] - 1);
                }
                if (tempCoords[1] > 19) {
                    gameOver();
                    break;
                } else {
                    grid[tempCoords[0]][tempCoords[1]] = currentBlockId;

                    var left = 10;
                    var bottom = 10;
                    var block = document.createElement('div');
                    block.setAttribute('id', currentBlockId);
                    var location = tempCoords[0] + "," + tempCoords[1];
                    block.setAttribute('class', 'tetris-block-piece '+location)
                    left += tempCoords[0]*30;
                    bottom += tempCoords[1]*30;
                    block.style.left = left+'px';
                    block.style.bottom = bottom+'px';
                    document.getElementById('game').appendChild(block);
                }
            }
            currentBlock.remove();
            checkForLines();
        }

        // Pause Game
        function pauseGame() {
            if (gameActive == true) {
                paused = true;
                pauseBlock = currentBlock;
                currentBlock = null;
                clearInterval(timer);

                // document.getElementsByClassName("pause-menu")[0].style.visibility=null;
                var menu = document.createElement('div');
                menu.setAttribute('class', 'pause-menu');
                document.getElementsByClassName('main')[0].appendChild(menu);

                var text = document.createElement('h1');
                text.setAttribute('class', 'pause-title');
                menu.appendChild(text);
                text.innerText = 'Paused';

                var unpauseButton = document.createElement('button');
                unpauseButton.setAttribute('id','play-button');
                unpauseButton.innerText = 'Unpause Game';
                unpauseButton.setAttribute('onclick', 'unPauseGame()');
                menu.appendChild(unpauseButton);

                var restartButton = document.createElement('button');
                restartButton.setAttribute('id','play-button');
                restartButton.innerText = 'Restart Game';
                restartButton.setAttribute('onclick', 'startGame()');
                menu.appendChild(restartButton);

                document.getElementById("next-block-div").style.backgroundColor="#777777";
                document.getElementById("game").style.backgroundColor="#777777";
                document.getElementById("instructions-div").style.backgroundColor="#777777";
            }
        }

        // Unpause Game
        function unPauseGame() {
            if (gameActive == true) {
                currentBlock = pauseBlock;
                pauseBlock = null;
                paused = false;
                timer = setInterval(move('autoDown'), 1000);

                // document.getElementsByClassName("pause-menu")[0].style.visibility="hidden";
                document.getElementsByClassName('pause-menu')[0].remove();

                document.getElementById("next-block-div").style.backgroundColor="#c7c7c7";
                document.getElementById("game").style.backgroundColor="#c7c7c7";
                document.getElementById("instructions-div").style.backgroundColor="#c7c7c7";
            }
        }

        // End of Game
        function gameOver() {
            clearInterval(timer);
            alert("game over");
            gameActive = false;
            currentBlock = null;
        }
    </script>
</body>
</html>
