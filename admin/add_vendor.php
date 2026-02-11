<?php
session_start();
include("../config.php");

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users (name,email,password,role)
    VALUES ('$name','$email','$password','vendor')");

    echo "<script>
    alert('Vendor Added Successfully');
    window.location='maintain_vendor.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vendor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Vendor</h2>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label><br>
        <input type="radio" name="role" value="user"> User
        <input type="radio" name="role" value="vendor" required> Vendor

        <br><br>

        <button type="submit" name="add">Add Vendor</button>
    </form>

    <br>
    <a href="maintain_vendor.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>

