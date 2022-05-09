<div class="container mt-5 w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-6" id="add-users">
        <form class="single-input-form" method="POST" enctype="multipart/form-data">
            <?php
            include 'includes/server/config.php';
            if (isset($_POST['submit'])) {
                $category_image = $_FILES["category_image"]["name"];
                $temp_category_image = $_FILES["category_image"]["tmp_name"];
                $folder = "assets/images/uploaded/" . $category_image;
                $category_name = mysqli_real_escape_string($connection, $_POST['category_name']);
                $category_description = mysqli_real_escape_string($connection, $_POST['category_description']);

                $query = "INSERT INTO category (category_image,category_name, category_description) VALUES ('$category_image', '$category_name','$category_description')";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo "<div class='alert w-100 alert-danger' role='alert'>Something went wrong!</div>";
                } else {
                    if (move_uploaded_file($temp_category_image, $folder)) {
                        $msg = "Image uploaded successfully";
                    } else {
                        $msg = "Failed to upload image";
                    }
                    // echo "<div class='alert alert-success w-100' role='alert'>Item Added!</div>";
                    echo "<div class='alert w-100 alert-success' role='alert'>Category Added!</div>";
                }
            }

            ?>
            <div class="input-group mb-3">
                <input type="file" name="category_image" value="" class="form-control" id="inputGroupFile02">
            </div>
            <div class="form-floating mb-3 w-100">
                <input type="text" name="category_name" class="form-control" id="floatingInput" placeholder="Full Name">
                <label for="floatingInput">Category Name</label>
            </div>

            <div class="form-floating w-100">
                <textarea class="form-control" type="text" name="category_description"
                    placeholder="Add Category Description" id="floatingTextarea2" style="height: 150px"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary custom-form-button">Add</button>
        </form>
    </div>

    <div class="col-md-4 lottie-container">
        <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_ja4nw9sz.json" background="transparent"
            speed="1" class="lottie" loop autoplay></lottie-player>
    </div>
</div>