<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include('admin/includes/server/config.php');

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 0;
}
$quantity = 1;
$product_price = 0;
$all_total_price = 0;
$delivery_chearge = 0;

// User Details
$fetch_details_query = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";
$get_details = mysqli_query($connection, $fetch_details_query);
while ($row = mysqli_fetch_assoc($get_details)) {
    $user_name = $row['user_name'];
    $user_contact = $row['user_contact'];
    $user_email = $row['user_email'];
    $user_state = $row['user_state'];
    $user_city = $row['user_city'];
    $user_address = $row['user_address'];
    $user_pincode = $row['user_pincode'];

    if ($user_city == 'Lucknow' || $user_city == 'Lucknow District') {
        $delivery_chearge == 80;
    } else if ($user_city !== 'Lucknow' || $user_city !== 'Lucknow District') {
        $delivery_chearge == 100;
    }
}
// Cart Data 
$query = "SELECT * FROM `items` i LEFT JOIN cart c ON i.item_id=c.cart_item_id AND c.cart_user_id='$user_id'";
$get_details = mysqli_query($connection, $query);
if (@$get_details->num_rows > 0) {
    $previous_category = "";
?>
<div class="container-fluid mt-5 cart-section">
    <div class="cart-heading-section">
        <!-- <p>There are total <?php echo $num_rows; ?> products in your cart</p> -->
        <form action="remove_from_cart.php" method="post">
            <input type="text" class="item_id" hidden name="item_id" value="0" />
            <input type="text" class="clear" hidden name="clear" value="1" />
            <input type="text" class="user_id" hidden name="user_id" value="<?php echo $user_id ?>" />
            <button type="submit" class="cart-remove-btn">
                <ion-icon name="trash-outline"></ion-icon>
                <p>Clear Cart</p>
            </button>
        </form>
    </div>

    <form class="w-100" action="pay.php" method="POST">
        <?php
            while ($row = mysqli_fetch_assoc($get_details)) {
                $item_category = $row['item_category'];
                $item_image = "admin/assets/images/products/" . $row['item_image'];
                $item_name = $row['item_name'];
                $item_id = $row['item_id'];
                $item_price = $row['item_price'];
                $cart_user_id = $row['cart_user_id'];
                $cart_qty = $row['cart_qty'];
                if (!empty($cart_user_id) && $cart_user_id == $user_id) {

            ?>
        <div class="main-cart">
            <div class="cart-product-img">
                <img src="<?php echo $item_image;  ?>" alt="" />
            </div>
            <div class="cart-product-details">
                <h3><?php echo $item_category; ?></h3>
                <h1><?php echo $item_name; ?></h1>
                <p><?php //echo $item_description; 
                                ?> </p>
                <h5>Quantity: <?php echo $cart_qty; ?></h5>
            </div>
            <div class="cart-product-price">
                <p>₹<?php
                                $product_price = $item_price * $cart_qty;
                                $all_total_price = $all_total_price + $product_price;
                                echo $product_price; ?>
                </p>
            </div>
        </div>
        <?php
                }
            }
        }

        if ($product_price > 0) { ?>
        <div class="final-section mt-4">
            <div class="w-100 m-1 pricing-tab">
                <h4>Shipping Address</h4>
                <div class="inner-headings">
                    <div class="form-floating m-1 user-details">
                        <input required class="form-control" placeholder="Full Name" type="text" minlength="2"
                            id="floatingInput" name="user_name" value="<?php echo $user_name; ?>">
                        <label for="floatingInput">Customer Name</label>
                    </div>

                    <div class="form-floating m-1 user-details">
                        <input required class="form-control" placeholder="+91 XXXXX XXXXX" type="number" minlength="10"
                            id="floatingInput" name="user_contact" value="<?php echo $user_contact; ?>">
                        <label for="floatingInput">Mobile Number</label>
                    </div>
                </div>

                <div class="form-floating m-1 user-details">
                    <select class="form-select" name="user_state" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected><?php echo $user_state; ?></option>
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
                    <label for="floatingSelect">Country</label>
                </div>

                <div class="form-floating m-1 user-details">
                    <select id="user_city" name="user_city" class="form-select" onchange="getFee()"
                        aria-label="Floating label select example">
                        <option><?php echo $user_city; ?></option>
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


                <div class="inner-headings">
                    <div class="form-floating m-1 user-details">
                        <input required class="form-control" placeholder="State" type="text" minlength="2"
                            id="floatingInput" name="user_address" value="<?php echo $user_address; ?>">
                        <label for="floatingInput">Address</label>
                    </div>

                    <div class="form-floating m-1 user-details">
                        <input required class="form-control" placeholder="Email" type="email" minlength="2"
                            id="floatingInput" name="user_email" value="<?php echo $user_email; ?>">
                        <label for="floatingInput">Email - ID</label>
                    </div>
                </div>


                <!-- <a href="checkout" type="submit" name="edit" class="checkout-btn">Edit</a> -->
            </div>

            <!-- Sub Total Start -->
            <div class="col-md-6 m-1 pricing-tab">
                <div class="inner-headings">
                    <p id="heading">Subtotal</p>
                    <p><?php echo "₹" . $all_total_price; ?></p>
                </div>
                <!-- Sub Total End -->

                <!-- Delivery Fee Start -->
                <?php $delivery_chearge = 0; ?>
                <div class="inner-headings">
                    <p id="heading">Shipping</p>
                    <p id="delivery_chearge"></p>
                </div>
                <!-- Delivery Fee End -->

                <!-- Grand Total Start -->
                <?php $gross_total = $all_total_price + $delivery_chearge; ?>
                <div class="inner-headings">
                    <p id="heading">Grand Total</p>
                    <p id="gross_total"></p>
                </div>
                <!-- Grand Total End -->

                <!-- Values to being sent to Razorpay (pay.php) Start -->
                <input type="text" hidden name="user_id" value="<?php echo $user_id; ?>">
                <input type="text" hidden name="all_total_price" value="<?php echo $all_total_price; ?>"
                    id="all_total_price">

                <input type="text" hidden name="delivery_chearge" value="<?php echo $delivery_chearge; ?>">
                <input type="text" hidden name="gross_total" value="<?php echo $gross_total; ?>">
                <input class="checkout-btn" type="submit" name="submit" value='Proceed to Checkout' />
                <!-- Values to being sent to Razorpay (pay.php) End -->


                <div class="d-flex justify-content-center align-items-center payment-section">
                    <p class="mt-5">Secure Payment Gateways</p>
                    <img src="assets/images/icons/payment-method.png" alt="">
                </div>
            </div>
        </div>
</div>
<?php } else {
            echo "<lottie-player src='https://assets8.lottiefiles.com/packages/lf20_fzoupjne.json' class='d-flex justofy-content-center align-items-center w-100' background='transparent'  speed='1'  style='width: 300px; height: 300px;' loop autoplay></lottie-player>";
        } ?>


</form>

<div>

</div>
</div>