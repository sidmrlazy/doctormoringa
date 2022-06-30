<div class="container section-wrapper mt-5 mb-5">

    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $query = "SELECT * FROM web_images";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $web_img_name = "admin/assets/images/web-imgs/" . $row['web_img_name'];
            ?>
            <div class="carousel-item active">
                <div class="">
                    <img src="<?php echo $web_img_name ?>" class="img-fluid" alt="">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



</div>