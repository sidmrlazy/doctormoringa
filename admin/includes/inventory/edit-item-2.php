<div class="container mt-5 w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-12">
        <form class="single-input-form" method="POST" enctype="multipart/form-data">
            <?php
            include 'includes/server/config.php';

            // Delete Function
            if (isset($_POST['delete'])) {
                $item_id = $_POST['item_id'];
                $delete_query = "DELETE FROM items WHERE `item_id` = $item_id";
                $delete_result = mysqli_query($connection, $delete_query);
                if (!$delete_result) {
                    die("UPDATE QUERY FAILED!" . mysqli_error($connection));
                } else {
                    echo '<div class="alert alert-success" role="alert">
                              Product Deleted!
                            </div>';
                }
            }

            // Update Function
            if (isset($_POST['update'])) {
                $item_id = $_POST['item_id'];
                $item_id = $_POST['item_id'];
                $item_name = $_POST['item_name'];
                $item_weight = $_POST['item_weight'];
                $item_description = $_POST['item_description'];
                $item_ingredients = $_POST['item_ingredients'];
                $item_benefits = $_POST['item_benefits'];
                $item_usage = $_POST['item_usage'];
                $item_price = $_POST['item_price'];
                $item_category = $_POST['item_category'];
                $item_status = $_POST['item_status'];

                $item_image = $_FILES["item_image"]["name"];
                $item_image_temp = $_FILES["item_image"]["tmp_name"];
                $folder = "assets/images/products/" . $item_image;

                $update_query = "UPDATE `items` SET 
                          `item_id`='$item_id',
                          `item_image`='$item_image',
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
                    die("UPDATE QUERY FAILED!" . mysqli_error($connection));
                } else {
                    if (move_uploaded_file($item_image_temp, $folder)) {
                        $msg = "Image added";
                        echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
                    } else {
                        $msg = "Image upload failed";
                        echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
                    }
                    echo '<div class="alert alert-success w-100" role="alert">
                              Product details updated!
                            </div>';
                }
            }

            // Fetch Product Details
            if (isset($_POST['edit'])) {
                $item_id = $_POST['item_id'];
                $item_image = $_POST['item_image'];
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
                    $item_image = $row['item_image'];
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

            <div class="form-floating mb-3 w-100 edit-image-box">
                <img src="assets/images/products/<?php echo $item_image ?>" alt="">
                <p class="text-left w-100">Click here to change Product Image</p>
                <input type="file" name="item_image" value="" class="form-control edit-image" id="inputGroupFile01">
            </div>

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

            <div class="form-floating mb-3 w-100">
                <input type="text" name="item_description" class="form-control" value="<?php echo $item_description; ?>"
                    id="floatingInput" placeholder="<?php echo $item_description; ?>" style="height: 100px">
                <label for="floatingInput">Product Description</label>
            </div>

            <div class="form-floating mb-3 w-100">
                <input type="text" name="item_ingredients" class="form-control" value="<?php echo $item_ingredients; ?>"
                    id="floatingInput" placeholder="<?php echo $item_ingredients; ?>" style="height: 100px">
                <label for="floatingInput">Product Ingredients</label>
            </div>

            <div class="form-floating w-100 mb-3">
                <input type="text" name="item_benefits" class="form-control" value="<?php echo $item_benefits; ?>"
                    id="floatingInput" placeholder="<?php echo $item_benefits; ?>" style="height: 100px;">
                <label for="floatingInput">Benefits</label>
            </div>

            <div class="form-floating w-100 mb-3">
                <input type="text" name="item_usage" class="form-control" value="<?php echo $item_usage; ?>"
                    id="floatingInput" placeholder="<?php echo $item_usage; ?>" style="height: 100px;">
                <label for="floatingInput">Usage</label>
            </div>

            <div class="form-floating w-100 mb-3">
                <input type="text" name="item_price" class="form-control" value="<?php echo $item_price; ?>"
                    id="floatingInput" placeholder="₹<?php echo $item_price; ?>">
                <label for="floatingInput">Price</label>
            </div>


            <div class="form-floating w-100">
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


            <div class="edit-form-btn-section">
                <button type="submit" name="update" value="update"
                    class="btn btn-primary custom-form-button">Update</button>

                <button type="submit" name="delete" value="delete"
                    class="btn btn-primary delete-button-edit">Delete</button>
            </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
</div>