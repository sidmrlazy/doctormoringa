<div class="container inventory-section">
    <?php
    include('includes/server/config.php');

    $query = "SELECT * FROM `items`";
    $get_details = mysqli_query($connection, $query);
    if (@$get_details->num_rows > 0) {
        $previous_category = "";
        while ($row = $get_details->fetch_assoc()) {
            $item_id = $row['item_id'];
            $item_image = $row['item_image'];
            $item_category = $row['item_category'];
            $item_ingredients = $row['item_ingredients'];
            $item_benefits = $row['item_benefits'];
            $item_usage = $row['item_usage'];
            $item_name = $row['item_name'];
            $item_price = $row['item_price'];

            if ($previous_category !== $item_category) {
                $previous_category = $item_category;
            }
    ?>
    <form action="edit-item.php" method="post">
        <div class="invenotry-card">
            <div class="inventory-details">
                <img src="assets/images/products/<?php echo $item_image ?>">
                <input type="text" name="item_name" value="<?php echo $item_name ?>">

                <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
                <input type="text" hidden name="item_category" value="<?php echo $item_category ?>">
                <input type="text" hidden name="item_usage" value="<?php echo $item_usage ?>">
                <input type="text" hidden name="item_benefits" value="<?php echo $item_benefits ?>">
                <input type="text" hidden name="item_ingredients" value="<?php echo $item_ingredients ?>">
                <input type="text" hidden name="item_price" value="<?php echo $item_price ?>">
                <input type="text" hidden name="item_weight" value="<?php echo $item_weight ?>">

                <div class="inventory-btn">
                    <button type="submit" name="edit" value="edit" class="edit-btn">Edit</button>
                    <!-- <button type="submit" name="delete" value="delete" class="del-btn">Delete</button> -->
                </div>
            </div>
        </div>
    </form>
    <?php
        }
    } else {
        ?>
    <div class="no-products">
        <div class="col-md-4 lottie-container">
            <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_oqpbtola.json"
                background="transparent" speed="1" class="lottie" loop autoplay></lottie-player>
        </div>
        <div class='alert alert-danger' role='alert'>
            You havent added any products in your Inventory!
        </div>
    </div>
    <?php
    }
    ?>
</div>