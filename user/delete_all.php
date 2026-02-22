<?php
session_start();
include("../config.php");

$user_id = $_SESSION['user_id'];

mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

header("Location: cart.php");
exit();
?>
