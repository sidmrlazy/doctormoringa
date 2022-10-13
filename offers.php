<?php include('components/header.php') ?>
<?php include('components/navbar.php') ?>
<?php include('components/traffic-tracker.php') ?>
<div class="container mt-3">

    <?php
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $token = $_SESSION['session_id'];
    } else {
        $user_id = 0;
    }

    // INSERT DATA IN CART
    if (isset($_POST['submit'])) {
        $cart_user_item_id = $_POST['cart_user_item_id'];

        $cart_user_subtotal = $_POST['cart_user_subtotal'];
        $cart_user_item_qty = 1;
        $cart_user_order_id = "DOCMOR" . $token;
        $cart_status = 1;
        $cart_order_type = 2;

        if ($cart_user_item_qty == "Qty") {
            echo "<script>error();</script>";
        } else {
            $insert_query = "INSERT INTO `customer_cart`(
                `cart_user_item_id`,
                `cart_user_subtotal`,
                `cart_user_id`,
                `cart_user_item_qty`,
                `cart_user_order_id`,
                `cart_status`,
                `cart_order_type`
            )
            VALUES(
                '$cart_user_item_id',
                '$cart_user_subtotal',
                '$token',
                '$cart_user_item_qty',
                '$cart_user_order_id',
                '$cart_status',
                '$cart_order_type'
            )";
            $insert_result = mysqli_query($connection, $insert_query);
            if (!$insert_result) {
                die(mysqli_error($connection));
            } else {
                echo "<script type='text/javascript'>addCart();</script>";
            }
        }
    }


    $category_query = "SELECT * FROM `offer_main`";
    $category_result = mysqli_query($connection, $category_query);

    $category_name = "";
    while ($row = mysqli_fetch_assoc($category_result)) {
        $offer_main_id = $row['offer_main_id'];
        $offer_main_name = $row['offer_main_name'];
        $offer_main_amount = $row['offer_main_amount'];

        $query = "SELECT * FROM `offer_products` WHERE offer_main_id = '$offer_main_id'";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $user_category = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $offer_main_id = $row['offer_main_id'];
                $offer_item_id = $row['offer_item_id'];
                $new_item_category = trim($offer_main_id, "");

                // IF CATEGORY HAS NOT BEEN PRINTED ONCE
                if ($user_category !== $offer_main_id) {
                    // THEN SHOW CATEGORY ONLY ONCE
                    $user_category = $offer_main_id; ?>

    <!-- ========= PRODUCT CATEGORY START ========= -->
    <div id="<?php echo $new_item_category ?>" class="offer-category-section mt-5 mb-4">
        <div class="offer-cat-flex">
            <h1><?php echo $offer_main_name; ?> (₹<?php echo $offer_main_amount  ?>)</h1>
            <p>This offer inlcudes</p>
        </div>
        <form action="" method="POST">
            <input type="text" name="cart_user_item_id" id="cart_item_id" value="<?php echo $offer_main_id ?>" hidden>
            <input type="text" name="cart_user_subtotal" id="cart_item_price" value="<?php echo $offer_main_amount ?>"
                hidden>
            <input type="text" name="cart_user_id" id="cart_user_id" value="<?php echo $token ?>" hidden>
            <button type="submit" name="submit" class="grid-cart-btn">Add to Cart</button>
        </form>

    </div>
    <div class="offer-grid">
        <?php }
                $get_item = "SELECT * FROM `items` WHERE item_id = $offer_item_id";
                $get_item_r = mysqli_query($connection, $get_item);
                while ($row = mysqli_fetch_assoc($get_item_r)) {
                    $item_image = "admin/assets/images/products/" . $row['item_image'];
                    $item_name = $row['item_name'];
                    $item_weight = $row['item_weight'];
                    $item_price = $row['item_price'];
                    $item_category = $row['item_category'];
                    ?>
        <div class="offer-card">
            <div class="offer-item-img">
                <img src="<?php echo $item_image ?>" alt="">
            </div>
            <div class="offer-content-section">
                <p class="offer-cat"><?php echo $item_category ?></p>
                <p class="offer-product-name"><?php echo $item_name ?></p>
                <p class="offer-price">₹<?php echo $item_price ?></p>
                <p><?php echo $item_weight ?></p>
            </div>
        </div>
        <?php }
            }
        } ?>
    </div>
    <?php } ?>

</div>
<?php include('components/footer.php') ?>