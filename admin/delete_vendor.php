<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM vendors WHERE id=$id");

    header("Location: maintain_vendor.php");
    exit();
}
?>
