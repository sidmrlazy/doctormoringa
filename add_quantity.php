<?php

$item_qty = $_POST['item_qty']; 
$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$total_price =0;
 
include('admin/includes/server/config.php');

 
 $new_quantity = $item_qty+1;
 $sql = "UPDATE `cart` SET `cart_qty` = '$new_quantity' WHERE cart.cart_item_id = '$item_id' AND cart.cart_user_id='$user_id'";
 if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
    } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
    }


header("Location: shop");

?>
