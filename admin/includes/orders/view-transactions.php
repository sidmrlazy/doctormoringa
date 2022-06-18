<div class="container transactions">
    <p class="past-orders-section-header mb-3">View Transactions</p>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Transaction Date & Time</th>
                <th scope="col">Order ID</th>
                <th scope="col">Payment ID</th>
                <th scope="col">Customer Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('includes/server/config.php');
            $query = "SELECT * FROM `transactions` JOIN `user` WHERE transactions.transaction_user_id = user.user_id";
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

                if ($transaction_user_id = $user_id) {
                    $user_name = $user_name;
            ?>
            <tr>
                <th scope="row"><?php echo $transaction_id; ?></th>
                <td><?php echo $payment_time; ?></td>
                <td><?php echo "DRMXXXXXXXX" . $razorpay_customer_order_id; ?></td>
                <td><?php echo $razorpay_payment_id; ?></td>
                <td><?php echo $user_name; ?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>