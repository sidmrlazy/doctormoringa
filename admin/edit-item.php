<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">

        <?php
        include 'includes/server/config.php';

        // Update Function
        if (isset($_POST['update'])) {
            $item_id = mysqli_real_escape_string($connection, $_POST['item_id']);
            $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
            $item_weight = mysqli_real_escape_string($connection, $_POST['item_weight']);
            $item_description = mysqli_real_escape_string($connection, $_POST['item_description']);
            $item_ingredients = mysqli_real_escape_string($connection, $_POST['item_ingredients']);
            $item_benefits = mysqli_real_escape_string($connection, $_POST['item_benefits']);
            $item_usage = mysqli_real_escape_string($connection, $_POST['item_usage']);
            $item_price = mysqli_real_escape_string($connection, $_POST['item_price']);
            $item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
            $item_status = $_POST['item_status'];
            // $item_image = $_FILES["item_image"]["name"];
            // $item_image_temp = $_FILES["item_image"]["tmp_name"];
            // $folder = "assets/images/products/" . $item_image;
            $update_query = "UPDATE `items` SET 
                  `item_name`='$item_name',
                  `item_weight`='$item_weight',
                  `item_description`='$item_description',
                  `item_ingredients`='$item_ingredients',
                  `item_benefits`='$item_benefits',
                  `item_usage`='$item_usage',
                  `item_price`='$item_price',
                  `item_category`='$item_category',
                  `item_status`='$item_status'  
                  WHERE `item_id` = $item_id";
            $update_result = mysqli_query($connection, $update_query);
            if (!$update_result) {
                echo mysqli_error($connection);
                // die("Product could not be updated!" . " " . mysqli_error($connection));
            } else {
                echo '<div class="alert alert-success w-100" role="alert">Product details updated!</div>';
            }
            //  else {
            //     if (move_uploaded_file($item_image_temp, $folder)) {
            //         $msg = "Image added";
            //         echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            //     } else {
            //         $msg = "Image upload failed";
            //         echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
            //     }
            //     
            // }
        }
        // Delete Function
        if (isset($_POST['delete'])) {
            $item_id = $_POST['item_id'];
            $delete_query = "DELETE FROM `items` WHERE `item_id` = $item_id";
            $delete_result = mysqli_query($connection, $delete_query);
            if (!$delete_result) {
                die("UPDATE QUERY FAILED!" . mysqli_error($connection));
            } else {
                echo '<div class="alert alert-success" role="alert">Product Deleted!</div>';
            }
        }

        // Fetch Product Details
        if (isset($_POST['edit'])) {
            $item_id = $_POST['item_id'];
            // $item_image = $_POST['item_image'];
            $item_name = $_POST['item_name'];
            $item_weight = $_POST['item_weight'];
            $item_description = $_POST['item_description'];
            $item_ingredients = $_POST['item_ingredients'];
            $item_benefits = $_POST['item_benefits'];
            $item_usage = $_POST['item_usage'];
            $item_price = $_POST['item_price'];
            $item_category = $_POST['item_category'];
            $item_status = $_POST['item_status'];

            $fetch_item_query = "SELECT * FROM `items` WHERE `item_id` = $item_id";
            $get_item = mysqli_query($connection, $fetch_item_query);
            while ($row = mysqli_fetch_assoc($get_item)) {
                $item_id = $row['item_id'];
                // $item_image = $row['item_image'];
                $item_name = $row['item_name'];
                $item_weight = $row['item_weight'];
                $item_description = $row['item_description'];
                $item_ingredients = $row['item_ingredients'];
                $item_benefits = $row['item_benefits'];
                $item_usage = $row['item_usage'];
                $item_price = $row['item_price'];
                $item_category = $row['item_category'];
                $item_status = $row['item_status'];

        ?>
        <p class="section-heading">Edit Product</p>
        <p class="section-details">Edit product details below or delete the product</p>

        <form action="" method="POST" class="admin-form-section" enctype="multipart/form-data">
            <!-- <div class="form-inner-row mt-3 mb-3">
        <img src="assets/images/products/<?php echo $item_image ?>" alt="">
        <div class="w-100 upload-section">
            <input type="file" name="item_image" value="<?php echo $item_image ?>" class="form-control edit-image"
                id="inputGroupFile01" placeholder="<?php echo $item_image ?>">
        </div>
    </div> -->

            <div class="form-floating mb-3 w-100">
                <input type="text" name="item_id" hidden class="form-control" value="<?php echo $item_id; ?>"
                    id="floatingInput" placeholder="<?php echo $item_id; ?>">
                <input type="text" name="item_name" class="form-control" value="<?php echo $item_name; ?>"
                    id="floatingInput" placeholder="<?php echo $item_name; ?>">
                <label for="floatingInput">Product Name</label>
            </div>

            <div class="form-floating mb-3 w-100">
                <input type="text" name="item_weight" value="<?php echo $item_weight; ?>" class="form-control"
                    id="floatingInput" placeholder="<?php echo $item_weight; ?>">
                <label for="floatingInput">Product Weight</label>
            </div>

            <div class="mb-3 w-100">
                <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                <textarea name="item_description" maxlength="2000" placeholder="" class="form-control"
                    id="exampleFormControlTextarea1" rows="5"><?php echo $item_description; ?></textarea>
                <div class="mt-2 mb-3">Max Character Limit: 2000</div>
            </div>

            <div class="mb-3 w-100">
                <label for="exampleFormControlTextarea1" class="form-label">Product Ingredients</label>
                <textarea name="item_ingredients" maxlength="400" placeholder="" class="form-control"
                    id="exampleFormControlTextarea1" rows="5"><?php echo $item_ingredients; ?></textarea>
                <div class="mt-2 mb-3">Max Character Limit: 400</div>
            </div>

            <div class="mb-3 w-100">
                <label for="exampleFormControlTextarea1" class="form-label">Benefits</label>
                <textarea name="item_benefits" maxlength="2000" placeholder="" class="form-control"
                    id="exampleFormControlTextarea1" rows="5"><?php echo $item_benefits; ?></textarea>
                <div class="mt-2 mb-3">Max Character Limit: 2000</div>
            </div>

            <div class="mb-3 w-100">
                <label for="exampleFormControlTextarea1" class="form-label">Usage</label>
                <textarea name="item_usage" maxlength="2000" placeholder="" class="form-control"
                    id="exampleFormControlTextarea1" rows="5"><?php echo $item_usage; ?></textarea>
                <div class="mt-2 mb-3">Max Character Limit: 2000</div>
            </div>

            <!-- <div class="form-floating mb-5 w-100">
        <input type="text" name="item_ingredients" maxlength="400" class="form-control"
            value="<?php echo $item_ingredients; ?>" id="floatingInput"
            placeholder="<?php echo $item_ingredients; ?>" style="height: 100px">
        <label for="floatingInput">Product Ingredients</label>
        <div class="mt-2 mb-3">Max Character Limit: 400</div>
    </div> -->

            <!-- <div class="form-floating w-100 mb-5">
        <input type="text" name="item_benefits" maxlength="2000" class="form-control"
            value="<?php echo $item_benefits; ?>" id="floatingInput" placeholder="<?php echo $item_benefits; ?>"
            style="height: 100px;">
        <label for="floatingInput">Benefits</label>
        <div class="mt-2 mb-3">Max Character Limit: 2000</div>
    </div> -->

            <!-- <div class="form-floating w-100 mb-5">
        <input type="text" name="item_usage" maxlength="2000" class="form-control"
            value="<?php echo $item_usage; ?>" id="floatingInput" placeholder="<?php echo $item_usage; ?>"
            style="height: 100px;">
        <label for="floatingInput">Usage</label>
        <div class="mt-2 mb-3">Max Character Limit: 2000</div>
    </div> -->

            <div class="form-floating w-100 mb-3">
                <input type="number" name="item_price" class="form-control" value="<?php echo $item_price; ?>"
                    id="floatingInput" placeholder="₹<?php echo $item_price; ?>">
                <label for="floatingInput">Price</label>
            </div>


            <div class="form-floating w-100 mb-3">
                <select class="form-select" id="floatingSelect" name="item_category"
                    aria-label="Floating label select example">
                    <option selected><?php echo $item_category; ?></option>
                    <?php
                            include 'includes/server/config.php';
                            $category = mysqli_query($connection, "SELECT category_name From category");
                            while ($product_categoty = mysqli_fetch_array($category)) {
                                echo "<option name='item_category' value='" . $product_categoty['category_name'] . "'>" . $product_categoty['category_name'] . "</option>";  // displaying data in option menu
                            }
                            ?>
                </select>
                <label for="floatingSelect">Add into Category</label>
            </div>


            <div class="form-floating">
                <select class="form-select" name="item_status" id="floatingSelect"
                    aria-label="Floating label select example">
                    <?php if ($item_status == '1') {
                                $item_status = "In Stock";
                            } else if ($item_status == '2') {
                                $item_status = "Out of Stock";
                            ?>
                    <option selected><?php echo $item_status ?></option>
                    <?php } ?>
                    <option name="item_status" value="1">In Stock</option>
                    <option name="item_status" value="2">Out of Stock</option>
                </select>
                <label for="floatingSelect">Product Status</label>
            </div>

            <div class="admin-section-row mt-3">
                <button type="submit" name="update" value="update" class="btn btn-primary update-button">Update</button>

                <button type="submit" name="delete" value="delete" class="btn btn-primary edit-button">Delete</button>
            </div>
        </form>
        <?php
            }
        }
        ?>
    </div>
</div>
<?php include('includes/footer.php') ?>