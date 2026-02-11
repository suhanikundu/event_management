<?php
session_start();
include("../config.php");

if($_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$vendors = mysqli_query($conn, "SELECT * FROM vendors");
$memberships = mysqli_query($conn, "SELECT * FROM memberships");

if(isset($_POST['submit'])){
    $vendor_id = $_POST['vendor_id'];
    $membership_id = $_POST['membership_id'];

    $membership = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT duration_months FROM memberships WHERE id=$membership_id")
    );

    $start = date('Y-m-d');
    $end = date('Y-m-d', strtotime("+".$membership['duration_months']." months"));

    mysqli_query($conn, "UPDATE vendors 
        SET membership_id='$membership_id',
            membership_start='$start',
            membership_end='$end'
        WHERE id='$vendor_id'
    ");

    echo "<script>alert('Membership Assigned Successfully');</script>";
}
?>

<form method="POST">

<select name="vendor_id" required>
    <option value="">Select Vendor</option>
    <?php while($v = mysqli_fetch_assoc($vendors)) { ?>
        <option value="<?php echo $v['id']; ?>">
            <?php echo $v['name']; ?>
        </option>
    <?php } ?>
</select>

<br><br>

<?php 
mysqli_data_seek($memberships, 0);
while($m = mysqli_fetch_assoc($memberships)) { 
?>

<input type="radio" name="membership_id"
value="<?php echo $m['id']; ?>"
<?php if($m['duration_months'] == 6) echo "checked"; ?>
required>

<?php echo $m['type']; ?>
<br>

<?php } ?>

<br>
<button type="submit" name="submit">Assign</button>

</form>
