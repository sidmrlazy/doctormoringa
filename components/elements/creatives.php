<div class="container-fluid section-wrapper section-background mt-5 mb-5 w-100">


    <div class="custom-image-wrapper">
        <?php
        $query = "SELECT * FROM web_images LIMIT 4";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $web_img_name = "admin/assets/images/web-imgs/" . $row['web_img_name']; ?>
        <img src="<?php echo $web_img_name ?>" class="wrapper-image img-fluid w-100" alt="<?php echo $web_img_name ?>">

        <?php
        }
        ?>
    </div>


</div>