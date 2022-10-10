<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="section-container w-100">
        <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">

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
            } else {
                if (!move_uploaded_file($item_image_temp, $folder)) {
                    die("<div class='alert w-100 alert-danger mt-5' role='alert'>Error changing Image 1</div>");
                } else {
                    echo "<div class='alert w-100 alert-success mt-5' role='alert'>Success</div>";
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
            } else {
                if (!move_uploaded_file($item_image_2_temp, $folder_2)) {
                    die("<div class='alert w-100 alert-danger mt-5' role='alert'>Error changing Image 2</div>");
                } else {
                    echo "<div class='alert w-100 alert-success mt-5' role='alert'>Success</div>";
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
            } else {
                if (!move_uploaded_file($item_image_3_temp, $folder_3)) {
                    die("<div class='alert w-100 alert-danger mt-5' role='alert'>Error changing Image 3</div>");
                } else {
                    echo "<div class='alert w-100 alert-success mt-5' role='alert'>Success</div>";
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
            } else {
                if (!move_uploaded_file($item_image_4_temp, $folder_4)) {
                    die("<div class='alert w-100 alert-danger mt-5' role='alert'>Error changing Image 4</div>");
                } else {
                    echo "<div class='alert w-100 alert-success mt-5' role='alert'>Success</div>";
                }
            }
        } ?>

        <div class="admin-inv-grid">
            <?php
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
            <form method="POST" enctype="multipart/form-data" action="" class="admin-inv-box">
                <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>

                <?php if (!file_exists($item_image)) { ?>
                <ion-icon name="image-outline" class="broken-img-icon"></ion-icon>
                <?php } else { ?>
                <img src="<?php echo $item_image ?>" alt="" class="admin-iv-img">
                <?php } ?>

                <div class="mb-1 p-2">
                    <label for="formFile" class="form-label">Click below to upload file</label>
                    <input class="form-control" name="item_image" value="<?php echo $item_image ?>" type="file"
                        id="formFile" placeholder="Click here to upload file">
                </div>
                <div class="p-2 w-100">
                    <button type="submit" name="update_1" class="mb-1 btn btn-outline-success w-100">Change
                        Image</button>
                </div>
            </form>

            <form method="POST" enctype="multipart/form-data" action="" class="admin-inv-box">
                <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>

                <?php if (!file_exists($item_image_2)) { ?>
                <ion-icon name="image-outline" class="broken-img-icon"></ion-icon>
                <?php } else { ?>
                <img src="<?php echo $item_image_2 ?>" alt="" class="admin-iv-img">
                <?php } ?>

                <div class="mb-1 p-2">
                    <label for="formFile" class="form-label">Click below to upload file</label>
                    <input class="form-control" name="item_image_2" value="<?php echo $item_image_2 ?>" type="file"
                        id="formFile" placeholder="Click here to upload file">
                </div>
                <div class="p-2 w-100">
                    <button type="submit" name="update_2" class="mb-1 btn btn-outline-success w-100">Change
                        Image</button>
                </div>
            </form>

            <form method="POST" enctype="multipart/form-data" action="" class="admin-inv-box">
                <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>

                <?php if (!file_exists($item_image_3)) { ?>
                <ion-icon name="image-outline" class="broken-img-icon"></ion-icon>
                <?php } else { ?>
                <img src="<?php echo $item_image_3 ?>" alt="" class="admin-iv-img">
                <?php } ?>
                <div class="mb-1 p-2">
                    <label for="formFile" class="form-label">Click below to upload file</label>
                    <input class="form-control" name="item_image_3" value="<?php echo $item_image_3 ?>" type="file"
                        id="formFile" placeholder="Click here to upload file">
                </div>
                <div class="p-2 w-100">
                    <button type="submit" name="update_3" class="mb-1 btn btn-outline-success w-100">Change
                        Image</button>
                </div>
            </form>


            <form method="POST" enctype="multipart/form-data" action="" class="admin-inv-box">
                <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>

                <?php if (!file_exists($item_image_4)) { ?>
                <ion-icon name="image-outline" class="broken-img-icon"></ion-icon>
                <?php } else { ?>
                <img src="<?php echo $item_image_4 ?>" alt="" class="admin-iv-img">
                <?php } ?>

                <div class="mb-1 p-2">
                    <label for="formFile" class="form-label">Click below to upload file</label>
                    <input class="form-control" name="item_image_4" value="<?php echo $item_image_4 ?>" type="file"
                        id="formFile" placeholder="Click here to upload file">
                </div>
                <div class="p-2 w-100">
                    <button type="submit" name="update_4" class="mb-1 btn btn-outline-success w-100">Change
                        Image</button>
                </div>
            </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>