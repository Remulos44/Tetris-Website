<?php
session_start();
require "connect.php";
if (!isset($_POST['log-uname']) && !isset($_POST['log-pword'])) {
    exit("Please fill in both the Username and Password");
}
$sql = "SELECT Password FROM Users WHERE Username='".$_POST['log-uname']."' LIMIT 1;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['Password'] === $_POST['log-pword']) {
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['log-uname'];
        echo "<script type='text/javascript'>alert('Login successful');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Password incorrect');</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Username doesn't exist');</script>";
}
mysqli_close($conn);
header('Location: ../index.php');
?>
