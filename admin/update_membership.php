<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM memberships");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Membership</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>All Membership Plans</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Duration (Months)</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['duration_months']; ?></td>
            <td>₹<?php echo $row['price']; ?></td>
            <td>
                <a href="edit_membership.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_membership.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="maintenance.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
