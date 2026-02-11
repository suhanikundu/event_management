<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Select Panel</h2>

    <br><br>

    <a href="admin/dashboard.php">
        <button>Admin</button>
    </a>

    <a href="user/dashboard.php">
        <button>User</button>
    </a>

    <a href="vendor/dashboard.php">
        <button>Vendor</button>
    </a>

    <br><br>

    <a href="logout.php">
        <button>Logout</button>
    </a>
</div>

</body>
</html>
