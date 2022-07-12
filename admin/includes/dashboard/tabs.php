<div class="container section-wrapper dashboard-tab">
    <?php
    include 'includes/server/config.php';
    $get_orders_query = "SELECT SUM(order_gross_amount) FROM `uder_order`";
    $result = mysqli_query($connection, $get_orders_query);

    foreach ($result as $row) {
        $count = $row['SUM(order_gross_amount)']; ?>
    <a href="transactions.php" id="red" class="tabs">
        <p>Total Sale</p>
        <h1><?php echo "₹" . $count; ?></h1>
    </a>
    <?php
    } ?>
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

    <?php
    include 'includes/server/config.php';
    $get_orders_query = "SELECT * FROM `items`";
    $result = mysqli_query($connection, $get_orders_query);
    $count = mysqli_num_rows($result);
    ?>
    <a href="view-users.php" id="blue" class="tabs">
        <p>Total Products</p>
        <h1><?php echo $count; ?></h1>
    </a>

    <?php
    include 'includes/server/config.php';
    $get_orders_query = "SELECT * FROM `traffic`";
    $result = mysqli_query($connection, $get_orders_query);
    $count = mysqli_num_rows($result);
    ?>
    <a href="web-visitors.php" id="blue" class="tabs">
        <p>Website Visitors</p>
        <h1><?php echo $count; ?></h1>
    </a>
</div>