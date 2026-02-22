<?php
session_start();
include("../config.php");

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
    "SELECT orders.*, vendors.name AS vendor_name
     FROM orders
     JOIN vendors ON orders.vendor_id = vendors.id
     WHERE orders.user_id = '$user_id'
     ORDER BY orders.created_at DESC"
);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Order Status</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<a href="dashboard.php"><button>Home</button></a>
<a href="../logout.php" style="float:right;"><button>Logout</button></a>

<h2>User Order Status</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>

<?php } ?>

</table>

</div>
</body>
</html>
