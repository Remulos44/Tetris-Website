<!DOCTYPE html>
<html>
<head>
    <title>Tetris - Leaderboard</title>

    <?php
        session_start();
        if( isset($_POST['score'])) {
            require "res/connect.php";
                $sql = "INSERT INTO Scores (Username, Score) VALUES ('";
                    $sql .= $_SESSION['username'];
                    $sql .= "', '";
                    $sql .= $_POST['score'];
                    $sql .= "');";
                if (mysqli_query($conn, $sql)) {
                    echo "New score added successfully";
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
            height: auto;
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
            margin-bottom: 76px;
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
        th {
            background-color: blue;
            color: white;
            text-shadow: 1px 1px 1px black;
            font-size: 24px;
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
                $sql = "SELECT Scores.Username, Score, Display ";
                    $sql .= "FROM Scores, Users ";
                    $sql .= "WHERE Scores.Username = Users.Username";
                $result = mysqli_query($conn, $sql);

                echo "<table>
                <tr>
                <th>Username</th>
                <th>Score</th>
                </tr>";

                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['Display'] == 1) {
                            $scoresArr[$i] = $row['Score'];
                            $usernameArr[$i] = $row['Username'];
                            $i++;
                        }
                    }
                    arsort($scoresArr);
                    $arrlength = count($scoresArr);
                    foreach ($scoresArr as $index => $scoreValue) {
                        echo "<tr>";
                        echo "<td>" . $usernameArr[$index] . "</td>";
                        echo "<td>" . $scoreValue . "</td>";
                        echo "</tr>";
                    }
                }

                echo "</table>";
                mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
