<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>

    <div class="container section-container">
        <p>Dashboard</p>
        <div class="tab-grid">
            <?php
            include 'includes/server/config.php';
            $get_orders_query = "SELECT SUM(customer_order_user_grandtotal) FROM `customer_order`";
            $result = mysqli_query($connection, $get_orders_query);

            foreach ($result as $row) {
                $count = $row['SUM(customer_order_user_grandtotal)']; ?>
            <div class="dashboard-tab">
                <p class="dashboard-tab-label">Total Sale
                </p>
                <p class="dashboard-tab-res"><?php echo "₹" . $count; ?></p>
            </div>
            <?php
            } ?>


            <?php
            include 'includes/server/config.php';
            $get_orders_query = "SELECT * FROM `customer_order`";
            $result = mysqli_query($connection, $get_orders_query);
            $count = mysqli_num_rows($result);
            ?>
            <div class="dashboard-tab">
                <p class="dashboard-tab-label">Total Orders Received</p>
                <p class="dashboard-tab-res"><?php echo $count; ?></p>
            </div>

            <?php
            include 'includes/server/config.php';
            $get_orders_query = "SELECT * FROM `customer_order` GROUP BY customer_order_user_contact";
            $result = mysqli_query($connection, $get_orders_query);
            $count = mysqli_num_rows($result);
            ?>
            <div class="dashboard-tab">
                <p class="dashboard-tab-label">Total Customers</p>
                <p class="dashboard-tab-res"><?php echo $count; ?></p>
            </div>

            <?php
            include 'includes/server/config.php';
            $get_orders_query = "SELECT * FROM `items`";
            $result = mysqli_query($connection, $get_orders_query);
            $count = mysqli_num_rows($result);

            $get_live_items = "SELECT * FROM `items` WHERE item_status = 1";
            $get_live_items_r = mysqli_query($connection, $get_live_items);
            $count_live = mysqli_num_rows($get_live_items_r);
            ?>
            <div class="dashboard-tab">
                <p class="dashboard-tab-label">Live Products/ Total Products</p>
                <p class="dashboard-tab-res"><?php echo $count_live . "/" . $count; ?></p>
            </div>

            <?php
            include 'includes/server/config.php';
            $get_orders_query = "SELECT * FROM `traffic`";
            $result = mysqli_query($connection, $get_orders_query);
            $count = mysqli_num_rows($result);
            ?>
            <div class="dashboard-tab">
                <p class="dashboard-tab-label">Website Visitors</p>
                <p class="dashboard-tab-res"><?php echo $count; ?></p>
            </div>
        </div>


        <p class="mt-3">Live Orders</p>
        <div class="table-responsive m-1 card p-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-heading" scope="col">ORDER ID</th>
                        <th class="table-heading" scope="col">CUSTOMER NAME</th>
                        <th class="table-heading" scope="col">CUSTOMER CONTACT</th>
                        <th class="table-heading" scope="col">ORDER STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetch_live_orders = "SELECT * FROM `customer_order` WHERE `customer_order_tracking_status` = '0'";
                    $fetch_live_orders_result = mysqli_query($connection, $fetch_live_orders);

                    while ($row = mysqli_fetch_assoc($fetch_live_orders_result)) {
                        $customer_order_id = $row['customer_order_id'];
                        $customer_order_user_name = $row['customer_order_user_name'];
                        $customer_order_user_contact = $row['customer_order_user_contact'];
                        $customer_order_tracking_status = $row['customer_order_tracking_status'];
                    ?>
                    <tr>
                        <td><?php echo $customer_order_id ?></td>
                        <td><?php echo $customer_order_user_name ?></td>
                        <td><?php echo $customer_order_user_contact ?></td>
                        <?php if ($customer_order_tracking_status == '0') { ?>
                        <td>
                            <p class="pending">Pending Confirmation</p>
                        </td>
                        <?php } else if ($customer_order_tracking_status == '1') { ?>
                        <td>
                            <p class="pending">Order Confirmed</p>
                        </td>
                        <?php } else if ($customer_order_tracking_status == '2') { ?>
                        <td>
                            <p class="pending">Order Packed</p>
                        </td>
                        <?php } else if ($customer_order_tracking_status == '3') { ?>
                        <td>
                            <p class="shipped">Order Packed</p>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php
                    }
                    if (!$fetch_live_orders_result) {
                        echo "<p class='w-100 section-details'>View all on-going orders below</p>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>