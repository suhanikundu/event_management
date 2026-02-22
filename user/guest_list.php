<?php
session_start();
include("../config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
    "SELECT * FROM guest_list WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Guest List</h2>

    <a href="add_guest.php">
        <button>Add Guest</button>
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['guest_name']; ?></td>
            <td><?php echo $row['guest_email']; ?></td>
            <td><?php echo $row['guest_phone']; ?></td>
            <td>
                <a href="update_guest.php?id=<?php echo $row['id']; ?>">Update</a> |
                <a href="delete_guest.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="dashboard.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>
