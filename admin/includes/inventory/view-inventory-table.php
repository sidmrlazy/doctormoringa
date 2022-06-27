<div class="container section-wrapper">
    <p class="section-heading">View all products</p>
    <p class="section-details">View | Edit | Delete products in your inventory added by you</p>
    <?php
    // QUERY TO FETCH INVENTORY
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
            $item_description = $row['item_description'];
            $item_benefits = $row['item_benefits'];
            $item_usage = $row['item_usage'];
            $item_name = $row['item_name'];
            $item_price = $row['item_price'];

            if ($previous_category !== $item_category) {
                $previous_category = $item_category;
            }
    ?>
    <!-- ==================== DISPLAYING PRODUCTS ==================== -->
    <form action="edit-item.php" method="POST" action="admin-section-card">
        <!-- ==================== HIDDEN ELEMENTS FOR SENDING VALUES TO EDIT ==================== -->
        <input type="text" hidden name="item_image" value="<?php echo $item_image ?>">
        <input type="text" hidden name="item_id" value="<?php echo $item_id ?>">
        <input type="text" hidden name="item_category" value="<?php echo $item_category ?>">
        <input type="text" hidden name="item_usage" value="<?php echo $item_usage ?>">
        <input type="text" hidden name="item_description" value="<?php echo $item_description ?>">
        <input type="text" hidden name="item_benefits" value="<?php echo $item_benefits ?>">
        <input type="text" hidden name="item_ingredients" value="<?php echo $item_ingredients ?>">
        <input type="text" hidden name="item_price" value="<?php echo $item_price ?>">
        <input type="text" hidden name="item_weight" value="<?php echo $item_weight ?>">
        <!-- ==================== DISPLAYING PRODUCT IMAGE AND NAME ==================== -->
        <div class="admin-section-row-start">
            <img class="admin-section-img-20-bordered mr-5" src="assets/images/products/<?php echo $item_image ?>">
            <div class="admin-section-col-start">
                <input class="admin-input product" type="text" name="item_name" value="<?php echo $item_name ?>">
                <input class="admin-input category" type="text" name="item_category"
                    value="<?php echo $item_category ?>">
                <button class="btn btn-primary confirm-button-md" name="edit" value="edit" type="submit">Edit
                    Product
                    Details</button>
            </div>
        </div>
    </form>
    <!-- ==================== DISPLAYING PRODUCTS ==================== -->

    <?php
        }
    }
    // IF NO INVENTORY FOUND THEN DISPLAYING LOTTIE
    else {
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