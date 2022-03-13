<?php
$username = "ecm1417";
$password = "WebDev2021";
$dbName = "tetris";

$conn = mysqli_connect("localhost", $username, $password, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<script type='text/javascript'>alert('Connection Successful');</script>";
?>
