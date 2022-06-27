<div class="container section-wrapper">
    <p class="section-heading">All Orders</p>
    <p class="section-details">View all orders below</p>
    <table class="mt-3 table table-striped">
        <thead>
            <tr>
                <th scope="col">ORDER ID</th>
                <th scope="col">CUSTOMER NAME</th>
                <th scope="col">CONTACT</th>
                <th scope="col">ORDER DATE</th>
                <th scope="col">ORDER VALUE</th>
                <th scope="col">PAYMENT STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
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
                $generated_order = str_replace(array(
                    '\'', '"', ',', ';', '<', '-', " "
                ), '', $new_order_time);
                $order_gross_amount = $row['order_gross_amount'];
                $order_total_amount = $row['order_total_amount'];
                $order_tax = $row['order_tax'];
                $order_status = $row['order_status'];
            ?>
            <tr>
                <th scope="row"><?php echo "DRM" . $generated_order . $order_id; ?></th>
                <td><?php echo $order_user_name; ?></td>
                <td><?php echo $order_user_contact; ?></td>
                <td><?php echo $new_order_time; ?></td>
                <td><?php echo "₹" . $order_gross_amount; ?></td>
                <td><?php
                        if ($order_status == "1") {
                            echo "<p class='status-paid'>Paid</p>";
                        } else {
                            echo "<p class='status-fail'>Failed</p>";
                        }
                        ?></td>

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
                    <td><button name="submit" type="submit" class="confirm-button-table">Details</button></td>
                </form>
            </tr>
        </tbody>
    </table>
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