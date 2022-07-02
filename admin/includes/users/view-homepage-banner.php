<div class="container section-wrapper">
    <div class="container w-100 col-md-10 ">
        <p class="section-heading mb-3">View All Creatives</p>

        <div class="wrapper-row">
            <?php
            include 'includes/server/config.php';

            if (isset($_POST['delete'])) {
                $homepage_banner_id = $_POST['homepage_banner_id'];
                $delete_query = "DELETE FROM `homepage_banners` WHERE homepage_banner_id = $homepage_banner_id";
                $delete_result = mysqli_query($connection, $delete_query);
                if (!$delete_result) {
                    echo '<div class="alert alert-danger w-100" role="alert">THERE WAS SOME ERROR!</div>';
                } else {
                    echo '<div class="alert alert-success w-100" role="alert">BANNER DELETED!</div>';
                }
            }

            if (isset($_POST['edit'])) {
                $homepage_banner_id = $_POST['homepage_banner_id'];
                $edit_query = "UPDATE `homepage_banners` SET `homepage_banner_status`='1' WHERE homepage_banner_id = $homepage_banner_id";
                $edit_result = mysqli_query($connection, $edit_query);
                if (!$edit_result) {
                    echo '<div class="alert alert-danger w-100" role="alert">THERE WAS SOME ERROR!</div>';
                } else {
                    echo '<div class="alert alert-success w-100" role="alert">BANNER IS LIVE NOW!</div>';
                }
            }

            if (isset($_POST['block'])) {
                $homepage_banner_id = $_POST['homepage_banner_id'];
                $edit_query = "UPDATE `homepage_banners` SET `homepage_banner_status`='0' WHERE homepage_banner_id = $homepage_banner_id";
                $edit_result = mysqli_query($connection, $edit_query);
                if (!$edit_result) {
                    echo '<div class="alert alert-danger w-100" role="alert">THERE WAS SOME ERROR!</div>';
                } else {
                    echo '<div class="alert alert-success w-100" role="alert">BANNER IS BLOCKED NOW!</div>';
                }
            }
            $get_creatives_query = "SELECT * FROM `homepage_banners`";
            $get_creatives_result = mysqli_query($connection, $get_creatives_query);
            while ($row = mysqli_fetch_assoc($get_creatives_result)) {
                $homepage_banner_id = $row['homepage_banner_id'];
                $homepage_banner_img_name = "assets/images/web-imgs/" . $row['homepage_banner_img_name'];
                $homepage_banner_status = $row['homepage_banner_status'];
            ?>
            <form action="" method="POST" class="wrapper-box-col">
                <input type="text" hidden name="homepage_banner_id" value="<?php echo $homepage_banner_id ?>">
                <img src="<?php echo $homepage_banner_img_name; ?>" alt="<?php echo $homepage_banner_img_name; ?>">
                <div class="d-flex">
                    <button type="submit" value="delete" name="delete" class="del-btn-sm m-2">Delete</button>
                    <?php
                        if ($homepage_banner_status == '0') {
                        ?>
                    <button type="submit" value="edit" name="edit" class="del-btn-sm m-2">Go Live</button>
                    <?php } else if ($homepage_banner_status == '1') { ?>
                    <button type="submit" value="block" name="block" class="del-btn-sm m-2">Block Banner</button>
                    <?php } ?>
                </div>
            </form>
            <?php
            }
            ?>
        </div>


    </div>
</div>