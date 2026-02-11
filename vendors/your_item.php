<?php
session_start();

if($_SESSION['role'] != 'vendor'){
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Items</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Your Items</h2>

    <br><br>

    <a href="insert_item.php">
        <button>Insert</button>
    </a>

    <a href="delete_item.php">
        <button>Delete</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
