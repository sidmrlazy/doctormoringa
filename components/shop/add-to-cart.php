<?php
include('../../admin/includes/server/config.php');
if (isset($_POST['submit'])) {

    $fetch_details_query = "SELECT * FROM user";
    $get_details = mysqli_query($connection, $fetch_details_query);

    while ($row = mysqli_fetch_assoc($get_details)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_contact = $row['user_contact'];
        $user_email = $row['user_email'];
        $user_state = $row['user_state'];
        $user_city = $row['user_city'];
        $user_address = $row['user_address'];
        $user_pincode = $row['user_pincode'];
    }

    $insert_array = array(
        $user_id,
        $user_name,
        $user_contact,
        $user_email,
        $user_state,
        $user_city,
        $user_address,
        $user_pincode,
        $item_name = $_POST['item_name'],
        $item_description = $_POST['item_description'],
        $item_price = $_POST['item_price'],
        $item_qty = $_POST['item_qty']
    );


    $query = 'INSERT INTO cart(
            `cart_user_id`,
            `cart_user_name`,
            `cart_user_contact`,
            `cart_user_email`,
            `cart_user_state`,
            `cart_user_city`,
            `cart_user_address`,
            `cart_user_pincode`,
            `cart_item_name`,
            `cart_item_description`,
            `cart_price`,
            `cart_qty`
        ) VALUES ("' . implode('", "', $insert_array) . '")';
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "ITEM Added in CART";
    } else {
        echo "NOPE";
    }
}