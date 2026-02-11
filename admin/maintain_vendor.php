<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM vendors");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maintain Vendors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Maintain Vendors</h2>

    <br>

    <a href="add_vendor.php">
        <button>Add Vendor</button>
    </a>

    <a href="update_vendor.php">
        <button>Update Vendor</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Category</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td>
        <a href="delete_vendor.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
