<?php
session_start();
if($_SESSION['role'] != 'user'){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vendor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Available Vendors</h2>

    <p>Vendor listing will be shown here.</p>

    <br>
    <a href="dashboard.php"><button>Back</button></a>
</div>

</body>
</html>
