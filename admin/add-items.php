<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container mt-5 w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-6">
        <form class="single-input-form" method="POST" enctype="multipart/form-data">
            <?php
            include 'includes/server/config.php';
            if (isset($_POST['submit'])) {
                $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
                $item_description = mysqli_real_escape_string($connection, $_POST['item_description']);

                $item_filename = $_FILES["item_filename"]["name"];
                $item_temp_filename = $_FILES["item_filename"]["tmp_name"];
                $folder = "assets/images/uploaded/" . $item_filename;

                $item_back_img = $_FILES["item_filename_back"]["name"];
                $item_back_img_temp = $_FILES["item_filename_back"]["tmp_name"];
                $folder2 = "assets/images/uploaded/" . $item_back_img;

                $item_price = mysqli_real_escape_string($connection, $_POST['item_price']);
                $item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
                $item_status = 1;

                $query = "INSERT INTO items (
                    item_name, 
                    item_description,
                    item_filename,
                    item_filename_back,      
                    item_category,
                    item_price,
                    item_status                    
                    ) VALUES (
                        '$item_name',
                        '$item_description',
                        '$item_filename',
                        '$item_back_img',                        
                        '$item_category',
                        '$item_price',
                        '$item_status'                        
                        )";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    $msg = "Item Added in Inventory";
                    echo "<div class='alert alert-success' role='alert'>$msg</div>";
                } else {
                    echo "<div class='alert alert-danger w-100' role='alert'>Upload Failed!</div>";
                }
            }

            ?>
            <label class="text-left w-100" for="floatingInput">Product Front Image</label>
            <div class="input-group mb-3">
                <input type="file" name="item_filename" value="" class="form-control" id="inputGroupFile01">

            </div>
            <label class="text-left w-100" for="floatingInput">Product Back Image</label>
            <div class="input-group mb-3">
                <input type="file" name="item_filename_back" value="" class="form-control" id="inputGroupFile02">

            </div>
            <div class="form-floating mb-3 w-100">
                <input type="text" name="item_name" class="form-control" id="floatingInput" placeholder="Full Name">
                <label for="floatingInput">Category Name</label>
            </div>

            <div class="form-floating w-100 mb-3">
                <textarea class="form-control" type="text" name="item_description"
                    placeholder="Add Category Description" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>

            <div class="input-group mb-3 w-100">
                <span class="input-group-text">₹</span>
                <input type="text" name="item_price" class="form-control" placeholder="MRP"
                    aria-label="Dollar amount (with dot and two decimal places)">
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

            <button type="submit" name="submit" class="btn btn-primary custom-form-button">Add</button>
        </form>
    </div>

    <div class="col-md-6 lottie-container">
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_zzasoagh.json" background="transparent"
            speed="1" class="lottie" loop autoplay></lottie-player>
    </div>
</div>
<?php include('includes/footer.php') ?>