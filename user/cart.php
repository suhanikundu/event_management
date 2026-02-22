<?php
session_start();
include("../config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
    "SELECT * FROM cart WHERE user_id='$user_id'"
);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}

$total = 0;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Shopping Cart</h2>

    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { 
    $item_total = $row['price'] * $row['quantity'];
    $total += $item_total;
?>
<tr>
    <td><?php echo $row['product_name']; ?></td>
    <td>₹<?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>₹<?php echo $item_total; ?></td>
</tr>
<?php } ?>


        <tr>
            <td colspan="3"><strong>Grand Total</strong></td>
            <td><strong>₹<?php echo $total; ?></strong></td>
        </tr>

    </table>

    <br><br>

    <!-- Checkout Button -->
    <?php if($total > 0) { ?>
        <a href="checkout.php">
            <button>Proceed to Checkout</button>
        </a>
    <?php } ?>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
