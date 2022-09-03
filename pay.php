<?php
$customer_order_generated_id = '0';
include('admin/includes/server/config.php');
require('razorpay/src/Api.php');
require('razorpay/Razorpay.php');
session_start();
$token = session_id();
$_SESSION['session_id'] = $token;

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $token = $_SESSION['session_id'];
} else {
    $user_id = 0;
    $token;
}

use Razorpay\Api\Api;

if (!empty($_POST["submit"])) {
    $cart_id = $_POST['cart_id'];
    $customer_order_user_id = $_POST['cart_user_id'];
    $customer_order_user_name = $_POST['cart_user_name'];
    $customer_order_user_contact = $_POST['cart_user_contact'];
    $customer_order_user_email = $_POST['cart_user_email'];
    $customer_order_user_state = $_POST['cart_user_state'];
    $customer_order_user_city = $_POST['cart_user_city'];
    $customer_order_user_address = $_POST['cart_user_address'];
    $customer_order_user_pincode = $_POST['cart_user_pincode'];
    $customer_order_user_subtotal = $_POST['cart_user_subtotal'];
    $customer_order_user_delivery = $_POST['cart_user_delivery_fee'];
    $customer_order_user_grandtotal = $_POST['cart_user_grand_total'];
    $customer_order_generated_id = $_POST['cart_user_order_id'];
    $customer_order_payment_status = 0;
    $customer_order_tracking_status = 0;
    $customer_order_user_type = 2;

    $query = "INSERT INTO `customer_order`(
        `customer_order_user_name`,
        `customer_order_user_contact`,
        `customer_order_user_email`,
        `customer_order_user_state`,
        `customer_order_user_city`,
        `customer_order_user_address`,
        `customer_order_user_pincode`,
        `customer_order_user_subtotal`,
        `customer_order_user_delivery`,
        `customer_order_user_grandtotal`,
        `customer_order_generated_id`,
        `customer_order_payment_status`,
        `customer_order_tracking_status`
    )
    VALUES(
        '$customer_order_user_name',
        '$customer_order_user_contact',
        '$customer_order_user_email',
        '$customer_order_user_state',
        '$customer_order_user_city',
        '$customer_order_user_address',
        '$customer_order_user_pincode',
        '$customer_order_user_subtotal',
        '$customer_order_user_delivery',
        $customer_order_user_grandtotal,
        '$customer_order_generated_id',
        '$customer_order_payment_status',
        '$customer_order_tracking_status')";

    if (mysqli_query($connection, $query)) {
        $customer_order_generated_id  = $order_id = mysqli_insert_id($connection);
        $customer_order_user_id;

        $keyId = 'rzp_live_X36ox2orkcP17P';
        $keySecret = 'ubNUKggZVVYEEPvs9w5RMhj5';

        // $keyId = 'rzp_test_0WPfYvs2tlQaLU';
        // $keySecret = 'rrPjT8zzOFtK0gSVxNBjCFEE';

        $api = new Api($keyId, $keySecret);
        $orderData = [
            'receipt' => rand(1000, 9999) . 'ORD',
            'amount' => $customer_order_user_grandtotal * 100,
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
            "image" => "https://doctormoringa.in/assets/images/logo/logo.png",
            "prefill" => [
                "name" => $customer_order_user_name,
                "email" => $customer_order_user_email,
                "contact" => $customer_order_user_contact,
            ],
            "theme" => [
                "color" => "#44ad40"
            ],
            "order_id" => $razorpayOrderId,
        ];

        $json = json_encode($data);
    }
}
?>

<?php include('components/header_without_session.php') ?>
<?php include('components/navbar.php') ?>
<div class="container mt-5 d-flex justify-content-center align-items-center flex-column">
    <button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
</div>
<?php include('components/footer.php') ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="customer_order_generated_id" id="customer_order_generated_id"
        value="<?php echo $customer_order_generated_id; ?>">
    <input type="hidden" name="customer_order_user_id" id="customer_order_user_id" value="<?php echo $token; ?>">

    <!-- User Data -->

</form>
<script>
var options = <?php echo $json ?>;
options.handler = function(response) {
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
    document.razorpayform.submit();

    // console.log(response.razorpay_order_id);
    // console.log(response.razorpay_payment_id);
    // console.log(response.razorpay_signature);
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp.open();
    e.preventDefault();
}
</script>