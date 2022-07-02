<div class="container section-wrapper">
    <p class="section-heading">Add Homepage Banner</p>
    <p class="section-details">Upload banners on your website, These images will be visible on the index (first page)
        page of your Website. Please note that the size of the image should not be more than (300px X 180px) </p>

    <?php
    include 'includes/server/config.php';
    if (isset($_POST['submit'])) {
        $homepage_banner_status = "0";
        $homepage_banner_img_name = $_FILES["homepage_banner_img_name"]["name"];
        $temp_homepage_banner_img_name = $_FILES["homepage_banner_img_name"]["tmp_name"];
        $folder = "assets/images/web-imgs/" . $homepage_banner_img_name;

        $query = "INSERT INTO `homepage_banners` (homepage_banner_img_name, homepage_banner_status) VALUES ('$homepage_banner_img_name', '$homepage_banner_status')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            echo "<div class='alert w-100 alert-danger' role='alert'>Something went wrong!</div>";
        } else {
            if (move_uploaded_file($temp_homepage_banner_img_name, $folder)) {
                $msg = "Homepage Banner Image uploaded successfully";
                echo "<div class='alert w-100 alert-success' role='alert'>$msg</div>";
            } else {
                $msg = "Failed to upload homepage banner image";
                echo "<div class='alert w-100 alert-danger' role='alert'>$msg</div>";
            }
        }
    }

    ?>

    <form action="" method="POST" class="admin-form-section" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image (300px X 150px)</label>
            <input class="form-control" name="homepage_banner_img_name" type="file" id="formFile">
        </div>

        <button type="submit" name="submit" value="submit" class="confirm-button">Upload</button>
    </form>
</div>