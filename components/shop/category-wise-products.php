<div class="container-fluid shop-section" id="weight-loss">
    <?php
    include('database/config.php');
    // $query = "SELECT * FROM `items` join `category` WHERE items.item_category = category.category_name GROUP BY items.item_id";
    $query = "SELECT * FROM items JOIN category WHERE category.category_name = items.item_category GROUP BY items.item_category;";
    $get_details = mysqli_query($connection, $query);
    if (@$get_details->num_rows > 0) {
        $previous_category = "";
        while ($row = mysqli_fetch_assoc($get_details)) {
            // $item_id = $row['item_id'];
            $item_category = $row['item_category'];
            $item_filename = $row['item_filename'];
            $item_filename_back = $row['item_filename_back'];
            $item_name = $row['item_name'];
            $item_description = $row['item_description'];
            $item_price = $row['item_price'];
            if ($previous_category != $item_category) {
                $previous_category = $item_category;
            }
    ?>
    <h4>Doctor Moringa for</h4>
    <h1><?php echo $item_category ?></h1>
    <div class="best-seller-section">
        <div class="best-seller-card">
            <div class="best-seller-card-img">
                <img src="admin/assets/images/uploaded/<?php echo $item_filename; ?>" alt="">
            </div>
            <div class="best-seller-card-content">
                <p><?php echo $item_name ?></p>
                <h5><?php echo $item_description ?></h5>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>

                <div class="best-seller-mrp-section">
                    <p><?php echo "₹" . $item_price ?></p>
                    <a href="">
                        <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                        Add
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>