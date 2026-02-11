<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maintenance Menu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Maintenance Menu (Admin Only)</h2>

    <br><br>

    <a href="maintain_user.php">
        <button>User Management</button>
    </a>

    <a href="maintain_vendor.php">
        <button>Vendor Management</button>
    </a>

    <a href="add_membership.php">
        <button>Add Membership</button>
    </a>

    <a href="update_membership.php">
        <button>Update Membership</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
