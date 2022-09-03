<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">
        <p>All Orders</p>

        <div class="table-responsive">
            <table class="mt-3 table table-bordered">
                <thead>
                    <tr>
                        <th class="table-heading" scope="col">ORDER ID</th>
                        <th class="table-heading" scope="col">CUSTOMER NAME</th>
                        <!-- <th class="table-heading" scope="col">CONTACT</th> -->
                        <th class="table-heading" scope="col">ORDER DATE</th>
                        <th class="table-heading" scope="col">ORDER VALUE</th>
                        <th class="table-heading" scope="col">PAYMENT STATUS</th>
                        <th class="table-heading" scope="col">ORDER STATUS</th>
                        <th class="table-heading" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'includes/server/config.php';
                    // PAGINATION
                    $limit = 10;
                    $get_orders_query = "SELECT * FROM customer_order";
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
                    $getQuery = "SELECT * FROM `customer_order` ORDER BY `customer_order_id` DESC LIMIT " . $initial_page . ',' . $limit;
                    $result = mysqli_query($connection, $getQuery);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $customer_order_id = $row['customer_order_id'];
                        $customer_order_generated_id = $row['customer_order_generated_id'];
                        $customer_order_user_name = $row['customer_order_user_name'];
                        $customer_order_user_contact = $row['customer_order_user_contact'];
                        $customer_order_date = $row['customer_order_date'];
                        if ($order_time_stamp = $customer_order_date) {
                            $new_order_time =  date("d-m-Y", strtotime($order_time_stamp));
                        }
                        $generated_order = str_replace(array(
                            '\'', '"', ',', ';', '<', '-', " "
                        ), '', $new_order_time);
                        $customer_order_user_subtotal = $row['customer_order_user_subtotal'];
                        $customer_order_user_grandtotal = $row['customer_order_user_grandtotal'];
                        $customer_order_user_delivery = $row['customer_order_user_delivery'];
                        $customer_order_payment_status = $row['customer_order_payment_status'];
                        $customer_order_tracking_status = $row['customer_order_tracking_status'];
                        $customer_order_user_address = $row['customer_order_user_address'];
                        $customer_order_user_pincode = $row['customer_order_user_pincode'];
                        $customer_order_user_state = $row['customer_order_user_state'];
                        $customer_order_user_city = $row['customer_order_user_city'];
                        // $order_tracking_status = $row['order_tracking_status'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo "DRM" . $generated_order . $customer_order_id; ?></th>
                        <td><?php echo $customer_order_user_name; ?></td>
                        <!-- <td><?php echo $customer_order_user_contact; ?></td> -->
                        <td><?php echo $new_order_time; ?></td>

                        <td><?php echo "₹" . $customer_order_user_grandtotal; ?></td>

                        <td><?php
                                if ($customer_order_payment_status == "1") {
                                    echo "<p class='payment-paid'>Paid</p>";
                                } else {
                                    echo "<p class='payment-fail'>Failed</p>";
                                }
                                ?></td>
                        <td><?php
                                if ($customer_order_tracking_status == "0") {
                                    echo "<p class='pending'>CONFIRMATION PENDING</p>";
                                } else if ($customer_order_tracking_status == "1") {
                                    echo "<p class='confirmed'>Confirmed</p>";
                                } else if ($customer_order_tracking_status == "2") {
                                    echo "<p class='shipped'>Order Packed</p>";
                                } else if ($customer_order_tracking_status == "3") {
                                    echo "<p class='shipped'>Order Shipped</p>";
                                }
                                ?></td>
                        <form action="cart-item-details.php" method="POST">

                            <!-- =========== HIDDEN DATA BEING SEMT TO PRODUCT DETAILS PAGE START =========== -->
                            <input hidden type="text" name="customer_order_id" value="<?php echo $customer_order_id; ?>"
                                placeholder="<?php echo $customer_order_id; ?>">

                            <input hidden type="text" name="customer_order_generated_id"
                                value="<?php echo $customer_order_generated_id; ?>"
                                placeholder="<?php echo $customer_order_generated_id; ?>">

                            <input hidden type="text" name="customer_order_user_name"
                                value="<?php echo $customer_order_user_name; ?>"
                                placeholder="<?php echo $customer_order_user_name; ?>">

                            <input hidden type="text" name="customer_order_user_contact"
                                value="<?php echo $customer_order_user_contact; ?>"
                                placeholder="<?php echo $customer_order_user_contact; ?>">

                            <input hidden type="text" name="customer_order_user_state"
                                value="<?php echo $customer_order_user_state; ?>"
                                placeholder="<?php echo $customer_order_user_state; ?>">

                            <input hidden type="text" name="customer_order_user_city"
                                value="<?php echo $customer_order_user_city; ?>"
                                placeholder="<?php echo $customer_order_user_city; ?>">

                            <input hidden type="text" name="customer_order_user_address"
                                value="<?php echo $customer_order_user_address; ?>"
                                placeholder="<?php echo $customer_order_user_address; ?>">

                            <input hidden type="text" name="customer_order_user_pincode"
                                value="<?php echo $customer_order_user_pincode; ?>"
                                placeholder="<?php echo $customer_order_user_pincode; ?>">

                            <input hidden type="text" name="customer_order_date" value="<?php echo $new_order_time; ?>"
                                placeholder="<?php echo $new_order_time; ?>">

                            <input hidden type="text" name="customer_order_user_subtotal"
                                value="<?php echo $customer_order_user_subtotal; ?>"
                                placeholder="<?php echo $customer_order_user_subtotal; ?>">

                            <input hidden type="text" name="customer_order_user_delivery"
                                value="<?php echo $customer_order_user_delivery; ?>"
                                placeholder="<?php echo $customer_order_user_delivery; ?>">

                            <input hidden type="text" name="customer_order_user_grandtotal"
                                value="<?php echo $customer_order_user_grandtotal; ?>"
                                placeholder="<?php echo $customer_order_user_grandtotal; ?>">
                            <!-- =========== HIDDEN DATA BEING SEMT TO PRODUCT DETAILS PAGE END =========== -->

                            <td><button name="submit" type="submit" class="confirm-button-table">Details</button></td>
                        </form>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>



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
</div>
<?php include('includes/footer.php') ?>