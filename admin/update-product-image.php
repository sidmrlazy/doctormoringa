<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>


<div class="container section-wrapper">
    <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
    <p class="section-heading">Change Product Image</p>
    <p class="section-details">Upload new product image</p>
    <?php
    include('includes/server/config.php');

    if (isset($_POST['update'])) {
        $item_id = $_POST['item_id'];
        $item_image = $_FILES["item_image"]["name"];
        $item_image_temp = $_FILES["item_image"]["tmp_name"];
        $folder = "assets/images/products/" . $item_image;

        $update_query = "UPDATE `items` SET `item_image`='$item_image' WHERE `item_id` = $item_id";
        $update_result = mysqli_query($connection, $update_query);
        if (!$update_result) {
            echo mysqli_error($connection);
            // die("Product could not be updated!" . " " . mysqli_error($connection));
        } else {
            if (move_uploaded_file($item_image_temp, $folder)) {
                $msg = "Image added";
                echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            } else {
                $msg = "Image upload failed";
                echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
            }
        }
    }


    if (isset($_POST['edit'])) {
        $item_id = $_POST['item_id'];
        $item_image = $_POST['item_image'];

        $query = "SELECT * FROM `items` WHERE item_id = $item_id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['item_id'];
            $item_image = "assets/images/products/" . $row['item_image'];
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <img src="<?php echo $item_image ?>" alt="">
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload New Image</label>
            <input class="form-control" type="file" name="item_image" id="formFile">
            <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
        </div>
        <button type="submit" name="update" class="update-button">Update Image</button>
    </form>
    <?php
        }
    }
    ?>
</div>


<?php include('includes/footer.php') ?>