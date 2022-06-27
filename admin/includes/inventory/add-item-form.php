<div class="container section-wrapper">
    <p class="section-heading">Add New Product</p>
    <p class="section-details">Add products in your inventory for customers to shop</p>
    <form class="card p-5" method="POST" enctype="multipart/form-data">
        <?php
        include 'includes/server/config.php';
        if (isset($_POST['submit'])) {
            $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
            $item_weight = mysqli_real_escape_string($connection, $_POST['item_weight']);
            $item_description = mysqli_real_escape_string($connection, $_POST['item_description']);
            $item_ingredients = mysqli_real_escape_string($connection, $_POST['item_ingredients']);
            $item_benefits = mysqli_real_escape_string($connection, $_POST['item_benefits']);
            $item_usage = mysqli_real_escape_string($connection, $_POST['item_usage']);

            $item_image = $_FILES["item_image"]["name"];
            $item_image_temp = $_FILES["item_image"]["tmp_name"];
            $folder = "assets/images/products/" . $item_image;

            $item_price = mysqli_real_escape_string($connection, $_POST['item_price']);
            $item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
            $item_status = 1;

            $query = "INSERT INTO items (
                    item_name,
                    item_weight,
                    item_description, 
                    item_ingredients,
                    item_benefits,
                    item_usage,
                    item_image,
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
                        '$item_category',
                        '$item_price',
                        '$item_status'                        
                        )";
            $result = mysqli_query($connection, $query);

            if (move_uploaded_file($item_image_temp, $folder)) {
                $msg = "Image added";
                echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            } else {
                $msg = "Image upload failed";
                echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
            }

            if ($result) {
                $msg = "Item Added in Inventory";
                echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            } else {
                echo "<div class='alert w-100 alert-danger w-100' role='alert'>Upload Failed!</div>";
            }
        }

        ?>
        <label class="text-left w-100" for="floatingInput">Product Front Image</label>
        <div class="input-group mb-3">
            <input type="file" name="item_image" value="" class="form-control" id="inputGroupFile01">

        </div>

        <div class="form-floating mb-3 w-100">
            <input type="text" name="item_name" class="form-control" id="floatingInput" placeholder="Full Name">
            <label for="floatingInput">Product Name</label>
        </div>

        <div class="form-floating mb-3 w-100">
            <input type="text" name="item_weight" class="form-control" id="floatingInput"
                placeholder="gm/kg/ml/ltr/box">
            <label for="floatingInput">Product Weight</label>
        </div>

        <div class="form-floating w-100 mb-3">
            <textarea maxlength="150" class="form-control" type="text" name="item_description"
                placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Description</label>
            <div class="mt-2">Max Character Limit: 150</div>
        </div>

        <div class="form-floating w-100 mb-3">
            <textarea maxlength="100" class="form-control" type="text" name="item_ingredients"
                placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Ingredients</label>
            <div class="mt-2">Max Character Limit: 100</div>

        </div>

        <div class="form-floating w-100 mb-3">
            <textarea maxlength="150" class="form-control" type="text" name="item_benefits"
                placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Benefits</label>
            <div class="mt-2">Max Character Limit: 150</div>
        </div>

        <div class="form-floating w-100 mb-3">
            <textarea maxlength="150" class="form-control" type="text" name="item_usage"
                placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Usage</label>
            <div class="mt-2">Max Character Limit: 150</div>
        </div>

        <div class="input-group mb-3 w-100">
            <span class="input-group-text">₹</span>
            <input type="text" name="item_price" class="form-control" placeholder="MRP"
                aria-label="Dollar amount (with dot and two decimal places)">
        </div>

        <div class="form-floating w-100 mb-3">
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
        <button type="submit" name="submit" class="btn btn-primary confirm-button">Add</button>
    </form>
</div>