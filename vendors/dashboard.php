<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'vendor'){
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Vendor Main Page</h2>

    <br><br>

    <a href="your_item.php">
        <button>Your Item</button>
    </a>

    <a href="add_item.php">
        <button>Add New Item</button>
    </a>

    <a href="transaction.php">
        <button>Transaction</button>
    </a>

    <br><br>

    <a href="../dashboard.php">
        <button>Back</button>
    </a>

    <a href="../logout.php">
        <button>Logout</button>
    </a>
</div>

</body>
</html>
