<?php
session_start();

include '../config/config.php';
$sql = "UPDATE users SET online = 0 WHERE user_id = '".$_SESSION["userId"]."' " ;
$query = $conn->query($sql);
session_destroy();
header('refresh: 0.1;login');
?>