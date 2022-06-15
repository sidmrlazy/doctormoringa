<?php
include('admin/includes/server/config.php');
require('razorpay/Razorpay.php');
session_start();

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;
$error = "Payment Failed";
$keyId = "rzp_test_0WPfYvs2tlQaLU";
$keySecret = "rrPjT8zzOFtK0gSVxNBjCFEE";

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
    print_r($_POST);
    $razorpay_payment_id = mysqli_real_escape_string($connection, $_POST['razorpay_payment_id']);
    $razorpay_signature = mysqli_real_escape_string($connection, $_POST['razorpay_signature']);
    $razorpay_order_id = mysqli_real_escape_string($connection, $_POST['razorpay_order_id']);
    $customer_order_id = mysqli_real_escape_string($connection, $_POST['customer_order_id']);
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);

    $transaction_query = "INSERT INTO `transactions`(
        `transaction_user_id`, 
        `razorpay_payment_id`, 
        `razorpay_order_id`, 
        `razorpay_signature`, 
        `razorpay_customer_order_id`) VALUES (
            '$user_id',
            '$razorpay_payment_id',
            '$razorpay_order_id',
            '$razorpay_signature',
            '$customer_order_id'  
            )";
    $result = mysqli_query($connection, $transaction_query);

    if ($result) {
        $user_id = $_SESSION['user_id'];

        $clear_cart = "DELETE FROM `cart` WHERE `cart_user_id`='$user_id'";
        $cc_details = mysqli_query($connection, $clear_cart);
        if ($cc_details) {
            header('location:profile.php');
            echo "Payment Successfull";
        } else {
            die("PAYMENT FAILED!" . mysqli_error($connection));
        }
        header('Location:profile.php');
        echo "Payment Successfull";
    } else {
        echo "Payment Failed!";
        die("ERROR" . mysqli_error($connection));
    }
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}