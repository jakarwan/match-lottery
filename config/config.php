<?php
// session_start();
// $servername = "localhost";
// $username = "lnwtatk_ezlotto";
// $password = "MZWwd0EB";
// $dbname = "lnwtatk_ezlotto";
date_default_timezone_set("Asia/Bangkok");
$servername = "localhost";
$username = "basz";
$password = "26153220.Bb";
$dbname = "lotto";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset('utf8');
header('Content-Type: text/html; charset=UTF-8');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

function CheckLogin(){
    if(!isset($_SESSION["status"])){
        header("location: login.php");
        exit;
    }
}
?>