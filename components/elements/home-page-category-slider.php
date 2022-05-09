<div class="container mt-4 category-slider">
    <?php
    include('admin/includes/server/config.php');
    $query = "SELECT * FROM category";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category_image = $row['category_image'];
            $category_name =  $row['category_name'];

    ?>
    <div class="inner-card" id="inner-card-pale">
        <img src="assets/images/category-icons/<?php echo $category_image ?>" />
        <!-- <img src="assets/images/category-icons/weight-loss.png" alt=""> -->
        <p class="text-center"><?php echo $category_name; ?></p>
    </div>
    <?php
        }
    }
    ?>
</div>