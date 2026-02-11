<?php
session_start();
if($_SESSION['role'] != 'vendor')
{
    header("Location: ../index.php");
    exit();
}
?>

<h2>Welcome Vendor <?php echo $_SESSION['name']; ?></h2>
<a href="../logout.php">Logout</a>
