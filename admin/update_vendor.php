<?php
include("../config.php");

$id = $_GET['id'];

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE id=$id");

    echo "<script>
    alert('Vendor Updated Successfully');
    window.location='maintain_vendor.php';
    </script>";
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<h2>Update Vendor</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <button type="submit" name="update">Update Vendor</button>
</form>

<br>
<a href="maintain_vendor.php">Back</a>
