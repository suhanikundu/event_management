<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM memberships WHERE id='$id'");

header("Location: update_membership.php");
exit();
?>
