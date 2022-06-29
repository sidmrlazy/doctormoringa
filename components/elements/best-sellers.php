<h1 class="section-label">Popular Products</h1>
<div class="best-seller-section">
    <?php
    include('admin/includes/server/config.php');
    $query = "SELECT uder_order_details, SUM(`uod_price`) * uod_quantity AS total FROM `uder_order_details` GROUP BY uder_order_details ORDER BY total DESC LIMIT 5";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $uder_order_details = $row['uder_order_details'];
        $total = $row['total'];

        $fetch_order_id = "SELECT * FROM `uder_order_details` WHERE uder_order_details = $uder_order_details";
        $fetch_order_id_result = mysqli_query($connection, $fetch_order_id);

        while ($row = mysqli_fetch_assoc($fetch_order_id_result)) {
            $uod_item_id = $row['uod_item_id'];

            $fetch_item_details = "SELECT * FROM `items` WHERE 'item_id' = $uod_item_id";
            $fetch_item_result = mysqli_query($connection, $fetch_item_details);

            while ($row = mysqli_fetch_assoc($fetch_item_result)) {
                $item_name = $row['item_id'];
                $item_image = "admin/assets/images/products/" . $row['item_image'];
                $item_name = $row['item_name'];
                $item_weight = $row['item_weight'];
                $item_ingredients = $row['item_ingredients'];
                $item_benefits = $row['item_benefits'];
                $item_usage = $row['item_usage'];
                $item_price = $row['item_price'];
                $item_category = $row['item_category'];
    ?>



    <div class="best-product-card">
        <img class="product-img" src="<?php echo $item_image; ?>" alt="">
        <div class="best-seller-card-content">
            <p><?php echo $item_category; ?></p>
            <h5><?php echo $item_name; ?></h5>
            <div class="best-seller-mrp-section">
                <p><?php echo "₹" . $item_price; ?></p>
                <a href="shop">
                    <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                    Add
                </a>
            </div>
        </div>
    </div>
    <?php
            }
        }
    }

    ?>
</div>