<div class="container mt-5">
    <?php
    include('admin/includes/server/config.php');
    $query = "SELECT * FROM `feedback` WHERE feedback_status = 'Live'";
    $result = mysqli_query($connection, $query);

    if ($result == "") {
    ?>
    <div class="feedback-section d-none mt-3">
    </div>
    <?php
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $feedback_item_id = $row['feedback_item_id'];
            $feedback_user_name = $row['feedback_user_name'];
            $feedback_content = $row['feedback_content'];
            $feedback_date = $row['feedback_date'];
            $item_query = "SELECT * FROM `items` WHERE item_id = $feedback_item_id";
            $item_result = mysqli_query($connection, $item_query);
            while ($row = mysqli_fetch_assoc($item_result)) {
                $item_name = $row['item_name'];
                $item_image = "admin/assets/images/products/" . $row['item_image']; ?>
    <h1 class="section-heading">Testimonials</h1>
    <div class="feedback-section mt-3">
        <div class="feedback-product-img">
            <img src="<?php echo $item_image; ?>" alt="<?php echo $item_name; ?>">
        </div>
        <div class="feedback-content">
            <p class="feedback-item"><?php echo $item_name; ?></p>
            <p class="feedback"><?php echo $feedback_content; ?></p>
            <p class="feedback-by">-<?php echo $feedback_user_name; ?></p>
            <p><?php echo $feedback_date; ?></p>
        </div>
    </div>
    <?php
            }
        }
    }


    ?>


</div>