<h1 class="section-label">Popular Products</h1>
<div class="best-seller-section">
    <?php
    include('admin/includes/server/config.php');
    $query = "SELECT * FROM items";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("THERE WAS SOME PROBLEM FETCHING PRODUCTS!" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
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
        <!-- <div ></div> -->
        <div class="best-seller-card-content">
            <p><?php echo $item_category; ?></p>
            <h5><?php echo $item_name; ?></h5>
            <!-- <div>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div> -->

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
    ?>

    <!-- <div class="best-product-card">
        <div class="product-img"></div>
        <div class="best-seller-card-content">
            <p>Powder</p>
            <h5>Doctor Moringa 1 minute Miracle Sattu Powder</h5>
            <div>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>

            <div class="best-seller-mrp-section">
                <p>$28.85</p>

                <a href="">
                    <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                    Add
                </a>
            </div>
        </div>
    </div>

    <div class="best-product-card">
        <div class="product-img"></div>
        <div class="best-seller-card-content">
            <p>Powder</p>
            <h5>Doctor Moringa 1 minute Miracle Sattu Powder</h5>
            <div>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>

            <div class="best-seller-mrp-section">
                <p>$28.85</p>

                <a href="">
                    <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                    Add
                </a>
            </div>
        </div>
    </div> -->
</div>