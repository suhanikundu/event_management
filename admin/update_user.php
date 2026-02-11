<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    header("Location: update_user.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Users</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>All Users</h2>

    <table border="1" width="100%" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn,"SELECT * FROM users");

        while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <a href="update_user.php?delete=<?php echo $row['id']; ?>">
                    Delete
                </a>
            </td>
        </tr>

        <?php } ?>
    </table>

    <br>
    <a href="maintain_user.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>
