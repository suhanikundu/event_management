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
    <title>Update Vendors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>All Vendors</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <a href="edit_vendor.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_vendor.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>

        <?php } ?>

    </table>

    <br>
    <a href="maintain_vendor.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>
