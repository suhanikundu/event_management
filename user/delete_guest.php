<?php
include("../config.php");

$id = $_GET['id'];

mysqli_query($conn,
    "DELETE FROM guest_list WHERE id='$id'");

header("Location: guest_list.php");
exit();
?>
