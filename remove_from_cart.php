
<?php

// $item_qty = $_POST['item_qty']; 
$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$clear = $_POST['clear'];
 
include('admin/includes/server/config.php');
if ($clear == '0') {
    $sql = "DELETE FROM `cart` WHERE cart.cart_item_id = '$item_id' AND cart.cart_user_id='$user_id'";
}elseif ($clear == '1'){
    $sql = "DELETE FROM `cart` WHERE cart.cart_user_id='$user_id'";
}
 if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
    } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
    }

if ($clear == '0') {
    header("Location: shop");
}elseif ($clear == '1'){
    header("Location: cart");

}

?>
