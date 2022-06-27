<?php
include 'includes/server/config.php';

if (isset($_POST['confirm'])) {
    $uod_order_id = $_POST['uod_order_id'];
    $update_order = "UPDATE `uder_order` SET `order_tracking_status`='2' WHERE `order_id` = $uod_order_id";
    $update_order_result = mysqli_query($connection, $update_order);

    if ($update_order_result) {
        echo "<div class='alert w-100 alert-success' role='alert'>ORDER CONFIRMED</div>";
    } else {
        echo die("<div class='alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
    }
}
if (isset($_POST['ship'])) {
    $uod_order_id = $_POST['uod_order_id'];
    $update_order = "UPDATE `uder_order` SET `order_tracking_status`='3' WHERE `order_id` = $uod_order_id";
    $update_order_result = mysqli_query($connection, $update_order);

    if ($update_order_result) {
        echo "<div class='alert w-100 alert-success' role='alert'>ORDER SHIPPED</div>";
    } else {
        echo die("<div class='alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
    }
}

// GET CART DETAILS QUERY
if (isset($_POST['submit'])) {
    // USER DETAILS
    $order_id = $_POST['order_id'];
    $order_user_name = $_POST['order_user_name'];
    $order_user_contact = $_POST['order_user_contact'];
    $new_order_time = $_POST['order_time'];
    $order_gross_amount = $_POST['order_gross_amount'];
    $order_total_amount = $_POST['order_total_amount'];
    $order_tax = $_POST['order_tax'];
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
                    <th scope="row"><?php echo "DRM" . $generated_order . $order_id; ?></th>
                    <?php
                        $transaction_query = "SELECT * FROM `transactions` where `razorpay_customer_order_id` = $order_id";
                        $transaction_result = mysqli_query($connection, $transaction_query);
                        while ($row = mysqli_fetch_assoc($transaction_result)) {
                            $razorpay_payment_id = $row['razorpay_payment_id'];
                            if ($razorpay_payment_id !== $razorpay_payment_id) { ?>
                    <td>Payment Unsuccessfull</>
                        <?php } else { ?>
                    <td><?php echo $razorpay_payment_id; ?></td>
                    <?php }
                        } ?>
                    <td><?php echo $order_user_name; ?></td>
                    <td><?php echo $order_user_contact; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ITEM ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">WEIGHT</th>
                    <th scope="col">QTY</th>
                    <th scope="col">PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // CART ITEMS ORDERED BY USER
                    $show_all_items_query = "SELECT * FROM `uder_order_details` WHERE `uod_order_id` = $order_id";
                    $new_result = mysqli_query($connection, $show_all_items_query);
                    while ($row = mysqli_fetch_assoc($new_result)) {
                        $uder_order_details = $row['uder_order_details'];
                        $uod_item_id = $row['uod_item_id'];
                        $uod_price = $row['uod_price'];
                        $uod_quantity = $row['uod_quantity'];
                        $uod_order_id = $row['uod_order_id'];

                        $get_item_details = "SELECT * FROM `items` WHERE item_id = $uod_item_id";
                        $get_item_details_result = mysqli_query($connection, $get_item_details);
                        while ($row = mysqli_fetch_assoc($get_item_details_result)) {
                            $item_id = $row['item_id'];
                            $item_name = $row['item_name'];
                            $item_weight = $row['item_weight'];
                            $item_price = $row['item_price'];
                            $item_image = "assets/images/products/" . $row['item_image'];
                            $item_category = $row['item_category'];
                    ?>
                <tr>
                    <td scope="row"><?php echo $item_id; ?></td>
                    <td class="admin-table-img"><img src="<?php echo $item_image; ?>" alt=""></td>
                    <td><?php echo $item_category; ?></td>
                    <td><?php echo $item_name; ?></td>
                    <td><?php echo $item_weight; ?></td>
                    <td><?php echo $uod_quantity; ?></td>
                    <td><?php echo $item_price; ?></td>
                </tr>
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
                                <td scope="row"><?php echo "₹" .  $order_tax; ?></td>
                                <td><?php echo "₹" .  $order_total_amount; ?></td>
                                <td class="font-weight-bold"><?php echo "₹" .  $order_gross_amount; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="" method="POST">
                        <input type="text" hidden name="uod_order_id" value="<?php echo  $uod_order_id ?>">
                        <?php
                                    $get_tracking_status = "SELECT * FROM `uder_order` WHERE order_id = $uod_order_id";
                                    $get_tracking_result = mysqli_query($connection, $get_tracking_status);
                                    while ($row = mysqli_fetch_assoc($get_tracking_result)) {
                                        $order_tracking_status = $row['order_tracking_status'];


                                    ?>
                        <?php
                                        if ($order_tracking_status == '1') { ?>
                        <button type="submit" name="confirm" value="confirm" class="confirm-button-md">Confirm
                            Order</button>
                        <?php } else if ($order_tracking_status == '2') { ?>

                        <button type="submit" name="ship" value="ship" class="confirm-button-md">SHIP
                            ORDER</button>
                        <?php
                                        }
                                    }
                                    ?>
                    </form>
                </div>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


</div>