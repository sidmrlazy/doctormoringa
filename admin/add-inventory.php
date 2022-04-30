<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container mt-5 w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-6" id="add-users">
        <form class="single-input-form" method="POST" enctype="multipart/form-data">
            <?php
            include 'includes/server/config.php';
            if (isset($_POST['submit'])) {
                $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
                $item_description = mysqli_real_escape_string($connection, $_POST['item_description']);
                $item_filename = $_FILES["item_filename"]["name"];
                $item_temp_filename = $_FILES["item_filename"]["tmp_name"];
                $folder = "assets/images/uploaded/" . $item_filename;

                $query = "INSERT INTO inventory (
                    item_name, 
                    item_description,
                    item_filename
                    ) VALUES (
                        '$item_name',
                        '$item_description',
                        '$item_filename'
                        )";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
                } else {
                    if (move_uploaded_file($item_temp_filename, $folder)) {
                        $msg = "Image uploaded successfully";
                    } else {
                        $msg = "Failed to upload image";
                    }
                    echo "<div class='alert alert-success' role='alert'>Category Added!</div>";
                }
            }

            ?>
            <div class="input-group mb-3">
                <input type="file" name="item_filename" value="" class="form-control" id="inputGroupFile02">
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="item_name" class="form-control" id="floatingInput" placeholder="Full Name">
                <label for="floatingInput">Category Name</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" type="text" name="item_description"
                    placeholder="Add Category Description" id="floatingTextarea2" style="height: 150px"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary custom-form-button">Add</button>
        </form>
    </div>

    <div class="col-md-6 lottie-container">
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_zzasoagh.json" background="transparent"
            speed="1" class="lottie" loop autoplay></lottie-player>
    </div>
</div>
<?php include('includes/footer.php') ?>