
<?php

// print_r($_POST);
include('admin/includes/server/config.php');

if (!empty($_POST["user_id"])) {
 
$user_id = $_POST['user_id'];
$order_user_name = $_POST['user_name'];
$order_user_contact = $_POST['user_contact'];
$order_user_state = $_POST['user_state'];
$order_user_city = $_POST['user_city'];
$order_user_address = $_POST['user_address'];
$order_user_email = $_POST['user_email'];
$order_time = time();

 	$quantity =1;
    $product_price =0;
    $all_total_price =0;
    
   $query = "INSERT INTO `uder_order` ( `order_id`, `order_user_id`, `order_user_name`, `order_user_contact`, `order_user_state`, `order_user_city`, `order_user_address`, `order_user_email`, `order_time`, `order_status`) 
    VALUES ('','$user_id', '$order_user_name', '$order_user_contact', '$order_user_state', '$order_user_city', '$order_user_address', '$order_user_email', '$order_time' , '0');";
    // $get_details = mysqli_query($connection, $query);
    // echo $get_details;
    // echo $get_details;

    if (mysqli_query($connection, $query)) {
        $order_id = mysqli_insert_id($connection);
        $query = "SELECT * FROM `items` i JOIN cart c ON i.item_id=c.cart_item_id  AND c.cart_user_id='$user_id'";
        $get_details = mysqli_query($connection, $query);
        if (@$get_details->num_rows > 0) {
            $previous_category = "";
    
            while ($row = mysqli_fetch_array($get_details)) {
                $item_category = $row['item_category'];
                $item_id = $row['item_id'];
                $item_price = $row['item_price'];
                $cart_qty = $row['cart_qty'];
                
                $o_query = "INSERT INTO `uder_order_details` (`uder_order_details`, `uod_order_id`, `uod_item_id`, `uod_item_cat`, `uod_price`, `uod_status`) 
                VALUES ('', '$order_id', '$item_id', '$item_category ', '$item_price', '0');";
                $oq_details = mysqli_query($connection, $o_query);

                
            }
            $clear_cart = "DELETE FROM `cart` WHERE `cart_user_id`='$user_id'";
            $cc_details = mysqli_query($connection, $clear_cart);
            echo "we have recived your order details thank you for order with us!";
        }
        else{
            echo "Cart is empty";
        }    
        
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
      }
    }else{
        echo  "<center> <h1> No Post Data Found in cart, Go back and add product in cart </h1> </center>";

      
    }

?>