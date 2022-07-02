<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>
<div id="bannerSection" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php
        include('admin/includes/server/config.php');
        $get_banner_query = "SELECT * FROM `homepage_banners` WHERE `homepage_banner_status` = '1'";
        $get_banner_result = mysqli_query($connection, $get_banner_query);

        while ($row = mysqli_fetch_assoc($get_banner_result)) {
            $homepage_banner_img_name = $row['homepage_banner_img_name'];
            $homepage_banner_status = $row['homepage_banner_status'];
            if ($homepage_banner_status == "1") {
        ?>
        <div class="carousel-item active">
            <div class="banner m-3">
                <div class="col-md-12 banner-img">
                    <img src="admin/assets/images/web-imgs/<?php echo $homepage_banner_img_name ?>" alt=""
                        class="img-fluid">
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>

        <!-- <div class="carousel-item active">
            <div class="banner m-3">
                <div class="col-md-6 col-xs-12 banner-content">
                    <h1>Moringa products for healthy life</h1>
                    <p>Sourced directly from the farmers</p>
                </div>
                <div class="col-md-6 banner-img">
                    <img src="assets/images/background/banner-1.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="banner m-3" id="banner-red">
                <div class="col-md-6 col-xs-2 banner-content">
                    <h1>Scientifically researched moringa products</h1>
                    <p>Live a healthier, fitter & beautiful life</p>
                </div>
                <div class="col-md-6 banner-img">
                    <img src="assets/images/background/banner-1.png" alt="" class="img-fluid">
                </div>
            </div>
        </div> -->

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerSection" data-bs-slide="prev">
        <span class="carousel-control-prev-banner" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerSection" data-bs-slide="next">
        <span class="carousel-control-next-banner" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>