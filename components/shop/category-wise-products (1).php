<!-- shopping-section start -->
<div class="shopping-section">
    <?php
    include('admin/includes/server/config.php');
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }
    $quantity = 1;


    if (isset($_POST['add_to_cart'])) {
        if (!isset($_SESSION['user_contact'])) {
            echo "<script type='text/javascript'>
             $(document).ready(function() {
                 $('#loginModal').modal('show');
             });
             </script>";

            include('components/footer.php');
            exit;
        }

        $fetch_details_query = "SELECT * FROM `user` WHERE `user_id`=" . $user_id;
        $get_details = mysqli_query($connection, $fetch_details_query);

        while ($row = mysqli_fetch_assoc($get_details)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_contact = $row['user_contact'];
            $user_email = $row['user_email'];
            $user_state = $row['user_state'];
            $user_city = $row['user_city'];
            $user_address = $row['user_address'];
            $user_pincode = $row['user_pincode'];
        }

        $insert_array = array(
            $user_id,
            $user_name,
            $user_contact,
            $user_email,
            $user_state,
            $user_city,
            $user_address,
            $user_pincode,
            $cart_item_name = $_POST['item_name'],
            $cart_item_id = $_POST['item_id'],
            $cart_item_description = $_POST['item_id'],
            $cart_item_price = $_POST['item_price'],
            $cart_item_qty = $_POST['item_qty']
        );

        if ($cart_item_qty == 0) {
            echo "<div class='alert alert-danger text-center' role='alert'>Please select the Quantity of Product you want</div>";
        } else {

            $query_check_cart = "SELECT * FROM `cart` WHERE `cart_item_id` LIKE '$cart_item_id' AND `cart_user_id` LIKE '$user_id';";
            $query_check_cart_details = mysqli_query($connection, $query_check_cart);
            if (@$query_check_cart_details->num_rows > 0) {
                // echo "update already in cart";
                while ($cart_row = mysqli_fetch_assoc($query_check_cart_details)) {
                    $cart_is = $cart_row['cart_id'];
                    // echo "<br> id...".$cart_is; 
                }
                echo "<div class='alert alert-success text-center' role='alert'>Item Already in cart</div>";
            } else {
                $query = 'INSERT INTO cart(
                            `cart_user_id`,
                            `cart_user_name`,
                            `cart_user_contact`,
                            `cart_user_email`,
                            `cart_user_state`,
                            `cart_user_city`,
                            `cart_user_address`,
                            `cart_user_pincode`,
                            `cart_item_name`,
                            `cart_item_id`,
                            `cart_item_description`,
                            `cart_price`,
                            `cart_qty`
                                ) VALUES ("' . implode('", "', $insert_array) . '")';
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo "<div class='alert alert-success text-center' role='alert'>Item Added to cart</div>";
                    // return true;
                } else {
                    echo "<div class='alert alert-danger text-center' role='alert'>There was some problem adding product in cart</div>";
                }
            }
        }
    }
    ?>

    <?php
    include('admin/includes/server/config.php');

    $query = "SELECT * FROM `items` i LEFT JOIN cart c ON i.item_id=c.cart_item_id  AND c.cart_user_id='$user_id'";
    $get_details = mysqli_query($connection, $query);
    if (@$get_details->num_rows > 0) {
        $previous_category = "";

        while ($row = mysqli_fetch_array($get_details)) {
            $item_category = $row['item_category'];
            $item_image = "admin/assets/images/products/" . $row['item_image'];
            $item_name = $row['item_name'];
            $item_id = $row['item_id'];
            $item_ingredients = $row['item_ingredients'];
            $item_usage = $row['item_usage'];
            $item_benefits = $row['item_benefits'];
            $item_weight = $row['item_weight'];
            $item_price = $row['item_price'];
            $cart_user_id = $row['cart_user_id'];
            $cart_qty = $row['cart_qty'];
            if ($previous_category != $item_category) {
                $change = 1;
                if (!empty($previous_category)) {
                    echo "</div> <div>
                    </div>";
                }

    ?>
                <!-- Product Details Modal Start -->
                <?php
                include('admin/includes/server/config.php');
                if (isset($_POST['read_more'])) {
                    $cart_item_id = $_POST['item_id'];
                    $fetch_product_details_query = "SELECT * FROM items WHERE item_id = $cart_item_id";
                    $product_details_result = mysqli_query($connection, $fetch_product_details_query);

                    while ($row = mysqli_fetch_array($product_details_result)) {
                        $item_category = $row['item_category'];
                        $item_image = "admin/assets/images/products/" . $row['item_image'];
                        $item_name = $row['item_name'];
                        $item_id = $row['item_id'];
                        $item_ingredients = $row['item_ingredients'];
                        $item_usage = $row['item_usage'];
                        $item_benefits = $row['item_benefits'];
                        $item_weight = $row['item_weight'];
                        $item_price = $row['item_price'];
                    } ?>

                    <!-- Product Details Modal Start -->
                    <div class="modal" id="productModal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <p>Product ID: <?php echo $item_id; ?> </p>
                                    <a href="shop" class="btn-close" aria-label="Close"></a>
                                </div>
                                <div class="modal-body">
                                    <div class="product-card-xl">
                                        <div class="product-card-xl-img col-md-4">
                                            <img src="<?php echo $item_image; ?>" alt="<?php echo $item_name; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="product-cat-xl"><?php echo $item_category; ?></p>
                                            <h1 class="product-name-xl"><?php echo $item_name; ?></h1>
                                            <p class="product-weight-xl">Weight: <?php echo $item_weight; ?></p>

                                            <p class="product-price-xl"> ₹<?php echo $item_price; ?></p>

                                            <!-- Inner Nav -->
                                            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                                                <li class="nav-item tab-item" role="presentation">
                                                    <button class="nav-link  active" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients" aria-selected="true">Ingredients</button>
                                                </li>
                                                <li class="nav-item tab-item" role="presentation">
                                                    <button class="nav-link " id="benefits-tab" data-bs-toggle="tab" data-bs-target="#benefits" type="button" role="tab" aria-controls="benefits" aria-selected="false">Benefits</button>
                                                </li>
                                                <li class="nav-item tab-item" role="presentation">
                                                    <button class="nav-link " id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage" type="button" role="tab" aria-controls="usage" aria-selected="false">Usage</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <!-- ============= ingredients ============= -->
                                                <div class="tab-pane fade show active" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                                                    <div class="accordion-body">
                                                        <div class="w-100 custom-card">
                                                            <p><?php echo $item_ingredients; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade show " id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                                                    <div class="accordion-body">
                                                        <div class="w-100 custom-card">
                                                            <p><?php echo $item_benefits; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade show " id="usage" role="tabpanel" aria-labelledby="usage-tab">
                                                    <div class="accordion-body">
                                                        <div class="w-100 custom-card">
                                                            <p><?php echo $item_usage; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Inner Nav -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <?php echo "<script type='text/javascript'>
    $(document).ready(function() {
        $('#productModal').modal('show');
    });
    </script>";
                }
                ?>
                <!-- Product Details Modal End -->

                <h1 class="mt-5"><?php echo '<div class="shopping-section-heading cl-sm-12">' . $item_category . '</div>' ?></h1>
            <?php $previous_category = $item_category;
                echo '<div class="shopping-section-wrapper">';
            } ?>

            <form method="POST" action="" class="shopping-section-card m-1">
                <img src="<?php echo $item_image;  ?>" alt="" />

                <div class="shopping-section-product-details">
                    <!-- Item ID -->
                    <input type="text" class="item_id" hidden name="item_id" value="<?php echo $item_id ?>" placeholder="<?php echo $item_id ?>" />

                    <!-- Item Name -->
                    <input type="text" readonly name="item_name" class="product_name" value="<?php echo $item_name ?>" />

                    <!-- Item Weight -->
                    <input type="text" readonly name="item_weight" class="product-weight" value="<?php echo $item_weight ?>" />
                </div>

                <div class="shopping-action-section">
                    <!-- Item Price -->
                    <input type="text" class="product_price" readonly name="item_price" value="₹<?php echo $item_price ?>" placeholder="₹<?php echo $item_price ?>" />

                    <?php if (!empty($cart_user_id) && $cart_user_id == $user_id) { ?>

                        <!-- Quantity Calculator -->
                        <div class="product-qty-calculator">
                            <!-- RAemove Button -->
                            <div class="`value-button`" id="decrease" value="remove Value">
                                <!-- onclick="decreaseValue()" -->
                                <span class="label label-primary">
                                    <form action="remove_from_cart.php" method="post">
                                        <input type="text" class="item_id" hidden name="item_id" value="<?php echo $item_id ?>" />
                                        <input type="text" class="user_id" hidden name="user_id" value="<?php echo $user_id ?>" />
                                        <input type="text" class="clear" hidden name="clear" value="0" />

                                        <button style="border: none; background: #ffffff; padding-bottom: 5px;;  margin: 2px;" type="Submit">
                                            <ion-icon name='trash-bin'></ion-icon>
                                        </button>
                                    </form>
                                </span>
                            </div>
                            <!-- Decrease Value -->
                            <div class="`value-button`" id="decrease" value="Decrease Value">
                                <!-- onclick="decreaseValue()" -->
                                <span class="label label-primary">
                                    <form action="subtract_quantity.php" method="post">
                                        <input type="text" class="item_id" hidden name="item_id" value="<?php echo $item_id ?>" />
                                        <input type="text" class="user_id" hidden name="user_id" value="<?php echo $user_id ?>" />
                                        <input type="number" hidden name="item_qty" id="number" value="<?php
                                                                                                        if (!empty($cart_user_id) && $cart_user_id == $user_id) {
                                                                                                            echo $cart_qty;
                                                                                                        } else {
                                                                                                            echo "1";
                                                                                                        } ?>" />
                                        <button style="  border: none; background: #ffffff; " type="Submit">
                                            <ion-icon name="remove-circle-outline" class="chevron-up-outline">
                                            </ion-icon>
                                        </button>
                                    </form>
                                </span>
                            </div>

                            <!-- Quantity Number -->
                            <div>
                                <input type="number" readonly name="item_qty" id="number" value="<?php
                                                                                                    if (!empty($cart_user_id) && $cart_user_id == $user_id) {

                                                                                                        echo $cart_qty;
                                                                                                    } else {
                                                                                                        echo "1";
                                                                                                    }
                                                                                                    ?>" />
                            </div>

                            <!-- Increase Value -->
                            <div class="`value-button`" id="increase" value="Increase Value">
                                <span class="label label-primary">
                                    <form action="add_quantity.php" method="post">
                                        <input type="text" class="item_id" hidden name="item_id" value="<?php echo $item_id ?>" />
                                        <input type="text" class="user_id" hidden name="user_id" value="<?php echo $user_id ?>" />
                                        <input type="number" hidden name="item_qty" id="number" value="<?php
                                                                                                        if (!empty($cart_user_id) && $cart_user_id == $user_id) {
                                                                                                            echo $cart_qty;
                                                                                                        } else {
                                                                                                            echo "1";
                                                                                                        } ?>" />
                                        <button style="  border: none; background: #ffffff; " type="Submit">
                                            <ion-icon name="add-circle-outline" class="chevron-down-outline"></ion-icon>
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>

                    <?php } else { ?>


                        <!-- Conditional Form if product is not added in the cart -->
                        <form action="" method="post">
                            <input type="text" class="product_name" hidden name="item_name" value="<?php echo $item_name ?>" />

                            <input type="text" hidden name="item_weight" class="product-weight" value="<?php echo $item_weight ?>" />

                            <input type="text" class="item_id" hidden name="item_id" value="<?php echo $item_id ?>" placeholder="<?php echo $item_id ?>" />

                            <input type="text" class="product_price w-100" hidden name="item_price" value="₹ <?php echo $item_price ?>" placeholder="₹ <?php echo $item_price ?>" />

                            <input type="number" name="item_qty" hidden id="number" value="<?php
                                                                                            if (!empty($cart_user_id) && $cart_user_id == $user_id) {
                                                                                                echo $cart_qty;
                                                                                            } else {
                                                                                                echo "1";
                                                                                            }
                                                                                            ?>" />

                            <button type="submit" name="add_to_cart" class="btn add-btn add-cart-btn">
                                Add
                            </button>
                            <button type="submit" name="read_more" class="btn add-btn add-cart-btn">
                                Read More
                            </button>
                        </form>
                    <?php } ?>
                </div>
            </form>


            <!-- </div> -->
    <?php


        }
    }

    echo " </div> <div>
    </div>";

    ?>