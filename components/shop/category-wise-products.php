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

        <form enctype="multipart/form-data" method="POST" class="w-100 shop-card-content">
            <div class="w-100">
                <input id="item_name" disabled="disabled" name="item_name" placeholder="<?php echo $item_name ?>" />
            </div>

            <div class="w-100">
                <input id="item_description" class="w-100" disabled="disabled" name="item_description"
                    placeholder="<?php echo $item_description ?>" />
            </div>

            <div class="best-seller-mrp-section">
                <input id="item_price" disabled="disabled" name="item_price"
                    placeholder="<?php echo "₹" . $item_price ?>" />
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