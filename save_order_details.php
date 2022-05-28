
<?php

// print_r($_POST);
include('admin/includes/server/config.php');

$user_id = $_POST['user_id'];
echo "User name ".$order_user_name = $_POST['user_name'];
$order_user_contact = $_POST['user_contact'];
$order_user_state = $_POST['user_state'];
$order_user_city = $_POST['user_city'];
$order_user_address = $_POST['user_address'];
$order_user_email = $_POST['user_email'];
$order_time = time();

 	$quantity =1;
    $product_price =0;
    $all_total_price =0;
    
    $query = "INSERT INTO `uder_order` ( `order_user_id`, `order_user_name`, `order_user_contact`, `order_user_state`, `order_user_city`, `order_user_address`, `order_user_email`, `order_time`, `order_status`) VALUES ($user_id, $order_user_name, $order_user_contact, $order_user_state, $order_user_city, $order_user_address, $order_user_email, $order_time , '0');";
    $get_details = mysqli_query($connection, $query);

?>