<div class="container section-wrapper">

    <p class="section-heading">Live Orders</p>
    <p class="section-details">View all live on-going orders below</p>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ORDER ID</th>
                <th scope="col">CUSTOMER NAME</th>
                <th scope="col">CUSTOMER CONTACT</th>
                <th scope="col">ORDER STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fetch_live_orders = "SELECT * FROM `uder_order` WHERE `order_tracking_status` = '2' OR `order_tracking_status` = '1'";
            $fetch_live_orders_result = mysqli_query($connection, $fetch_live_orders);

            while ($row = mysqli_fetch_assoc($fetch_live_orders_result)) {
                $order_id = $row['order_id'];
                $order_user_name = $row['order_user_name'];
                $order_user_contact = $row['order_user_contact'];
                $order_tracking_status = $row['order_tracking_status'];
            ?>
            <tr>
                <th scope="row"><?php echo $order_id ?></th>
                <td><?php echo $order_user_name ?></td>
                <td><?php echo $order_user_contact ?></td>
                <?php if ($order_tracking_status == '1') { ?>
                <td>
                    <p class="pending">Pending Confirmation</p>
                </td>
                <?php } else if ($order_tracking_status == '2') { ?>
                <td>
                    <p class="shipped">Order Confirmed & Being Packed</p>
                </td>
                <?php } else { ?>
                <td>
                    <p class="pending">Unable to get status</p>
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