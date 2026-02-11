<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['add'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (name,email,password,role) 
              VALUES ('$name','$email','$password','$role')";

    mysqli_query($conn,$query);

    echo "<script>
    alert('User Added Successfully');
    window.location='maintain_user.php';
    </script>";
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add User</h2>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label><br>
        <input type="radio" name="role" value="user" required> User
        <input type="radio" name="role" value="vendor"> Vendor

        <br><br>

        <button type="submit" name="add">Add User</button>
    </form>

    <br>
    <a href="maintain_user.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>
