<?php
session_start();
include("../config.php");

$user_id = $_SESSION['user_id'];

// Calculate total
$cart_query = mysqli_query($conn,
    "SELECT cart.*, products.vendor_id
     FROM cart
     JOIN products ON cart.product_id = products.id
     WHERE cart.user_id='$user_id'"
);

$total_amount = 0;
while($item = mysqli_fetch_assoc($cart_query)) {
    $total_amount += $item['price'] * $item['quantity'];
}

// When Order Now clicked
if(isset($_POST['order_now'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $payment_method = $_POST['payment'];

    // Fetch cart again
    $cart_query = mysqli_query($conn,
        "SELECT cart.*, products.vendor_id
         FROM cart
         JOIN products ON cart.product_id = products.id
         WHERE cart.user_id='$user_id'"
    );

    while($cart = mysqli_fetch_assoc($cart_query)) {

        $product_id = $cart['product_id'];
        $vendor_id = $cart['vendor_id'];
        $total = $cart['price'] * $cart['quantity'];

        mysqli_query($conn, "INSERT INTO orders
            (user_id, vendor_id, product_id, name, email, address, city, state, pincode, payment_method, total_amount, status, created_at)
            VALUES
            ('$user_id', '$vendor_id', '$product_id', '$name', '$email', '$address', '$city', '$state', '$pincode', '$payment_method', '$total', 'Processing', NOW())
        ");
    }

    // Clear cart
    mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

    header("Location: success.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Checkout</h2>

<h3>Total Amount: ₹<?php echo $total_amount; ?></h3>

<form method="POST">

<input type="text" name="name" placeholder="Name" required><br><br>
<input type="text" name="number" placeholder="Phone Number" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="text" name="address" placeholder="Address" required><br><br>
<input type="text" name="city" placeholder="City" required><br><br>
<input type="text" name="state" placeholder="State" required><br><br>
<input type="text" name="pincode" placeholder="Pin Code" required><br><br>

<select name="payment" required>
    <option value="">Select Payment Method</option>
    <option value="Cash">Cash</option>
    <option value="UPI">UPI</option>
</select>

<br><br>

<button type="submit" name="order_now">Order Now</button>

</form>

</div>
</body>
</html>
