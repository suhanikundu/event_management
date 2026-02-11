<?php
session_start();
include("config.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, 
        "SELECT * FROM users WHERE email='$email' AND password='$password'"
    );

    $row = mysqli_fetch_assoc($query);

if($row)
{
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role']    = $row['role'];
    $_SESSION['name']    = $row['name'];

    if($row['role'] == 'admin')
    {
        header("Location: admin/maintenance.php");
    }
    elseif($row['role'] == 'vendor')
    {
        header("Location: vendor/dashboard.php");
    }
    elseif($row['role'] == 'user')
    {
        header("Location: user/dashboard.php");
    }

    exit();
}

    else
    {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>


<!DOCTYPE html> 
<html> <head> 
    <title>Admin Login</title> 
    <link rel="stylesheet" href="css/style.css"> 
</head> <body> <div class="container"> 
    <h2>Event Management System</h2> 
    <form method="POST"> 
        <label>User Id</label> 
        <input type="text" name="email" required> 
        <label>Password</label> 
        <input type="password" name="password" required>
         <div class="btn-group"> <button type="reset">Cancel</button> <button type="submit" name="login">Login</button> </div> </form> </div> </body> </html>