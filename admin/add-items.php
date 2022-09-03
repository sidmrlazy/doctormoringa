<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">
        <p class="mb-3">Add Product</p>
        <?php
        include 'includes/server/config.php';
        if (isset($_POST['submit'])) {
            $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
            $item_weight = mysqli_real_escape_string($connection, $_POST['item_weight']);
            $item_description = mysqli_real_escape_string($connection, $_POST['item_description']);
            $item_ingredients = mysqli_real_escape_string($connection, $_POST['item_ingredients']);
            $item_benefits = mysqli_real_escape_string($connection, $_POST['item_benefits']);
            $item_usage = mysqli_real_escape_string($connection, $_POST['item_usage']);

            $item_price = mysqli_real_escape_string($connection, $_POST['item_price']);
            $item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
            $item_status = 1;

            $item_image =  $_FILES['item_image']['name'];
            $item_image_temp = $_FILES['item_image']['tmp_name'];
            $folder = "assets/images/products/" . $item_image;
            $size = filesize($item_image_temp);

            $item_image_2 =  $_FILES['item_image_2']['name'];
            $item_image_temp_2 = $_FILES['item_image_2']['tmp_name'];
            $folder_2 = "assets/images/products/" . $item_image_2;
            $size_2 = filesize($item_image_temp_2);

            $item_image_3 =  $_FILES['item_image_3']['name'];
            $item_image_temp_3 = $_FILES['item_image_3']['tmp_name'];
            $folder_3 = "assets/images/products/" . $item_image_3;
            $size_3 = filesize($item_image_temp_3);

            $item_image_4 =  $_FILES['item_image_4']['name'];
            $item_image_temp_4 = $_FILES['item_image_4']['tmp_name'];
            $folder_4 = "assets/images/products/" . $item_image_4;
            $size_4 = filesize($item_image_temp_4);

            if ($size > 500000) {
                echo "Image 1 Size is larger than 500kb";
            } else if ($size_2 > 500000) {
                echo "Image 2 Size is larger than 500kb";
            } else if ($size_3 > 500000) {
                echo "Image 3 Size is larger than 500kb";
            } else if ($size_4 > 500000) {
                echo "Image 4 Size is larger than 500kb";
            } else {

                if (!move_uploaded_file($item_image_temp, $folder)) {
                    die("<div class='alert  alert-danger' role='alert'>Fail</div>" . mysqli_error($connection));
                }

                if (!move_uploaded_file($item_image_temp_2, $folder_2)) {
                    die("<div class='alert  alert-danger' role='alert'>Fail</div>" . mysqli_error($connection));
                }

                if (!move_uploaded_file($item_image_temp_3, $folder_3)) {
                    die("<div class='alert  alert-danger' role='alert'>Fail</div>" . mysqli_error($connection));
                }

                if (!move_uploaded_file($item_image_temp_4, $folder_4)) {
                    die("<div class='alert  alert-danger' role='alert'>Fail</div>" . mysqli_error($connection));
                }

                $query = "INSERT INTO items (
                           item_name,
                           item_weight,
                           item_description, 
                           item_ingredients,
                           item_benefits,
                           item_usage,
                           item_image,
                           item_image_2,
                           item_image_3,
                           item_image_4,
                           item_category,
                           item_price,
                           item_status                    
                           ) VALUES (
                               '$item_name',
                               '$item_weight',
                               '$item_description',
                               '$item_ingredients',
                               '$item_benefits',
                               '$item_usage',
                               '$item_image',
                               '$item_image_2',
                               '$item_image_3',
                               '$item_image_4',
                               '$item_category',
                               '$item_price',
                               '$item_status'                        
                               )";
                $result = mysqli_query($connection, $query);
            }
        }

        ?>

        <form method="POST" enctype="multipart/form-data" action="" class="section-flex">
            <div class="card p-3 m-1 col-md-6">
                <div class="image-upload-grid">
                    <label class="img-label" for="floatingInput">Upload Product Images</label>
                    <div class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="file" name="item_image" value="" class="form-control img-upload-btn">
                        </div>
                    </div>

                    <div class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="file" name="item_image_2" value="" class="form-control img-upload-btn">
                        </div>
                    </div>

                    <div class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="file" name="item_image_3" value="" class="form-control img-upload-btn">
                        </div>
                    </div>

                    <div class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="file" name="item_image_4" value="" class="form-control img-upload-btn">
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3 ">
                    <input type="text" name="item_name" class="form-control" id="floatingInput" placeholder="Full Name">
                    <label for="floatingInput">Product Name</label>
                </div>

                <div class="form-floating mb-3 ">
                    <input type="text" name="item_weight" class="form-control" id="floatingInput"
                        placeholder="gm/kg/ml/ltr/box">
                    <label for="floatingInput">Product Weight</label>
                </div>

                <div class="form-floating  mb-3">
                    <textarea maxlength="2000" class="form-control" type="text" name="item_description"
                        placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Description</label>
                    <div class="mt-2">Max Character Limit: 2000</div>
                </div>

                <div class="form-floating  mb-3">
                    <textarea maxlength="400" class="form-control" type="text" name="item_ingredients"
                        placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Ingredients</label>
                    <div class="mt-2">Max Character Limit: 400</div>
                </div>
            </div>

            <div class="card p-3 m-1 col-md-6">
                <div class="form-floating  mb-3">
                    <textarea maxlength="2000" class="form-control" type="text" name="item_benefits"
                        placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Benefits</label>
                    <div class="mt-2">Max Character Limit: 2000</div>
                </div>

                <div class="form-floating  mb-3">
                    <textarea maxlength="2000" class="form-control" type="text" name="item_usage"
                        placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Usage</label>
                    <div class="mt-2">Max Character Limit: 2000</div>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text">₹</span>
                    <input type="text" name="item_price" class="form-control" placeholder="MRP"
                        aria-label="Dollar amount (with dot and two decimal places)">
                </div>

                <div class="form-floating  mb-3">
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
                <input type="submit" name="submit" value="Add" class="btn btn-primary confirm-button">
                <!-- <button type="submit" name="submit" class="btn btn-primary confirm-button">Add</button> -->
            </div>
        </form>
    </div>
</div>
<?php include('includes/footer.php') ?>