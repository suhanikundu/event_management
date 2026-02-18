<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM memberships WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $type = $_POST['type'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    mysqli_query($conn, "UPDATE memberships 
                         SET type='$type', 
                             duration_months='$duration', 
                             price='$price'
                         WHERE id='$id'");

    echo "<script>
        alert('Membership Updated Successfully');
        window.location='update_membership.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Membership</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Membership</h2>

    <form method="POST">

        <label>Type</label>
        <input type="text" name="type" value="<?php echo $data['type']; ?>" required>

        <label>Duration (Months)</label>
        <input type="number" name="duration" value="<?php echo $data['duration_months']; ?>" required>

        <label>Price</label>
        <input type="number" name="price" value="<?php echo $data['price']; ?>" required>

        <br><br>
        <button type="submit" name="update">Update</button>
    </form>

    <br>
    <a href="update_membership.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
