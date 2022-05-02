<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-6 card add-user-section mb-5" id="add-users">
        <form class="" method="POST">
            <?php
            include 'includes/server/config.php';
            if (isset($_POST['submit'])) {
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $user_confirm_password = $_POST['user_confirm_password'];
                $user_contact = $_POST['user_contact'];
                $user_email = $_POST['user_email'];
                $user_type = $_POST['user_type'];
                if ($user_password != $user_confirm_password) {
                    echo "<div class='alert alert-danger' role='alert'>Passwords do not match</div>";
                } else {
                    $secure_password = password_hash($user_password, PASSWORD_BCRYPT);
                    $query = "INSERT INTO user (
                    user_name, 
                    user_password, 
                    user_contact, 
                    user_email, 
                    user_type) VALUES(
                        '$user_name', 
                        '$secure_password',
                        '$user_contact',
                        '$user_email',
                        '$user_type'
                        )";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>User Added!</div>";
                    }
                }
            }
            ?>
            <div class="form-floating mb-3">
                <input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="Full Name">
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="user_password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="user_confirm_password" id="floatingConfirmPassword"
                    placeholder="Password">
                <label for="floatingConfirmPassword">Confirm Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control noscroll" name="user_contact" id="floatingContact"
                    placeholder="+91 XXXXXXXXXX">
                <label for="floatingContact">Contact Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="user_email" id="floatingEmail" placeholder="abc@xyz.com">
                <label for="floatingEmail">Email</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="user_type" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>----- Choose User Type -----</option>
                    <option name="user_type" value="1">Admin</option>
                    <option name="user_type" value="2">Customer</option>
                    <option name="user_type" value="3">Partner</option>
                </select>
                <label for="floatingSelect">Select User Type</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary custom-form-button">Submit</button>
        </form>
    </div>

    <div class="col-md-6 lottie-container">
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_zzasoagh.json" background="transparent"
            speed="1" class="lottie" loop autoplay></lottie-player>
    </div>
</div>
<?php include('includes/footer.php') ?>