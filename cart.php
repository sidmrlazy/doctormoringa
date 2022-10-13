<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>
<?php include('components/header.php') ?>
<?php include('components/navbar.php') ?>
<?php include('toasts.php') ?>

<div class="container-fluid mt-5">
    <?php
    $token = session_id();
    $_SESSION['session_id'] = $token;

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $token = $_SESSION['session_id'];
        echo $token;
    } else {
        $user_id = 0;
    }
    $fetch_cart_status = "SELECT * FROM `customer_cart` WHERE cart_user_id = '$token'";
    $fetch_cart_status_res = mysqli_query($connection, $fetch_cart_status);
    $fetch_cart_count = mysqli_num_rows($fetch_cart_status_res);
    $cart_status = "";
    while ($row = mysqli_fetch_assoc($fetch_cart_status_res)) {
        $cart_id = $row['cart_id'];
        $cart_status = $row['cart_status'];
    }

    if ($fetch_cart_count > 0 && $cart_status == 1) {
    ?>

    <form action="pay.php" method="POST" class="checkout-screen-row w-100">
        <!-- ============ USER DETAILS SECTION START ============ -->
        <div class="col-md-6 checkout-left">
            <h3>BILLING & SHIPPING</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cart_user_name" id="userName" placeholder="Full name">
                <label for="userName">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" required class="form-control" name="cart_user_contact" id="floatingPassword"
                    placeholder="Contact number">
                <label for="floatingPassword">Contact Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="cart_user_email" id="floatingEmail"
                    placeholder="name@example.com">
                <label for="floatingEmail">E-Mail</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="cart_user_state"
                    aria-label="Floating label select example">
                    <option selected>Select State</option>
                    <?php
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/IN/states',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_HTTPHEADER => array(
                                'X-CSCAPI-KEY: eTAxUGIyaElOSm5ldE9YdDhmQTJTaWMxbEVWUVFqR1hqblZRNmRyVw=='
                            ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                        $response_json = json_decode($response);
                        foreach ($response_json as $key) {
                            $user_state =  $key->name; ?>
                    <option required name="user_state" value="<?php echo $user_state; ?>"><?php echo $user_state; ?>
                        <?php
                        }
                            ?>
                    </option>

                </select>
                <label for="floatingSelect">State</label>
            </div>

            <div class="form-floating mb-3">
                <select onclick="getUserCity()" name="cart_user_city" class="form-select" id="userCity"
                    aria-label="Floating label select example">
                    <option>Select City</option>
                    <?php
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/IN/cities',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_HTTPHEADER => array(
                                'X-CSCAPI-KEY: eTAxUGIyaElOSm5ldE9YdDhmQTJTaWMxbEVWUVFqR1hqblZRNmRyVw=='
                            ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                        $response_json = json_decode($response);
                        foreach ($response_json as $key) {
                            $user_city =  $key->name; ?>
                    <option required name="user_city" value="<?php echo $user_city; ?>">
                        <?php echo $user_city; ?>
                    </option>
                    <?php
                        }
                        ?>
                </select>
                <label for="floatingSelect">City</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" required name="cart_user_address" placeholder="Enter Full Address"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" maxlength="6" name="cart_user_pincode" id="floatingInput"
                    placeholder="Pincode" required>
                <label for="floatingInput">Pincode</label>
            </div>

            <!-- <div class="form-check mb-3">
                <input class="form-check-input" name="cart_checkbox_value" onclick="showPasswordField()" type="checkbox"
                    value="1" id="accountCheck">
                <label class="form-check-label" for="accountCheck">
                    Create an account?
                </label>
            </div>

            <div class="form-floating" style="display: none;" id="passField">
                <input type="password" autocomplete="on" name="cart_user_password" class="form-control"
                    id="userPassword" placeholder="Password">
                <label for="userPassword">Password</label>
            </div> -->
        </div>
        <!-- ============ USER DETAILS SECTION END ============ -->

        <!-- ============ ORDER DETAILS SECTION START ============ -->
        <div class="col-md-6 checkout-right">
            <h3>YOUR ORDER </h3>
            <div class="checkout-order-details-section">
                <div class="receipt-header mb-3">
                    <h5>PRODUCT</h5>
                    <!-- <h5 id="subtotal-header-qty">QTY</h5> -->
                    <h5 id="subtotal-header-price">SUBTOTAL</h5>
                </div>
                <?php
                    $query = "SELECT * FROM `customer_cart` WHERE `cart_user_id` = '$token' AND `cart_status` = '1'";
                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);

                    $temp_subtotal = 0;
                    $temp_item_total = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $cart_id = $row['cart_id'];
                        $cart_user_id = $row['cart_user_id'];
                        $cart_user_item_id = $row['cart_user_item_id'];
                        $cart_user_subtotal = $row['cart_user_subtotal'];
                        $cart_user_item_qty = $row['cart_user_item_qty'];
                        $cart_user_order_id = $row['cart_user_order_id'];
                        $cart_order_type = $row['cart_order_type'];

                        // ITEM TOTAL
                        $temp_item_total = $cart_user_item_qty * $cart_user_subtotal;

                        // SUB TOTAL CALCULATION
                        $temp_subtotal = $temp_item_total + $temp_subtotal;
                        $item_weight = "";
                        if ($cart_order_type == 1) {
                            $get_item = "SELECT * FROM `items` WHERE item_id = $cart_user_item_id";
                            $get_result = mysqli_query($connection, $get_item);

                            while ($row = mysqli_fetch_assoc($get_result)) {
                                $item_name = $row['item_name'];
                                $item_weight = $row['item_weight'];
                            }
                        }

                        $offer_name = "";
                        $item_weight_combo = "";
                        if ($cart_order_type == 2) {
                            $get_item = "SELECT * FROM `offer_main` WHERE offer_main_id = $cart_user_item_id";
                            $get_result = mysqli_query($connection, $get_item);

                            while ($row = mysqli_fetch_assoc($get_result)) {
                                $offer_name = $row['offer_main_name'];
                            }
                            $fetch_item_dets = "SELECT * FROM `items` WHERE `item_category` = '$offer_name'";
                            $fetch_item_res = mysqli_query($connection, $fetch_item_dets);

                            while ($row = mysqli_fetch_assoc($fetch_item_res)) {
                                $item_weight_combo = $row['item_weight'];
                            }
                        }
                    ?>
                <div class="order-details">
                    <input type="text" name="cart_user_order_id" value="<?php echo $cart_user_order_id; ?>" hidden>
                    <input type="text" name="cart_id" value="<?php echo $cart_id; ?>" hidden>
                    <input type="text" name="cart_user_id" value="<?php echo $cart_user_id; ?>" hidden>
                    <input type="text" name="cart_user_item_qty" value="<?php echo $cart_user_item_qty; ?>" hidden>
                    <div class="order-details-holder">
                        <?php if ($cart_order_type == 1) { ?>
                        <p><?php echo $item_name .  " (" . $item_weight . ")" ?></p>
                        <?php }
                                if ($cart_order_type == 2) { ?>
                        <p><?php echo $offer_name .  " (" . $item_weight_combo . ")" ?></p>
                        <?php } ?>
                    </div>

                    <?php
                            $fetch_qty = "SELECT * FROM `customer_cart` WHERE `cart_user_id` = '$token' AND `cart_user_item_id` = '$cart_user_item_id'";
                            $fetch_qty_res = mysqli_query($connection, $fetch_qty);
                            while ($row = mysqli_fetch_assoc($fetch_qty_res)) {
                                $cart_user_item_qty = $row['cart_user_item_qty'];
                            ?>
                    <div class="order-details-btn-holder">
                        <p><?php echo "X " . $cart_user_item_qty; ?></p>
                    </div>
                    <?php } ?>
                    <div class="order-details-price-holder">
                        <p class="order-price">₹<?php echo $temp_item_total; ?></p>
                    </div>
                </div>
                <?php }

                    ?>
                <div class="order-details-calc">
                    <p class="order-label">Subtotal</p>
                    <input type="text" id="temp_subtotal" name="cart_user_subtotal" value="<?php echo $temp_subtotal ?>"
                        hidden>
                    <!-- <p class="order-calc" id="temp_total_result">₹<?php echo $temp_subtotal; ?></p> -->
                    <p class="order-calc" id="temp_subtotal_result"></p>
                </div>
                <div class="order-details-calc">
                    <p class="order-label">Delivery Charge</p>
                    <input type="text" id="cart_delivery_fee" name="cart_user_delivery_fee" value="" hidden>
                    <p class="order-calc" id="feeCalc"></p>
                </div>
                <div class="order-details-calc">
                    <p class="order-label">Grand Total</p>
                    <input type="text" id="grandTotal" name="cart_user_grand_total" value="" hidden>
                    <p class="order-calc" id="grandTotalShow"></p>
                </div>

                <!-- <button type="submit" name="cart" class="continue-btn mt-3">Proceed to Checkout</button> -->
                <input class="continue-btn mt-3" type="submit" name="submit" value='Proceed to Checkout' />
                <p class="mt-3">Secure Payment Gateways</p>
                <img src="assets/images/icons/payment-method.png" alt="">
            </div>
        </div>
        <!-- ============ ORDER DETAILS SECTION end ============ -->
    </form>

    <?php } else { ?>

    <div class="empty-cart-section">
        <img src="assets/images/gif/empty-cart.gif" alt="">
        <p>Oops! Your cart is empty.</p>
    </div>

    <?php } ?>
</div>
<?php include('components/footer.php') ?>