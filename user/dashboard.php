<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Welcome <?php echo $_SESSION['name']; ?></h2>

    <br><br>

    <a href="vendor.php">
        <button>Vendor</button>
    </a>

    <a href="cart.php">
        <button>Cart</button>
    </a>

    <a href="guest_list.php">
        <button>Guest List</button>
    </a>

    <a href="order_status.php">
        <button>Order Status</button>
    </a>

    <br><br>

    <a href="../logout.php">
        <button>Logout</button>
    </a>
</div>

</body>
</html>
