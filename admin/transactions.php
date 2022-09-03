<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>


    <div class="container section-container ">
        <p>View Transactions</p>

        <div class="table-responsive">
            <table class="mt-3 table table-bordered">
                <thead>
                    <tr>
                        <th class="table-heading" scope="col">S.NO</th>
                        <th class="table-heading" scope="col">TRANSACTION TIMESTAMP</th>
                        <th class="table-heading" scope="col">PAYMENT ID</th>
                        <th class="table-heading" scope="col">ORDER VALUE</th>
                        <th class="table-heading" scope="col">CUSTOMER</th>
                        <th class="table-heading" scope="col">ORDER STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('includes/server/config.php');
                    $query = "SELECT * FROM `transactions`";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        // Transactions Table
                        $transaction_id = $row['transaction_id'];
                        $transaction_user_id = "DOCMOR" . $row['transaction_user_id'];
                        $razorpay_payment_id = $row['razorpay_payment_id'];
                        $razorpay_customer_order_id = $row['razorpay_customer_order_id'];
                        $payment_time = $row['payment_time'];

                        $get_amount = "SELECT * FROM customer_order WHERE customer_order_generated_id = '$transaction_user_id'";
                        $get_amount_result = mysqli_query($connection, $get_amount);

                        while ($row = mysqli_fetch_assoc($get_amount_result)) {
                            $customer_order_tracking_status = $row['customer_order_tracking_status'];
                            $customer_order_user_name = $row['customer_order_user_name'];
                            $customer_order_user_grandtotal = $row['customer_order_user_grandtotal'];

                    ?>
                    <tr>
                        <th scope="row"><?php echo $transaction_id; ?></th>
                        <td><?php echo $payment_time; ?></td>
                        <td><?php echo $razorpay_payment_id; ?></td>
                        <td><?php echo "₹" . $customer_order_user_grandtotal; ?></td>
                        <td><?php echo $customer_order_user_name; ?></td>
                        <?php
                                if ($customer_order_tracking_status == "0") { ?>
                        <td>
                            <p class="pending">PENDING CONFIRMATION</p>
                        </td>
                        <?php } else if ($customer_order_tracking_status == "1") { ?>
                        <td>
                            <p class="confirmed">CONFIRMED & BEING PACKED</p>
                        </td>
                        <?php } else if ($customer_order_tracking_status == "2") { ?>
                        <td>
                            <p class="shipped">ORDER SHIPPED</p>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>