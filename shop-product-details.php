<?php include('components/header.php') ?>
<?php include('components/navbar.php') ?>
<?php include('components/traffic-tracker.php') ?>
<div class="container-fluid mt-3 mb-3">
    <?php
    if (isset($_POST['continue'])) {
        $cart_user_item_id = $_POST['cart_user_item_id'];

        $fetch_details = "SELECT * FROM `items` WHERE `item_id` = '$cart_user_item_id'";
        $fetch_result = mysqli_query($connection, $fetch_details);

        while ($row = mysqli_fetch_assoc($fetch_result)) {
            $item_id = $row['item_id'];
            $item_image = "admin/assets/images/products/" . $row['item_image'];
            $item_image_2 = "admin/assets/images/products/" . $row['item_image_2'];
            $item_image_3 = "admin/assets/images/products/" . $row['item_image_3'];
            $item_image_4 = "admin/assets/images/products/" . $row['item_image_4'];
            $item_name = $row['item_name'];
            $item_weight = $row['item_weight'];
            $item_price = $row['item_price'];
            $item_ingredients = $row['item_ingredients'];
            $item_description = $row['item_description'];
            $item_usage = $row['item_usage'];
            $item_benefits = $row['item_benefits'];
            $carousel = "carousel-" . $item_id;
    ?>
    <div class="item-details-section">
        <div class="item-details-section-row">
            <div class="item-details-carousel-container col-md-6">
                <div id="<?php echo $carousel ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $item_image  ?>" class="d-block w-100 item-details-item-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_2 ?>" class="d-block w-100 item-details-item-img"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_3 ?>" class="d-block w-100 item-details-item-img"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item_image_4 ?>" class="d-block w-100 item-details-item-img"
                                alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev prev-icon-new" type="button"
                        data-bs-target="#<?php echo $carousel ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next next-icon-new" type="button"
                        data-bs-target="#<?php echo $carousel ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4 item-details-section-content">
                <p class="item-details-item-name"><?php echo $item_name ?></p>
                <p class="item-details-item-price">₹<?php echo $item_price ?></p>
                <p class="item-details-item-weight"><?php echo "( " .  $item_weight . " )" ?></p>
                <p class="item-details-item-ingred"><?php echo $item_ingredients ?></p>
            </div>
        </div>

        <div class="item-details-max">
            <div class="mt-3">
                <p class="item-details-label">Product Details</p>
                <div class="item-line"></div>
                <p class="item-details-desc"><?php echo $item_description ?></p>
            </div>

            <div class="mt-3 ">
                <p class="item-details-label">Usage</p>
                <div class="item-line"></div>
                <p class="item-details-desc"><?php echo $item_usage ?></p>
            </div>

            <div class="mt-3 ">
                <p class="item-details-label">Benefits</p>
                <div class="item-line"></div>
                <p class="item-details-desc"><?php echo $item_benefits ?></p>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>
<?php include('components/footer.php') ?>