<div class="container section-wrapper">
    <p class="section-heading">View Transactions</p>
    <p class="section-details">View all customer transactions below</p>
    <table class="mt-3 table table-striped">
        <thead>
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">TRANSACTION TIMESTAMP</th>
                <th scope="col">ORDER ID</th>
                <th scope="col">PAYMENT ID</th>
                <th scope="col">ORDER VALUE</th>
                <th scope="col">CUSTOMER</th>
                <th scope="col">ORDER STATUS</th>
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
                $transaction_user_id = $row['transaction_user_id'];
                $razorpay_payment_id = $row['razorpay_payment_id'];
                $razorpay_customer_order_id = $row['razorpay_customer_order_id'];
                $payment_time = $row['payment_time'];

                // Users
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];

                $get_amount = "SELECT * FROM uder_order WHERE order_user_id = $user_id";
                $get_amount_result = mysqli_query($connection, $get_amount);

                while ($row = mysqli_fetch_assoc($get_amount_result)) {
                    $order_tracking_status = $row['order_tracking_status'];
                    $amount = $row['order_gross_amount']; ?>
            <tr>
                <th scope="row"><?php echo $transaction_id; ?></th>
                <td><?php echo $payment_time; ?></td>
                <td><?php echo "DRMXXXXXXXX" . $razorpay_customer_order_id; ?></td>
                <td><?php echo $razorpay_payment_id; ?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $user_name; ?></td>
                <?php
                        if ($order_tracking_status == "1") { ?>
                <td>
                    <p class="pending">PENDING CONFIRMATION</p>
                </td>
                <?php } else if ($order_tracking_status == "2") { ?>
                <td>
                    <p class="confirmed">CONFIRMED & BEING PACKED</p>
                </td>
                <?php } else if ($order_tracking_status == "3") { ?>
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