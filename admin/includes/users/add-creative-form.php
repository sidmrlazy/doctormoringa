<div class="container section-wrapper">
    <p class="section-heading">Add Creatives</p>
    <p class="section-details">Upload images from social media to display on website. Please note the size of the image
        should not be more than
        600px X 600px</p>

    <?php
    include 'includes/server/config.php';
    if (isset($_POST['submit'])) {
        $web_img_status = "Blocked";
        $web_img_name = $_FILES["web_img_name"]["name"];
        $temp_web_img_name = $_FILES["web_img_name"]["tmp_name"];
        $folder = "assets/images/web-imgs/" . $web_img_name;
        $query = "INSERT INTO web_images (web_img_name, web_img_status) VALUES ('$web_img_name', '$web_img_status')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            echo "<div class='alert w-100 alert-danger' role='alert'>Something went wrong!</div>";
        } else {
            if (move_uploaded_file($temp_web_img_name, $folder)) {
                $msg = "Image uploaded successfully";
                echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            } else {
                $msg = "Failed to upload image";
                echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
            }
        }
    }

    ?>

    <form action="" method="POST" class="admin-form-section" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image (600px X 600px)</label>
            <input class="form-control" name="web_img_name" type="file" id="formFile">
        </div>

        <button type="submit" name="submit" value="submit" class="confirm-button">Upload</button>
    </form>
</div>