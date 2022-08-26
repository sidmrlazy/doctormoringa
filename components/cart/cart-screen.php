<div class="container-fluid mt-5">
    <form action="" method="POST" class="checkout-screen-row w-100">

        <!-- ============ ORDER DETAILS SECTION START ============ -->
        <div class="col-md-6 checkout-right">
            <h3>YOUR ORDER </h3>
            <div class="checkout-order-details-section">
                <div class="receipt-header mb-3">
                    <h5>PRODUCT</h5>
                    <h5 id="subtotal-header">QTY</h5>
                    <h5 id="subtotal-header">SUBTOTAL</h5>
                </div>
                <?php
                if (!empty($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $token = $_SESSION['session_id'];
                } else {
                    $user_id = 0;
                }

                $query = "SELECT * FROM `cart` WHERE cart_user_id = '$token'";
                $result = mysqli_query($connection, $query);
                $count = mysqli_num_rows($result);
                $temp_subtotal = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $cart_id = $row['cart_id'];
                    $cart_item_name = $row['cart_item_name'];
                    $cart_item_id = $row['cart_item_id'];
                    $cart_price = $row['cart_price'];
                    $cart_qty = $row['cart_qty'];
                    $temp_subtotal = $cart_price + $temp_subtotal;

                    $get_item = "SELECT * FROM `items` WHERE item_id = $cart_item_id";
                    $get_result = mysqli_query($connection, $get_item);
                    $item_weight = "";
                    while ($row = mysqli_fetch_assoc($get_result)) {
                        $item_weight = $row['item_weight'];
                    }


                ?>
                <div class="order-details">
                    <p><?php echo $cart_item_name .  "(" . $item_weight . ")" ?></p>
                    <p id="order-price"><?php echo " X " . "(" . $cart_qty . ")" ?></p>
                    <p id="order-price">₹<?php echo $cart_price; ?></p>
                </div>
                <?php }

                ?>
                <div class="order-details">
                    <p class="fw-bold">Subtotal</p>

                    <p id="order-price-final">₹<?php echo $temp_subtotal; ?></p>
                </div>
                <div class="order-details">
                    <p class="fw-bold">Delivery Charge</p>
                    <p id="order-price-final">₹</p>
                </div>
                <div class="order-details">
                    <p class="fw-bold">Grand Total</p>
                    <p id="order-price-final">₹</p>
                </div>
            </div>
        </div>
        <!-- ============ ORDER DETAILS SECTION end ============ -->

        <!-- ============ USER DETAILS SECTION START ============ -->
        <div class="col-md-6 checkout-left">
            <h3>BILLING & SHIPPING</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contact Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-Mail</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
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
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Select City</option>
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
                <textarea class="form-control" placeholder="Enter Full Address" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Pincode</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Create an account?
                </label>
            </div>
        </div>
        <!-- ============ USER DETAILS SECTION END ============ -->


    </form>
</div>