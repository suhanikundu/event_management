<?php
session_start();
if($_SESSION['role'] != 'user'){
    header("Location: ../dashboard.php");
    exit();
}

?>

<h2>Welcome User <?php echo $_SESSION['name']; ?></h2>
<a href="../logout.php">Logout</a>
