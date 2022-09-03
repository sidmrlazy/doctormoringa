<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>


    <div class="container section-container">
        <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
        <p>Click on the image box to change image</p>

        <?php
        include('includes/server/config.php');

        if (isset($_POST['update_1'])) {
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
                if (!move_uploaded_file($item_image_temp, $folder)) {
                    die("<div class='alert w-100 alert-danger' role='alert'>Error changing Image 1</div>");
                } else {
                    echo "<div class='alert w-100 alert-success' role='alert'>Success</div>";
                }
            }
        }

        if (isset($_POST['update_2'])) {
            $item_id = $_POST['item_id'];

            $item_image_2 = $_FILES["item_image_2"]["name"];
            $item_image_2_temp = $_FILES["item_image_2"]["tmp_name"];
            $folder_2 = "assets/images/products/" . $item_image_2;

            $update_query = "UPDATE `items` SET `item_image_2`='$item_image_2' WHERE `item_id` = $item_id";
            $update_result = mysqli_query($connection, $update_query);
            if (!$update_result) {
                echo mysqli_error($connection);
                // die("Product could not be updated!" . " " . mysqli_error($connection));
            } else {
                if (!move_uploaded_file($item_image_2_temp, $folder_2)) {
                    die("<div class='alert w-100 alert-danger' role='alert'>Error changing Image 2</div>");
                } else {
                    echo "<div class='alert w-100 alert-success' role='alert'>Success</div>";
                }
            }
        }

        if (isset($_POST['update_3'])) {
            $item_id = $_POST['item_id'];

            $item_image_3 = $_FILES["item_image_3"]["name"];
            $item_image_3_temp = $_FILES["item_image_3"]["tmp_name"];
            $folder_3 = "assets/images/products/" . $item_image_3;

            $update_query = "UPDATE `items` SET `item_image_3`='$item_image_3' WHERE `item_id` = $item_id";
            $update_result = mysqli_query($connection, $update_query);
            if (!$update_result) {
                echo mysqli_error($connection);
                // die("Product could not be updated!" . " " . mysqli_error($connection));
            } else {
                if (!move_uploaded_file($item_image_3_temp, $folder_3)) {
                    die("<div class='alert w-100 alert-danger' role='alert'>Error changing Image 3</div>");
                } else {
                    echo "<div class='alert w-100 alert-success' role='alert'>Success</div>";
                }
            }
        }

        if (isset($_POST['update_4'])) {
            $item_id = $_POST['item_id'];

            $item_image_4 = $_FILES["item_image_4"]["name"];
            $item_image_4_temp = $_FILES["item_image_4"]["tmp_name"];
            $folder_4 = "assets/images/products/" . $item_image_4;

            $update_query = "UPDATE `items` SET `item_image_4`='$item_image_4' WHERE `item_id` = $item_id";
            $update_result = mysqli_query($connection, $update_query);
            if (!$update_result) {
                echo mysqli_error($connection);
                // die("Product could not be updated!" . " " . mysqli_error($connection));
            } else {
                if (!move_uploaded_file($item_image_4_temp, $folder_4)) {
                    die("<div class='alert w-100 alert-danger' role='alert'>Error changing Image 4</div>");
                } else {
                    echo "<div class='alert w-100 alert-success' role='alert'>Success</div>";
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
                $item_image_2 = "assets/images/products/" . $row['item_image_2'];
                $item_image_3 = "assets/images/products/" . $row['item_image_3'];
                $item_image_4 = "assets/images/products/" . $row['item_image_4'];
        ?>
        <div class="section-flex">
            <div class="card p-3 m-1 col-md-6">
                <div class="image-upload-grid">

                    <form method="POST" enctype="multipart/form-data" action="" class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>
                            <img src="<?php echo $item_image ?>" alt="" class="edit-update-img">
                            <input type="file" name="item_image" value="<?php echo $item_image ?>"
                                class="form-control edit-img-upload-btn">
                        </div>
                        <button type="submit" name="update_1" class="btn btn-sm btn-success">Change</button>
                    </form>

                    <form method="POST" enctype="multipart/form-data" action="" class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>
                            <img src="<?php echo $item_image_2 ?>" alt="" class="edit-update-img">
                            <input type="file" name="item_image_2" value="" class="form-control edit-img-upload-btn">
                        </div>
                        <button type="submit" name="update_2" class="btn btn-sm btn-success">Change</button>
                    </form>

                    <form method="POST" enctype="multipart/form-data" action="" class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>
                            <img src="<?php echo $item_image_3 ?>" alt="" class="edit-update-img">
                            <input type="file" name="item_image_3" value="" class="form-control edit-img-upload-btn">
                        </div>
                        <button type="submit" name="update_3" class="btn btn-sm btn-success">Change</button>
                    </form>

                    <form method="POST" enctype="multipart/form-data" action="" class="image-upload-box form-floating">
                        <div class="input-group mb-3">
                            <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>
                            <img src="<?php echo $item_image_4 ?>" alt="" class="edit-update-img">
                            <input type="file" name="item_image_4" value="" class="form-control edit-img-upload-btn">
                        </div>
                        <button type="submit" name="update_4" class="btn btn-sm btn-success">Change</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="w-100">
            <form action="" method="POST" class="edit-update-img" enctype="multipart/form-data">
                <p>Product Image 1</p>
                <img src="<?php echo $item_image ?>" alt="">
                <button>Update Image 1</button>
            </form>

            <form action="" method="POST" enctype="multipart/form-data">
                <p>Product Image 2</p>
                <img src="<?php echo $item_image_2 ?>" alt="">
            </form>

            <form action="" method="POST" enctype="multipart/form-data">
                <p>Product Image 3</p>
                <img src="<?php echo $item_image_3 ?>" alt="">
            </form>

            <form action="" method="POST" enctype="multipart/form-data">
                <p>Product Image 4</p>
                <img src="<?php echo $item_image_4 ?>" alt="">
            </form>
        </div> -->
        <!-- <form action="" method="POST" class="card p-4 col-md-8 mt-3" enctype="multipart/form-data">
            <img src="<?php echo $item_image ?>" alt="" class="edit-update-img">

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

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload New Image</label>
                <input class="form-control" type="file" name="item_image" id="formFile">
                <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
            </div>
            <button type="submit" name="update" class="update-button">Update Image</button>
        </form> -->
        <?php
            }
        }
        ?>
    </div>
</div>


<?php include('includes/footer.php') ?>