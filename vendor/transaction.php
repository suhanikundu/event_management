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
    <title>Transaction</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Transaction</h2>

    <br><br>

    <a href="user_request.php">
        <button>User Request</button>
    </a>

    <br><br>

    <a href="dashboard.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
