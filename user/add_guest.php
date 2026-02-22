<?php
session_start();
include("../config.php");

if(isset($_POST['add'])){

    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO guest_list (user_id,guest_name,guest_email,guest_phone)
              VALUES ('$user_id','$name','$email','$phone')";

    mysqli_query($conn,$query);

    echo "<script>
    alert('Guest Added Successfully');
    window.location='guest_list.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Guest</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Guest</h2>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email">

        <label>Phone</label>
        <input type="text" name="phone">

        <br><br>

        <button type="submit" name="add">Add Guest</button>
    </form>

    <br>
    <a href="guest_list.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>
