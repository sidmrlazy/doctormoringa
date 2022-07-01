<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>

<div class="container mt-5 mb-5">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="profile-section-buttons accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                    aria-controls="flush-collapseOne">
                    <ion-icon name="person-outline"></ion-icon>
                    <p>Profile</p>
                </button>
            </h2>
            <?php
            include('admin/includes/server/config.php');

            if (!empty($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                $user_id = 0;
            }
            $quantity = 1;

            if (isset($_SESSION['USER_LOGIN'])) {
                $fetch_user_contact = "SELECT * FROM `user` WHERE `user_id`=" .  $user_id;
                $result = mysqli_query($connection, $fetch_user_contact);
                while ($row = mysqli_fetch_array($result)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_contact = $row['user_contact'];
                    $user_email = $row['user_email'];
                    $user_state = $row['user_state'];
                    $user_city = $row['user_city'];
                    $user_address = $row['user_address'];
                    $user_pincode = $row['user_pincode'];
                }
            }

            ?>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="profile-details">
                    <h5>Customer Details</h5>
                    <p class="customer-name"><?php echo $user_name; ?></p>
                    <p>
                        <ion-icon class="profile-details-icons" name="call-outline"></ion-icon>
                        <?php echo $user_contact; ?>
                    </p>
                    <p>
                        <ion-icon class="profile-details-icons" name="mail-outline"></ion-icon>
                        <?php echo $user_email; ?>
                    </p>
                    <h5 class="mt-5">Saved Address</h5>
                    <p class="para-details"><?php echo $user_state; ?></p>
                    <p class="para-details"><?php echo $user_city; ?></p>
                    <p class="para-details"><?php echo $user_address; ?></p>
                    <p class="para-details"><?php echo $user_pincode; ?></p>
                </div>
            </div>
        </div>
        <div id="your-orders" class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="profile-section-buttons accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                    aria-controls="flush-collapseTwo">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    <p>Your Orders</p>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <?php
                include('admin/includes/server/config.php');
                // GET ORDER DETAILS
                $getQuery = "SELECT * FROM `uder_order` WHERE `order_user_id` = $user_id ORDER BY `order_id` DESC";
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
                    $generated_order = str_replace(array('-'), '', $new_order_time);

                    // CART ITEMS ORDERED BY USER
                    $show_all_items_query = "SELECT * FROM `uder_order_details` WHERE `uod_order_id` = $order_id";
                    $new_result = mysqli_query($connection, $show_all_items_query);
                    while ($row = mysqli_fetch_assoc($new_result)) {
                        $uder_order_details = $row['uder_order_details'];
                        $uod_item_id = $row['uod_item_id'];
                        $uod_price = $row['uod_price'];
                        $uod_quantity = $row['uod_quantity'];
                        $shipping = 60;

                        $new_value = $uod_quantity * $uod_price + $shipping;
                        $get_item_details = "SELECT * FROM `items` WHERE item_id = $uod_item_id";
                        $get_item_details_result = mysqli_query($connection, $get_item_details);
                        while ($row = mysqli_fetch_assoc($get_item_details_result)) {
                            $item_id = $row['item_id'];
                            $item_name = $row['item_name'];
                            $item_weight = $row['item_weight'];
                            $item_price = $row['item_price'];
                            $item_image = "admin/assets/images/products/" . $row['item_image'];
                            $item_category = $row['item_category'];
                ?>
                <!-- RATE PRODUCT MODAL START -->
                <div class="modal" id="rateProductModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">RATE PRODUCT</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo $item_image; ?>" alt="<?php echo $item_image; ?>">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RATE PRODUCT MODAL END -->
                <div class="past-orders-section">
                    <div>
                        <p class="orderid">Order ID: </p>
                        <p class="orderid-res"><?php echo "DRM" . $generated_order . $order_id; ?></p>
                    </div>
                    <div class="past-orders-inner-card">
                        <div class="past-orders-img-box">
                            <img src="<?php echo $item_image; ?>" alt="<?php echo $item_image; ?>">
                        </div>
                        <div>
                            <p class="history-product-name"><?php echo $item_name; ?></p>
                            <div class="weight-price">
                                <p><?php echo $item_category; ?></p>
                                <p class="history-product-weight">(<?php echo $item_weight; ?>)</p>
                            </div>
                            <p class="product-price">₹<?php echo $new_value; ?></p>

                            <div class="button-row">
                                <?php if ($order_status == 0) { ?>
                                <p class='product-status-fail '>Payment Failed</p>
                                <?php } else if ($order_status == 1) { ?>
                                <p class='product-status-success '>Paid</p>
                                <?php } ?>
                                <!-- <button type="button" class="btn btn-primary rate-btn" data-bs-toggle="modal"
                                    data-bs-target="#rateProductModal">
                                    Rate Product
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>