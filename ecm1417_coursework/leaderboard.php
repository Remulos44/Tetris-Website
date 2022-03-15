<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Leaderboard</title>
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
            height: 500px;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: 95% auto;
            overflow: auto;
        }
        div.table {
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
        table, th, td {
            border: 1px solid black;
            border-spacing: 2px;
        }
        table {
            width: 100%;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <ul>
        <li name="home" style="float:left"><a href="/ecm1417_coursework/index.php">Home</a></li>
        <li name="tetris" style="float:right"><a href="/ecm1417_coursework/tetris.php">Play Tetris</a></li>
        <li name="leaderboard" style="float:right"><a class="active" href="/ecm1417_coursework/leaderboard.php">Leaderboard</a></li>
    </ul>
    <div class="main">
        <div class="table">
            <?php
                require "res/connect.php";
                $sql = "SELECT Scores.Username, Score, Display FROM Scores, Users WHERE Scores.Username = Users.Username";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                <tr>
                <th>Username</th>
                <th>Score</th>
                </tr>";

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['Display'] == 1) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Score'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }

                echo "</table>";
                mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
