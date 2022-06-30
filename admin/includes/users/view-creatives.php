<div class="container section-wrapper">
    <div class="container w-100 col-md-10 ">
        <p class="section-heading mb-3">View All Creatives</p>

        <div class="wrapper-row">
            <?php
            include 'includes/server/config.php';

            if (isset($_POST['delete'])) {
                $web_img_id = $_POST['web_img_id'];

                $delete_query = "DELETE FROM `web_images` WHERE web_img_id = $web_img_id";
                $delete_result = mysqli_query($connection, $delete_query);

                if (!$delete_result) {
                    echo '<div class="alert alert-danger w-100" role="alert">THERE WAS SOME ERROR!</div>';
                } else {
                    echo '<div class="alert alert-success w-100" role="alert">CREATIVE DELETED!</div>';
                }
            }

            $get_creatives_query = "SELECT * FROM `web_images`";
            $get_creatives_result = mysqli_query($connection, $get_creatives_query);

            while ($row = mysqli_fetch_assoc($get_creatives_result)) {
                $web_img_id = $row['web_img_id'];
                $web_img_name = "assets/images/web-imgs/" . $row['web_img_name'];
            ?>
            <form action="" method="POST" class="wrapper-box-col">
                <input type="text" hidden name="web_img_id" value="<?php echo $web_img_id ?>">
                <img src="<?php echo $web_img_name; ?>" alt="<?php echo $web_img_name; ?>">
                <button type="submit" value="delete" name="delete" class="del-btn-sm">Delete</button>
            </form>
            <?php
            }
            ?>
        </div>


    </div>
</div>