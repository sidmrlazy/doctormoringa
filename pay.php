<?php
$final_order_id = '0';
include('admin/includes/server/config.php');
require('razorpay/src/Api.php');
require('razorpay/Razorpay.php');
session_start();

use Razorpay\Api\Api;

if (!isset($_SESSION['user_contact'])) {
    // header("location: login.php");
    echo "<script type='text/javascript'>
    $(document).ready(function() {
    $('#loginModal').modal('show');
    });
    </script>";
    include('components/footer.php');
    exit;
}
if (!empty($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $order_user_name = $_POST['user_name'];
    $order_user_contact = $_POST['user_contact'];
    $order_user_state = $_POST['user_state'];
    $order_user_city = $_POST['user_city'];
    $order_user_address = $_POST['user_address'];
    $order_user_email = $_POST['user_email'];
    $all_total_price_post = $_POST['all_total_price'];
    $delivery_chearge = $_POST['delivery_chearge'];
    $gross_total = $_POST['gross_total'];
    $order_time = time();


    if ($order_user_city !== 'Lucknow' || $order_user_city !== 'Lucknow District') {
        $delivery_chearge == 100;
    } else if ($order_user_city == 'Lucknow' || $order_user_city == 'Lucknow District') {
        $delivery_chearge == 80;
    }
    // echo "USER CITY: " . $order_user_city;
    // echo "<br>";
    // echo "<br>";
    // echo "DELIVERY CHARGE: " . $delivery_chearge;
    // echo "<br>";
    // echo "<br>";
    // echo "Total: " . $gross_total;
    // echo "<br>";
    // echo "<br>";
    // echo "Gross: " . $all_total_price_post;


    $quantity = 1;
    $product_price = 0;
    $all_total_price = 0;

    $query = "INSERT INTO `uder_order` ( 
        `order_id`, 
        `order_user_id`, 
        `order_user_name`, 
        `order_user_contact`, 
        `order_user_state`, 
        `order_user_city`, 
        `order_user_address`, 
        `order_user_email`, 
        `order_time`, 
        `order_total_amount`, 
        `order_tax`,
        `order_gross_amount`, 
        `order_status`) 
    VALUES (
        '',
        '$user_id', 
        '$order_user_name', 
        '$order_user_contact', 
        '$order_user_state', 
        '$order_user_city', 
        '$order_user_address', 
        '$order_user_email', 
        '$order_time', 
        '$all_total_price_post', 
        '$delivery_chearge' , 
        '$gross_total', 
        '0');";

    if (mysqli_query($connection, $query)) {
        $final_order_id  = $order_id = mysqli_insert_id($connection);
        $query = "SELECT * FROM `items` i JOIN cart c ON i.item_id=c.cart_item_id  AND c.cart_user_id='$user_id'";
        $get_details = mysqli_query($connection, $query);
        if (@$get_details->num_rows > 0) {
            $previous_category = "";

            while ($row = mysqli_fetch_array($get_details)) {
                $item_category = $row['item_category'];
                $item_id = $row['item_id'];
                $item_price = $row['item_price'];
                $cart_qty = $row['cart_qty'];
                $cart_user_city = $row['cart_user_city'];

                // if ($cart_user_city == 'Lucknow' || $cart_user_city == 'Lucknow District') {

                // }

                $o_query = "INSERT INTO `uder_order_details` (
                    `uder_order_details`, 
                    `uod_order_id`, 
                    `uod_item_id`, 
                    `uod_item_cat`, 
                    `uod_price`, 
                    `uod_quantity`, 
                    `uod_status`) 
                VALUES (
                    '', 
                    '$order_id', 
                    '$item_id', 
                    '$item_category', 
                    '$item_price', 
                    '$cart_qty', 
                    '0');";
                $oq_details = mysqli_query($connection, $o_query);
            }
            $user_id = $_POST['user_id'];
            $user_name = $_POST['user_name'];
            $user_contact = $_POST['user_contact'];
            $user_email = $_POST['user_email'];
            $total_amount = $_POST['gross_total'];

            $keyId = 'rzp_live_X36ox2orkcP17P';
            $keySecret = 'ubNUKggZVVYEEPvs9w5RMhj5';

            $api = new Api($keyId, $keySecret);
            $orderData = [
                'receipt' => rand(1000, 9999) . 'ORD',
                'amount' => $total_amount * 100,
                'currency' => 'INR',
                'payment_capture' => 1
            ];
            $razorpayOrder = $api->order->create($orderData);
            $razorpayOrderId = $razorpayOrder['id'];
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            $displayAmount = $amount = $orderData['amount'];

            $data = [
                "key" => $keyId,
                "amount" => $amount,
                "name" => 'DOCTOR MORINGA',
                "description" => 'GOODNESS OF THE MIRACLE TREE',
                "image" => "assets/images/logo/logo.png",
                "prefill" => [
                    "name" => $user_name,
                    "email" => $user_email,
                    "contact" => $user_contact,
                ],
                "theme" => [
                    "color" => "#44ad40"
                ],
                "order_id" => $razorpayOrderId,
            ];

            $json = json_encode($data);
        } else {
            echo "Cart is empty";
        }
    }
    if (mysqli_query($connection, $query)) {
        $update_user_query = "UPDATE `user` SET `user_name`='$order_user_name',`user_email`='$order_user_email',`user_state`='$order_user_state',`user_city`='$order_user_city',`user_address`='$order_user_address',`user_type`= '2' WHERE `user_id` = '$user_id'";
        $update_result = mysqli_query($connection, $update_user_query);

        if (!$update_result) {
            die("USER DETAILS WERE NOT UPDATED!" . mysqli_error($connection));
        } else {
            echo "";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
?>

<?php include('components/header_without_session.php') ?>
<?php include('components/navbar.php') ?>
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
</div>
<?php include('components/footer.php') ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="customer_order_id" id="customer_order_id" value="<?php echo $final_order_id; ?>">
</form>
<script>
var options = <?php echo $json ?>;
options.handler = function(response) {
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
    document.razorpayform.submit();

    console.log(response.razorpay_order_id);
    // console.log(response.razorpay_payment_id);
    // console.log(response.razorpay_signature);
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp.open();
    e.preventDefault();
}
</script>