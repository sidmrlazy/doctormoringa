<div class="dashboard-tab">


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