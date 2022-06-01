<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }
    $quantity = 1;
    $product_price = 0;
    $all_total_price = 0;

    include('admin/includes/server/config.php');
    if (!isset($_SESSION['user_contact'])) {
        // header("location: login.php");
        echo "<script type='text/javascript'>
    $(document).ready(function() {
    $('#loginModal').modal('show');
    });
    </script>";
        // echo "<center> You Have to Login First <br>
        //         <a href='login'>Login</a>  <br> <br>  </center> ";

        include('components/footer.php');
        exit;
    }

    // ...........................user details..........................
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
    }
    // .......................................cart data................. 
    $query = "SELECT * FROM `items` i LEFT JOIN cart c ON i.item_id=c.cart_item_id AND c.cart_user_id='$user_id'";
    $get_details = mysqli_query($connection, $query);
    if (@$get_details->num_rows > 0) {
        $previous_category = "";
        // $num_rows = mysql_num_rows($get_details);   
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

    <form class="w-100" action="save_order_details" method="POST">

    <?php
            while ($row = mysqli_fetch_assoc($get_details)) {
                $item_category = $row['item_category'];
                $item_image = $row['item_image'];
                // $item_filename_back = $row['item_filename_back'];
                $item_name = $row['item_name'];
                $item_id = $row['item_id'];
                //$item_description = $row['item_description'];
                $item_price = $row['item_price'];
                $cart_user_id = $row['cart_user_id'];
                $cart_qty = $row['cart_qty'];

                if (!empty($cart_user_id) && $cart_user_id == $user_id) {

            ?>
        <div class="main-cart">
            <div class="cart-product-img">
                <img src="assets/images/background/moringa-leaves.jpg" alt="">
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
            <div class="col-md-6 m-1 pricing-tab">
                <h4>Shipping Address</h4>
                <div class="inner-headings">
                    <div class="user-details">
                        <p id="user-details-heading">Customer Name</p>
                        <input required type="text" minlength="2" name="user_name" value="<?php echo $user_name; ?>">
                    </div>

                    <div class="user-details">
                        <p id="user-details-heading">Contact</p>
                        <input required type="text" minlength="9"  name="user_contact" value="<?php echo $user_contact; ?>">
                    </div>
                </div>
                <div class="inner-headings">

                    <div class="user-details">
                        <p id="user-details-heading">State</p>
                        <input required type="text" minlength="3" name="user_state" value="<?php echo $user_state; ?>">
                    </div>

                    <div class="user-details">
                        <p id="user-details-heading">City</p>
                        <input required type="text"  minlength="3" name="user_city" value="<?php echo $user_city; ?>">
                    </div>
                </div>
                <div class="inner-headings">

                    <div class="user-details">
                        <p id="user-details-heading">Address</p>
                        <input required type="text" minlength="5" name="user_address" value="<?php echo $user_address; ?>">
                    </div>

                    <div class="user-details">
                        <p id="user-details-heading">Email-id</p>
                        <input required type="text" minlength="5" name="user_email" value="<?php echo $user_email; ?>">
                    </div>

                </div>

                <!-- <a href="checkout" type="submit" name="edit" class="checkout-btn">Edit</a> -->
            </div>
            <div class="col-md-6 m-1 pricing-tab">
                <div class="inner-headings">
                    <p id="heading">Subtotal</p>
                    <p><?php echo $all_total_price; ?></p>
                </div>

                <div class="inner-headings">
                    <p id="heading">Shipping</p>
                    <p><?php
                                                                                                                        $delivery_chearge = 60;
                                                                                                                        echo $delivery_chearge; ?>
                    </p>
                </div>

                <div class="inner-headings">
                    <p id="heading">Grand Total</p>
                    <p><?php
                                                                                                                        $gross_total = $all_total_price + $delivery_chearge;
                                                                                                                        echo $gross_total; ?>
                    </p>
                </div>
                <!-- Use this button when developing the functionality -->
                <!-- <button type="submit" name="" class="checkout-btn">Proceed to Checkout</button> -->
                <input type="text" name="user_id" hidden value="<?php echo $user_id; ?>">
                <input type="submit" name="submit" value='Proceed to Checkout' />
            </div>
        </div>
        <?php } else {

                    echo "<center> Cart is Empty </center>";
                } ?>


    </form>

    <div>

    </div>
</div>