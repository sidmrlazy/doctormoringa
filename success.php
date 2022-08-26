<?php
include('admin/includes/server/config.php');
include('toasts.php');
require('razorpay/Razorpay.php');
session_start();

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;
$error = "Payment Failed";
$keyId = "rzp_live_X36ox2orkcP17P";
$keySecret = "ubNUKggZVVYEEPvs9w5RMhj5";
// $keyId = 'rzp_test_0WPfYvs2tlQaLU';
// $keySecret = 'rrPjT8zzOFtK0gSVxNBjCFEE';

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    // print_r($_POST);
    $razorpay_payment_id = mysqli_real_escape_string($connection, $_POST['razorpay_payment_id']);
    $razorpay_signature = mysqli_real_escape_string($connection, $_POST['razorpay_signature']);
    $razorpay_order_id = mysqli_real_escape_string($connection, $_POST['razorpay_order_id']);
    $customer_order_id = mysqli_real_escape_string($connection, $_POST['customer_order_generated_id']);
    $customer_user_id = mysqli_real_escape_string($connection, $_POST['customer_order_user_id']);

    $transaction_query = "INSERT INTO `transactions`(
        `transaction_user_id`, 
        `razorpay_payment_id`, 
        `razorpay_order_id`, 
        `razorpay_signature`, 
        `razorpay_customer_order_id`) VALUES (
            '$customer_user_id',
            '$razorpay_payment_id',
            '$razorpay_order_id',
            '$razorpay_signature',
            '$customer_order_id'  
            )";
    $result = mysqli_query($connection, $transaction_query);

    if ($result) {
        $get_order_query = "SELECT * FROM `customer_order` WHERE customer_order_id = $customer_order_id";
        $get_order_result = mysqli_query($connection, $get_order_query);

        $customer_order_id = "";
        while ($row = mysqli_fetch_assoc($get_order_result)) {
            $customer_order_id = $row['customer_order_id'];
        }

        if ($get_order_result) {
            $update_order_query = "UPDATE `customer_order` SET `customer_order_payment_status`='1', `customer_order_tracking_status`='0' WHERE customer_order_id = $customer_order_id";
            $update_order_result = mysqli_query($connection, $update_order_query);

            if ($update_order_result) {
                $clear_cart_query = "UPDATE `customer_cart` SET `cart_status`= 2, `cart_order_id` = '$customer_order_id'  WHERE `cart_user_id`='$customer_user_id' AND cart_status = 1";
                $clear_cart_result = mysqli_query($connection, $clear_cart_query);
                if ($clear_cart_result) {
                    echo "<script>cartSuccess();</script>";
                    header('location:payment-success.php');
                }
            }
        } else {
            $update_order_query = "UPDATE `customer_cart` SET `customer_order_payment_status`='0', `customer_order_tracking_status`='0' WHERE customer_order_generated_id = $customer_order_id";
            $update_order_result = mysqli_query($connection, $update_order_query);
            if (!$update_order_result) {
                die("PAYMENT FAILED!" . mysqli_error($connection));
            }
        }
    } else {
        echo die('Not result ' . mysqli_error($connection));
    }
} else {
    die(mysqli_error($connection));
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}