<div class="container mt-5">
    <div class="grid-card-container">
        <?php
        include('admin/includes/server/config.php');
        $query = "SELECT * FROM `items` LIMIT 4";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['item_id'];
            $item_image = "admin/assets/images/products/" . $row['item_image'];
            $item_name = $row['item_name'];
            $item_weight = $row['item_weight'];
            $item_ingredients = $row['item_ingredients'];
            $item_benefits = $row['item_benefits'];
            $item_usage = $row['item_usage'];
            $item_price = $row['item_price'];
            $item_category = $row['item_category'];
        ?>

        <div class="product-card-homepage">
            <img src="<?php echo $item_image; ?>" alt="<?php echo $item_image; ?>">
            <div class="product-card-content-section">
                <p class="product-card-category"><?php echo $item_category; ?></p>
                <p class="product-card-item-name"><?php echo $item_name; ?></h5>
                </p>
                <div class="product-card-action-section">
                    <p><?php echo "₹" . $item_price; ?></p>
                    <a href="shop#<?php echo $item_id ?>">Details</a>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
    </div>
</div>