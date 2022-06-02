<div class="container mt-5 w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-6">
        <form class="single-input-form" method="POST" enctype="multipart/form-data">
            <?php
            include 'includes/server/config.php';

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

            // Delete Function
            if (isset($_POST['update'])) {
                $item_id = $_POST['item_id'];
                $item_name = $_POST['item_name'];
                $item_weight = $_POST['item_weight'];
                $item_ingredients = $_POST['item_ingredients'];
                $item_benefits = $_POST['item_benefits'];
                $item_usage = $_POST['item_usage'];
                $item_price = $_POST['item_price'];
                $item_category = $_POST['item_category'];

                $update_query = "UPDATE `items` SET 
                          `item_id`='$item_id',
                          `item_name`='$item_name',
                          `item_weight`='$item_weight',
                          `item_ingredients`='$item_ingredients',
                          `item_benefits`='$item_benefits',
                          `item_category`='$item_usage',
                          `item_price`='$item_price',
                          `item_category`='$item_category' 
                          WHERE `item_id` = $item_id";

                $update_result = mysqli_query($connection, $update_query);

                if (!$update_result) {
                    die("UPDATE QUERY FAILED!" . mysqli_error($connection));
                } else {
                    echo '<div class="alert alert-success" role="alert">
                              Product details updated!
                            </div>';
                }
            }

            // Fetch Product Details
            if (isset($_POST['edit'])) {
                $item_id = $_POST['item_id'];
                $item_name = $_POST['item_name'];
                $item_weight = $_POST['item_weight'];
                $item_ingredients = $_POST['item_ingredients'];
                $item_benefits = $_POST['item_benefits'];
                $item_usage = $_POST['item_usage'];
                $item_price = $_POST['item_price'];
                $item_category = $_POST['item_category'];

                $fetch_item_query = "SELECT * FROM `items` WHERE `item_id` = $item_id";
                $get_item = mysqli_query($connection, $fetch_item_query);

                while ($row = mysqli_fetch_assoc($get_item)) {
                    $item_id = $row['item_id'];
                    $item_name = $row['item_name'];
                    $item_weight = $row['item_weight'];
                    $item_ingredients = $row['item_ingredients'];
                    $item_benefits = $row['item_benefits'];
                    $item_usage = $row['item_usage'];
                    $item_price = $row['item_price'];
                    $item_category = $row['item_category'];
            ?>

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
                <input type="text" name="item_price" class="form-control" value="<?php echo "₹" . $item_price; ?>"
                    id="floatingInput" placeholder="<?php echo "₹" . $item_price; ?>">
                <label for="floatingInput">Price</label>
            </div>


            <div class="form-floating w-100">
                <select class="form-select" id="floatingSelect" name="item_category"
                    aria-label="Floating label select example">
                    <option selected>Select Category</option>
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

    <div class="col-md-4 lottie-container">
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_fu91tpxl.json" background="transparent"
            speed="1" class="lottie" loop autoplay></lottie-player>
    </div>


</div>