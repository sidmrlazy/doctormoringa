<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3 container-fluid">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container mt-5">

        <?php
        include('includes/server/config.php');

        $results_per_page = 5;

        $query = "SELECT * FROM `items`";
        $result = mysqli_query($connection, $query);
        $number_of_result = mysqli_num_rows($result);

        $number_of_page = ceil($number_of_result / $results_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $page_first_result = ($page - 1) * $results_per_page;

        // QUERY TO FETCH INVENTORY
        $query_item = "SELECT * FROM `items` LIMIT " . $page_first_result . ',' . $results_per_page;
        $get_details_r = mysqli_query($connection, $query_item);
        if (@$get_details_r->num_rows > 0) {
            $previous_category = "";
            while ($row = $get_details_r->fetch_assoc()) {
                $item_id = $row['item_id'];
                $item_image = "assets/images/products/" . $row['item_image'];
                $item_category = $row['item_category'];
                $item_ingredients = $row['item_ingredients'];
                $item_description = $row['item_description'];
                $item_benefits = $row['item_benefits'];
                $item_usage = $row['item_usage'];
                $item_weight = $row['item_weight'];
                $item_name = $row['item_name'];
                $item_price = $row['item_price'];
                $item_status = $row['item_status'];

                if ($previous_category !== $item_category) {
                    $previous_category = $item_category;
                }
        ?>

        <div class="inventory-section">
            <?php if (!file_exists($item_image)) { ?>
            <form action="update-product-image.php" method="POST" enctype="multipart/form-data"
                class="inventory-img-holder">
                <input type="text" hidden name="item_id" value="<?php echo $item_id; ?>">
                <input type="text" hidden name="item_image" value="<?php echo $item_image; ?>">
                <ion-icon name="image-outline" class="broken-img-icon"></ion-icon>
                <button type="submit" name="edit" class="inventory-img-change-btn">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
            </form>
            <?php } else { ?>
            <form action="update-product-image.php" method="POST" enctype="multipart/form-data"
                class="inventory-img-holder">
                <input type="text" hidden name="item_id" value="<?php echo $item_id; ?>">
                <input type="text" hidden name="item_image" value="<?php echo $item_image; ?>">
                <img src="<?php echo $item_image ?>" alt="">
                <button type="submit" name="edit" class="inventory-img-change-btn">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
            </form>
            <?php } ?>

            <form action="edit-item.php" method="POST" class="inventory-content-holder">
                <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
                <input type="text" hidden name="item_name" value="<?php echo $item_name ?>">
                <input type="text" hidden name="item_category" value="<?php echo $item_category ?>">
                <input type="text" hidden name="item_usage" value="<?php echo $item_usage ?>">
                <input type="text" hidden name="item_description" value="<?php echo $item_description ?>">
                <input type="text" hidden name="item_benefits" value="<?php echo $item_benefits ?>">
                <input type="text" hidden name="item_ingredients" value="<?php echo $item_ingredients ?>">
                <input type="text" hidden name="item_price" value="<?php echo $item_price ?>">
                <input type="text" hidden name="item_weight" value="<?php echo $item_weight ?>">
                <input type="text" hidden name="item_status" value="<?php echo $item_status ?>">

                <p class="inv-name"><?php echo $item_name ?></p>
                <p class="inv-cat"><?php echo $item_category ?></p>
                <p class="inv-price">₹<?php echo $item_price ?></p>
                <p class="inv-weight"><?php echo $item_weight ?></p>

                <?php if ($item_status == 1) { ?>
                <div class="inv-btn-row">
                    <p class="inv-active-stat">In Stock</p>
                    <button type="submit" name="edit" class="inv-edit-btn">Edit</button>
                </div>
                <?php } else if ($item_status == 2) { ?>
                <div class="inv-btn-row">
                    <p class="inv-inactive-stat">Out of Stock</p>
                    <button type="submit" name="edit" class="inv-edit-btn">Edit</button>
                </div>
                <?php  } ?>

            </form>
        </div>

        <!-- ==================== DISPLAYING PRODUCTS ==================== -->
        <!-- <div class="d-flex justify-content-start align-items-start">
            <form action="update-product-image.php" method="POST" class="product-img-section"
                enctype="multipart/form-data">
                <img class="product-image" src="assets/images/products/<?php echo $item_image ?>">


                <input type="text" hidden name="item_id" value="<?php echo $item_id; ?>">
                <input type="text" hidden name="item_image" value="<?php echo $item_image; ?>">


                <button type="submit" name="edit" value="edit" class="btn update-btn-sm">Update Image</button>
            </form>
            <form action="edit-item.php" method="POST" class="admin-section-card">

                <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
                <input type="text" hidden name="item_category" value="<?php echo $item_category ?>">
                <input type="text" hidden name="item_usage" value="<?php echo $item_usage ?>">
                <input type="text" hidden name="item_description" value="<?php echo $item_description ?>">
                <input type="text" hidden name="item_benefits" value="<?php echo $item_benefits ?>">
                <input type="text" hidden name="item_ingredients" value="<?php echo $item_ingredients ?>">
                <input type="text" hidden name="item_price" value="<?php echo $item_price ?>">
                <input type="text" hidden name="item_weight" value="<?php echo $item_weight ?>">
                <input type="text" hidden name="item_status" value="<?php echo $item_status ?>">

                <div class="admin-section-row-start mb-3">
                    <div class=" admin-section-col-start">
                        <input class="admin-input product" type="text" name="item_name"
                            value="<?php echo $item_name ?>">
                        <input class="admin-input category" type="text" name="item_category"
                            value="<?php echo $item_category ?>">
                        <input class="admin-input category" type="text" name="item_category"
                            value="<?php echo $item_weight ?>">

                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary m-2 confirm-button-md" name="edit" value="edit"
                                type="submit">Edit
                                Product
                                Details</button>
                            <?php
                            if ($item_status == '1') {
                            ?>

                            <p class="active-btn">In Stock</p>
                            <?php
                            } else if ($item_status == '2') {
                            ?>
                            <p class="inactive-btn">Out Of Stock</p>

                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div> -->
        <?php
            } ?>
        <div class="d-flex justify-content-center align-items-center w-100">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                        for ($page = 1; $page <= $number_of_page; $page++) {
                            echo '<li class="page-item"><a class="page-link"  href="view-inventory.php?page=' . $page . '">' . $page . ' </a></li>';
                        }
                        ?>
                </ul>
            </nav>
        </div>
        <?php }
        // IF NO INVENTORY FOUND THEN DISPLAYING LOTTIE
        else {
        ?>
        <div class="no-products mt-5">
            <div class="col-md-4 lottie-container">
                <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_oqpbtola.json"
                    background="transparent" speed="1" class="lottie" loop autoplay></lottie-player>
            </div>
            <div class='alert alert-danger' role='alert'>
                You havent added any products in your Inventory!
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php include('includes/footer.php') ?>