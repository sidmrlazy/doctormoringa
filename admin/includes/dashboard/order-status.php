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
            $fetch_live_orders = "SELECT * FROM `customer_order` WHERE `customer_order_tracking_status` = '0'";
            $fetch_live_orders_result = mysqli_query($connection, $fetch_live_orders);

            while ($row = mysqli_fetch_assoc($fetch_live_orders_result)) {
                $customer_order_id = $row['customer_order_id'];
                $customer_order_user_name = $row['customer_order_user_name'];
                $customer_order_user_contact = $row['customer_order_user_contact'];
                $customer_order_tracking_status = $row['customer_order_tracking_status'];
            ?>
            <tr>
                <th scope="row"><?php echo $customer_order_id ?></th>
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