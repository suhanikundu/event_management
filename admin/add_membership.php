<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['add']))
{
    $type = $_POST['type'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    $query = "INSERT INTO memberships (type, duration_months, price)
              VALUES ('$type','$duration','$price')";

    if(mysqli_query($conn,$query)){
        echo "<script>
        alert('Membership Added Successfully');
        window.location='maintenance.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Membership</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Membership</h2>

    <form method="POST">

        <label>Type</label>
        <input type="text" name="type" placeholder="6 Months / 1 Year / 2 Years" required>

        <label>Duration (months)</label>
        <input type="number" name="duration" required>

        <label>Price</label>
        <input type="number" name="price" required>

        <br><br>

        <button type="submit" name="add">Add Membership</button>
    </form>

    <br>
    <a href="maintenance.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>
