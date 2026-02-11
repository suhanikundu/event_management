<?php
session_start();

if($_SESSION['role'] != 'vendor'){
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Item</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add New Item</h2>

    <br><br>

    <a href="product_status.php">
        <button>Product Status</button>
    </a>

    <a href="request_item.php">
        <button>Request Item</button>
    </a>

    <a href="view_product.php">
        <button>View Product</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
