<div class="container-fluid shop" id="weight-loss">
    <?php
    include('admin/includes/server/config.php');
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
    <?php $previous_category = $item_category;
            } ?>
    <!-- <div class="shop-items"> -->
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
        <div class="shop-card-content">
            <p><?php echo $item_name ?></p>
            <h5><?php echo $item_description ?></h5>
            <div>
                <span class="checked">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="checked">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="checked">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
                <span class="">
                    <ion-icon name="star-outline"></ion-icon>
                </span>
            </div>

            <div class="best-seller-mrp-section">
                <p><?php echo "₹" . $item_price ?></p>
                <a href="components/shop/cart.php?id=$_SESSION">
                    <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                    Add
                </a>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <?php
        }
    }
    ?>
</div>