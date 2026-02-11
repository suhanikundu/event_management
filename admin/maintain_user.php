<?php
session_start();
include("../config.php");
$result = mysqli_query($conn, "SELECT * FROM users WHERE role != 'admin'");


if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maintain Users</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Maintain Users</h2>

    <br>

    <a href="add_user.php">
        <button>Add User</button>
    </a>

    <a href="update_user.php">
        <button>Update User</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td>
            <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>

<?php } ?>

</table>

</div>

</body>
</html>
