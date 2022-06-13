<div class="past-orders-section">
    <p class="past-orders-section-header mb-3">Past Orders</p>

    <?php
    include 'includes/server/config.php';
    // PAGINATION
    $limit = 10;
    $get_orders_query = "SELECT * FROM uder_order";
    $result = mysqli_query($connection, $get_orders_query);
    $total_rows = mysqli_num_rows($result);
    $total_pages = ceil($total_rows / $limit);
    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }
    $initial_page = ($page_number - 1) * $limit;

    // GET ORDER DETAILS
    $getQuery = "SELECT * FROM `uder_order` ORDER BY `order_id` DESC LIMIT " . $initial_page . ',' . $limit;
    $result = mysqli_query($connection, $getQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $order_id = $row['order_id'];
        $order_user_name = $row['order_user_name'];
        $order_user_contact = $row['order_user_contact'];
        $order_time = $row['order_time'];
        if ($order_time_stamp = $order_time) {
            $new_order_time =  gmdate("d-m-Y", $order_time_stamp);
        }
        $order_gross_amount = $row['order_gross_amount'];
        $order_total_amount = $row['order_total_amount'];
        $order_tax = $row['order_tax'];
        $order_status = $row['order_status'];
    ?>

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
                <p class="response"><?php echo "₹" . $order_gross_amount; ?></p>
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
            </div>
            <form action="cart-item-details.php" method="POST">
                <input hidden type="text" name="order_id" value="<?php echo $order_id; ?>"
                    placeholder="<?php echo $order_id; ?>">
                <input hidden type="text" name="order_user_name" value="<?php echo $order_user_name; ?>"
                    placeholder="<?php echo $order_user_name; ?>">
                <input hidden type="text" name="order_user_contact" value="<?php echo $order_user_contact; ?>"
                    placeholder="<?php echo $order_user_contact; ?>">
                <input hidden type="text" name="order_time" value="<?php echo $new_order_time; ?>"
                    placeholder="<?php echo $new_order_time; ?>">
                <input hidden type="text" name="order_gross_amount" value="<?php echo $order_gross_amount; ?>"
                    placeholder="<?php echo $order_gross_amount; ?>">
                <input hidden type="text" name="order_tax" value="<?php echo $order_tax; ?>"
                    placeholder="<?php echo $order_tax; ?>">
                <input hidden type="text" name="order_total_amount" value="<?php echo $order_total_amount; ?>"
                    placeholder="<?php echo $order_total_amount; ?>">
                <button name="submit" type="submit" class="details-btn">Details</button>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                echo '<li class="page-item"><a class="page-link" href="past-orders.php?page=' . $page_number . '">' . $page_number . ' </a></li>';
            }
            ?>
        </ul>
    </nav>

</div>