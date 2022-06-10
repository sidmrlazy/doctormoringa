<div class="past-orders-section">
    <p class="past-orders-section-header mb-3">Past Orders</p>

    <?php
    include 'includes/server/config.php';

    $get_orders_query = "SELECT * FROM uder_order ORDER BY `order_id` DESC";
    $result = mysqli_query($connection, $get_orders_query);

    while ($row = mysqli_fetch_assoc($result)) {
        $order_id = $row['order_id'];
        $order_user_name = $row['order_user_name'];
        $order_user_contact = $row['order_user_contact'];
        $order_time = $row['order_time'];

        if ($order_time_stamp = $order_time) {
            $new_order_time =  gmdate("d-m-Y", $order_time_stamp);
        }
        $order_total_amount = $row['order_total_amount'];
        $order_status = $row['order_status']; ?>

    <div class="past-order-card">
        <div class="col-md-4">
            <p class="customer-name"><?php echo $order_user_name; ?></p>
            <p>
                <?php echo $order_user_contact; ?>
            </p>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <p class="label">Order ID</p>
                <p class="response"><?php echo $order_id; ?></p>
            </div>

            <div>
                <p class="label">Order Date</p>
                <p class="response"><?php echo $new_order_time; ?></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <p class="label">Total Order Value</p>
                <p class="response"><?php echo "₹" . $order_total_amount; ?></p>
            </div>

            <div>
                <p class="label">Payment Status</p>
                <?php
                    if ($order_status == "0") {
                        echo "<p class='status-paid'>Paid</p>";
                    } else {
                        echo "<p class='status-fail'>Failed</p>";
                    }
                    ?>

                <!-- <p class="status-fail">Failed</p> -->
            </div>
        </div>
    </div>
    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->

    <?php
    }
    ?>


</div>