<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>

<script>
var video = document.getElementById('bannerVid');
console.log(video);
</script>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button> -->
    </div>
    <div class="carousel-inner">
        <a href="shop.php#Beauty" class="carousel-item centered-carousel active" data-bs-interval="3000">
            <img src="assets/images/banners/4.jpeg" class="d-block img-fluid" alt="...">
        </a>
        <a href="shop.php#Beauty" class="carousel-item centered-carousel" data-bs-interval="3000">
            <img src="assets/images/banners/5.jpeg" class="d-block img-fluid" alt="...">
        </a>
        <a href="shop.php#Beauty" class="carousel-item centered-carousel" data-bs-interval="2000">
            <img src="assets/images/banners/6.jpeg" class="d-block img-fluid" alt="...">

        </a>
    </div>
</div>