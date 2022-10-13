<div class="container mt-4 category-slider">
    <div class="inner-card-grid-mobile">
        <?php
        include('admin/includes/server/config.php');
        $query = "SELECT * FROM category";
        $result = $connection->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $category_image = $row['category_image'];
            $category_name =  $row['category_name'];
            $new_category_name = trim($category_name, " ");

        ?>

        <a href="shop#<?php echo $category_name  ?>" class="inner-card inner-card-mobile" id="inner-card-pale">
            <img src="assets/images/category-icons/<?php echo $category_image ?>" />
            <p class="text-center"><?php echo $new_category_name; ?></p>
        </a>
        <?php } ?>
    </div>
</div>