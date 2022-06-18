<div class="dashboard-tab">
    <?php
    include 'includes/server/config.php';
    $timezone = date_default_timezone_set('Asia/Kolkata');
    $current_date = date('Y/m/d');

    $new_order_query = "SELECT * FROM `uder_order` WHERE `payment_time` = $current_date";
    $new_order_result = mysqli_query($connection, $new_order_query);

    while ($row = mysqli_fetch_assoc($new_order_result)) {

        $payment_time = $row['payment_time'];
        if ($date = $payment_time) {
            echo "NEW ORDER RECEIVED";
        } else {
            echo "";
        }
    }
    ?>

    <!-- <a href='past-orders.php' id='red' class='tabs'>
        <p><?php echo "New Order Received" ?></p>
    </a> -->

    <?php


    ?>
    <?php
    include 'includes/server/config.php';
    $get_orders_query = "SELECT * FROM `uder_order`";
    $result = mysqli_query($connection, $get_orders_query);
    $count = mysqli_num_rows($result);
    ?>
    <a href="past-orders.php" id="green" class="tabs">
        <p>Total Orders Received</p>
        <h1><?php echo $count; ?></h1>
    </a>

    <?php
    include 'includes/server/config.php';
    $get_orders_query = "SELECT * FROM `user` WHERE user_type = 2";
    $result = mysqli_query($connection, $get_orders_query);
    $count = mysqli_num_rows($result);
    ?>
    <a href="view-users.php" id="blue" class="tabs">
        <p>Total Customers</p>
        <h1><?php echo $count; ?></h1>
    </a>
</div>