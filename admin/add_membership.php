<?php
session_start();
include("../config.php");

if($_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['submit'])){
    $type = $_POST['type'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    mysqli_query($conn, "INSERT INTO memberships (type, duration_months, price)
    VALUES ('$type','$duration','$price')");

    echo "<script>alert('Membership Added Successfully');</script>";
}
?>

<form method="POST">
    Type: <input type="text" name="type" required><br><br>
    Duration (months): <input type="number" name="duration" required><br><br>
    Price: <input type="number" name="price" required><br><br>

    <button type="submit" name="submit">Add Membership</button>
</form>
