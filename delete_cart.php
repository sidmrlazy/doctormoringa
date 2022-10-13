<?php include('components/header.php') ?>
<?php
if (isset($_POST['empty'])) {
    $delete = "DELETE FROM `customer_cart` WHERE `cart_user_id` = '$token'";
    $delete_r = mysqli_query($connection, $delete);
}
?>
<?php include('components/footer.php') ?>