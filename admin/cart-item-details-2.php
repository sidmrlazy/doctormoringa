<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php //include('includes/side-nav.php') 
?>
<?php
include 'includes/server/config.php';

// if (isset($_POST['confirm'])) {
//     $customer_order_id = $_POST['customer_order_id'];
//     $update_order = "UPDATE `customer_order` SET `customer_order_tracking_status`='2' WHERE `customer_order_id` = $customer_order_id";
//     $update_order_result = mysqli_query($connection, $update_order);

//     if ($update_order_result) {
//         echo "<div class='container alert w-100 alert-success' role='alert'>ORDER CONFIRMED</div>";
//     } else {
//         echo die("<div class='container  alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
//     }
// }

// if (isset($_POST['ship'])) {
//     $customer_order_id = $_POST['customer_order_id'];
//     $update_order = "UPDATE `customer_order` SET `customer_order_tracking_status`='3' WHERE `customer_order_id` = $customer_order_id";
//     $update_order_result = mysqli_query($connection, $update_order);

//     if ($update_order_result) {
//         echo "<div class='container alert w-100 alert-success' role='alert'>ORDER SHIPPED</div>";
//     } else {
//         echo die("<div class='container alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
//     }
// }

// GET CART DETAILS QUERY
if (isset($_POST['submit'])) {
    // USER DETAILS
    $customer_order_id = $_POST['customer_order_id'];
    $customer_order_user_name = $_POST['customer_order_user_name'];
    $customer_order_user_contact = $_POST['customer_order_user_contact'];
    $new_order_time = $_POST['customer_order_date'];
    $customer_order_user_subtotal = $_POST['customer_order_user_subtotal'];
    $customer_order_user_grandtotal = $_POST['customer_order_user_grandtotal'];
    $customer_order_user_delivery = $_POST['customer_order_user_delivery'];
    $generated_order = str_replace(array(
        '\'', '"', ',', ';', '<', '-', " "
    ), '', $new_order_time);



?>
<div class="container section-wrapper">
    <p class="section-heading">Order Details</p>
    <p class="section-details">View complete order details below</p>

    <div class="table-responsive mt-3 w-100">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th scope="col">ORDER ID</th>
                    <th scope="col">PAYMENT ID</th>
                    <th scope="col">CUSTOMER NAME</th>
                    <th scope="col">CONTACT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo "DRM" . $generated_order  ?></th>
                    <?php
                        $transaction_query = "SELECT * FROM `transactions` where `transaction_user_id` = '$customer_order_id'";
                        $transaction_result = mysqli_query($connection, $transaction_query);
                        while ($row = mysqli_fetch_assoc($transaction_result)) {
                            $razorpay_payment_id = $row['razorpay_payment_id'];
                            if ($razorpay_payment_id !== $razorpay_payment_id) { ?>

                    <td>Payment Unsuccessfull</>
                        <?php } else { ?>
                    <td><?php echo $razorpay_payment_id; ?></td>
                    <?php }
                        } ?>
                    <td><?php echo $customer_order_user_name; ?></td>
                    <td><?php echo $customer_order_user_contact; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ITEM ID</th>
                    <!-- <th scope="col">IMAGE</th> -->
                    <th scope="col">CATEGORY</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">WEIGHT</th>
                    <th scope="col">QTY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">TOTAL PRICE</th>
                </tr>
            </thead>


            <tbody>
                <?php
                    // CART ITEMS ORDERED BY USER
                    $show_all_items_query = "SELECT * FROM `customer_cart` WHERE `cart_user_order_id` = $customer_order_id";
                    $new_result = mysqli_query($connection, $show_all_items_query);
                    while ($row = mysqli_fetch_assoc($new_result)) {
                        $cart_user_item_id = $row['cart_user_item_id'];

                        $data_query = "SELECT * FROM `items` WHERE item_id = $cart_user_item_id";
                        $data_res = mysqli_query($connection, $data_query);

                        while ($row = mysqli_fetch_assoc($data_res)) {
                            $item_id = $row['item_id']; ?>
                <tr>
                    <td></td>
                </tr>
                <?php }
                    } ?>

                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">DELIVERY CHARGES</th>
                                <th scope="col">GROSS AMOUNT</th>
                                <th scope="col">GRAND TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo "₹" .  $customer_order_user_delivery; ?></td>
                                <td><?php echo "₹" .  $customer_order_user_subtotal; ?></td>
                                <td class="font-weight-bold"><?php echo "₹" .  $customer_order_user_grandtotal; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="" method="POST">
                        <input type="text" hidden name="customer_order_id" value="<?php echo  $customer_order_id ?>">
                        <?php
                            $get_tracking_status = "SELECT * FROM `uder_order` WHERE order_id = $customer_order_id";
                            $get_tracking_result = mysqli_query($connection, $get_tracking_status);
                            while ($row = mysqli_fetch_assoc($get_tracking_result)) {
                                $order_tracking_status = $row['order_tracking_status'];


                            ?>
                        <?php
                                if ($order_tracking_status == '1') { ?>
                        <button type="submit" name="confirm" value="confirm" class="confirm-button-md">Confirm
                            Order</button>
                        <?php } elseif ($order_tracking_status == '2') { ?>

                        <button type="submit" name="ship" value="ship" class="confirm-button-md">SHIP
                            ORDER</button>
                        <?php
                                }

                                ?>
                    </form>
                </div>

            </tbody>
            <?php
                            }
                        }

        ?>
        </table>
    </div>


</div>
<?php include('includes/footer.php') ?>