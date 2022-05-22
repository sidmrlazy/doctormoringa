<div class="container-fluid shop" id="weight-loss">
    <?php
    include('admin/includes/server/config.php');

    // Query to Fetch Items from Database
    $query = "SELECT * FROM items order BY item_category;";
    $get_details = mysqli_query($connection, $query);
    if (@$get_details->num_rows > 0) {
        $previous_category = "";
        while ($row = mysqli_fetch_assoc($get_details)) {
            $item_category = $row['item_category'];
            $item_filename = $row['item_filename'];
            $item_filename_back = $row['item_filename_back'];
            $item_name = $row['item_name'];
            $item_description = $row['item_description'];
            $item_price = $row['item_price'];
            if ($previous_category != $item_category) {
    ?>
    <div class="shop-heading-section">

        <h4>Doctor Moringa for</h4>
        <h1><?php echo $item_category ?></h1>
    </div>

    <!-- Get Products Category Wise -->
    <?php $previous_category = $item_category;
            } ?>

    <div class="shop-card">
        <div class="shop-card-img">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/background/moringa-leaves.jpg" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <form method="POST" action="" class="w-100 shop-card-content">
            <?php
                    include('admin/includes/server/config.php');
                    if (isset($_POST['submit'])) {

                        $fetch_details_query = "SELECT * FROM user";
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
                            $item_name = $_POST['item_name'],
                            $item_description = $_POST['item_description'],
                            $item_price = $_POST['item_price'],
                            $item_qty = $_POST['item_qty']
                        );

                        if ($item_qty == 0) {
                            echo "<div class='alert alert-danger text-center' role='alert'>Please select the Quantity of Product you want</div>";
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
                                `cart_item_description`,
                                `cart_price`,
                                `cart_qty`
                            ) VALUES ("' . implode('", "', $insert_array) . '")';
                            $result = mysqli_query($connection, $query);

                            if ($result) {
                                echo "<div class='alert alert-success text-center' role='alert'>Item Added</div>";
                                return true;
                            } else {
                                echo "<div class='alert alert-danger text-center' role='alert'>There was some problem adding product in cart</div>";
                            }
                        }
                    }
                    ?>
            <div class="w-100">
                <input type="text" class="item_name" readonly name="item_name" value="<?php echo $item_name ?>"
                    placeholder="<?php echo $item_name ?>" />
            </div>

            <div class="w-100">
                <input type="text" class="w-100 item_description" readonly value="<?php echo $item_description ?>"
                    name="item_description" placeholder="<?php echo $item_description ?>" />
            </div>

            <div class="best-seller-mrp-section">
                <input type="text" class="item_price" readonly name="item_price" value="<?php echo "₹" . $item_price ?>"
                    placeholder="<?php echo "₹" . $item_price ?>" />

                <div class="cart-calculator">
                    <div class="`value-button`" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                        <ion-icon name="remove-circle-outline" class="chevron-up-outline"></ion-icon>
                    </div>
                    <input type="number" name="item_qty" id="number" value="0" />
                    <div class="`value-button`" id="increase" onclick="increaseValue()" value="Increase Value">
                        <ion-icon name="add-circle-outline" class="chevron-down-outline"></ion-icon>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn add-btn">
                    <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                    Add
                </button>
            </div>
        </form>
    </div>


    <?php
        }
    }
    ?>
</div>