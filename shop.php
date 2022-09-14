<?php include('components/header.php') ?>
<?php include('components/navbar.php') ?>
<?php // include('components/elements/conditional-login-modal.php')
?>
<?php include('components/shop/section-header.php')
?>
<?php include('components/traffic-tracker.php') ?>
<?php include('toasts.php') ?>
<div class="container-fluid product-section">
    <?php
    $token = session_id();
    $_SESSION['session_id'] = $token;

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $token = $_SESSION['session_id'];
    } else {
        $user_id = 0;
    }
    include('admin/includes/server/config.php');

    // INSERT DATA IN CART
    if (isset($_POST['submit'])) {
        $cart_user_item_id = $_POST['cart_user_item_id'];
        $cart_user_subtotal = $_POST['cart_user_subtotal'];
        $cart_user_item_qty = $_POST['cart_user_item_qty'];
        $cart_user_order_id = "DOCMOR" . $token;
        $cart_status = 1;

        if ($cart_user_item_qty == "Qty") {
            echo "<script>error();</script>";
        } else {
            $insert_query = "INSERT INTO `customer_cart`(
             `cart_user_item_id`,
             `cart_user_subtotal`,
             `cart_user_id`,
             `cart_user_item_qty`,
             `cart_user_order_id`,
             `cart_status`
         )
         VALUES(
             '$cart_user_item_id',
             '$cart_user_subtotal',
             '$token',
             '$cart_user_item_qty',
             '$cart_user_order_id',
             '$cart_status'
         )";
            $insert_result = mysqli_query($connection, $insert_query);
            if (!$insert_result) {
                die(mysqli_error($connection));
            } else {
                echo "<script type='text/javascript'>addCart();</script>";
            }
        }
    }


    // FETCH CATEGORY
    $category_query = "SELECT * FROM `category`";
    $category_result = mysqli_query($connection, $category_query);

    $category_name = "";
    while ($row = mysqli_fetch_assoc($category_result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];

        // FETCH PRODUCTS
        $query = "SELECT * FROM `items` WHERE item_category = '$category_name' AND item_status = 1";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);



        if ($count > 0) {
            $user_category = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $item_category = $row['item_category'];

                $new_item_category = trim($item_category, "");


                // IF CATEGORY HAS NOT BEEN PRINTED ONCE
                if ($user_category !== $item_category) {

                    // THEN SHOW CATEGORY ONLY ONCE
                    $user_category = $item_category; ?>

    <!-- ========= PRODUCT CATEGORY START ========= -->
    <div id="<?php echo $new_item_category ?>" class="product-section-header mt-5 mb-4">
        <h1><?php echo $item_category; ?></h1>
    </div>
    <!-- ========= PRODUCT CATEGORY END ========= -->

    <div class="product-grid-wrapper mb-5">
        <?php }
                $item_id = $row['item_id'];
                $item_image = "admin/assets/images/products/" . $row['item_image'];
                $item_image_2 = "admin/assets/images/products/" . $row['item_image_2'];
                $item_image_3 = "admin/assets/images/products/" . $row['item_image_3'];
                $item_image_4 = "admin/assets/images/products/" . $row['item_image_4'];
                $item_name = $row['item_name'];
                $item_weight = $row['item_weight'];
                $item_price = $row['item_price'];
                $item_description = $row['item_description'];
                $item_usage = $row['item_usage'];
                $item_benefits = $row['item_benefits'];
                $item_status = $row['item_status'];

                $item_id_name = "selector-" . $item_id;

                $new_item_id = trim($item_id_name, "");

                    ?>

        <div id="categoryForm" class="grid-card">
            <div class="grid-card-img-holder">
                <div id="<?php echo $new_item_id ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $item_image ?>" class="d-block w-100 car-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_2 ?>" class="d-block w-100 car-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_3 ?>" class="d-block w-100 car-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_4 ?>" class="d-block w-100 car-img" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $new_item_id ?>"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $new_item_id ?>"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- <img src="<?php echo $item_image ?>" alt=""> -->
            </div>
            <p class="grid-card-product-name"><?php echo $item_name; ?></p>
            <div class="grid-card-row">
                <p class="price">₹<?php echo $item_price; ?></p>
                <p class="weight">(<?php echo $item_weight; ?>)</p>
            </div>

            <?php $fetch = "SELECT * FROM `customer_cart` WHERE cart_user_item_id = $item_id AND cart_user_id = '$token'";
                        $fetch_result = mysqli_query($connection, $fetch);
                        $cart_count = mysqli_num_rows($fetch_result);
                        $cart_status = "";
                        while ($row = mysqli_fetch_assoc($fetch_result)) {
                            $cart_status = $row['cart_status'];
                        }
                        if ($cart_count > 0 && $cart_status == 1) { ?>

            <!-- ========= INCREASE/DECREASE VALUE START ========= -->
            <p class="added-btn">Added to cart</p>
            <!-- ========= INCREASE/DECREASE VALUE END ========= -->

            <?php } else { ?>

            <!-- ========= ADD TO CART START ========= -->
            <form action="" method="POST" class="grid-btn-holder">
                <!-- ========== SENDING CART ITEM DETAILS TO DATABASE ========== -->
                <input type="text" name="cart_user_item_id" id="cart_item_id" value="<?php echo $item_id ?>" hidden>
                <input type="text" name="cart_user_subtotal" id="cart_item_price" value="<?php echo $item_price ?>"
                    hidden>
                <input type="text" name="cart_user_id" id="cart_user_id" value="<?php echo $token ?>" hidden>
                <button type="submit" name="submit" class="grid-cart-btn">Add to Cart</button>
                <select class="form-select grid-cart-dropdown" name="cart_user_item_qty"
                    aria-label="Default select example">
                    <option>Qty</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </form>
            <!-- ========= ADD TO CART END ========= -->

            <!-- ========= PRODUCT DETAILS START ========= -->
            <form action="shop-product-details.php" method="POST" class="w-100 product-details-section">
                <input type="text" name="cart_user_item_id" id="cart_item_id" value="<?php echo $item_id ?>" hidden>
                <button type="submit" name="continue" class="know-more-btn">Know More</button>
            </form>
            <!-- ========= PRODUCT DETAILS END ========= -->

            <?php } ?>
            <span class="container"></span>
        </div>
        <?php } ?>
    </div>
    <?php }
    } ?>
</div>
<!-- <div id="results">
    
</div> -->
<?php include('components/footer.php') ?>