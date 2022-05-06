<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>
<div class="container register-section">
    <div class="col-md-6">
        <div class="register-header">
            <h1>Create an Account</h1>
            <p>Already have an account? <span><a href="login">Login</a></span></p>
        </div>
        <form action="" method="POST">
            <?php
            if (isset($_POST['submit'])) {
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $user_confirm_password = $_POST['user_confirm_password'];
                $user_contact = $_POST['user_contact'];
                $user_email = $_POST['user_email'];
                $user_type = "2";
                if (
                    $user_name == ""
                ) {
                    echo "<div class='alert alert-danger' role='alert'>Please enter your name!</div>";
                } else if ($user_password == "" || $user_confirm_password == "") {
                    echo "<div class='alert alert-danger' role='alert'>Looks like you missed out the password or confirm password fields!</div>";
                } else if ($user_contact == "") {
                    echo "<div class='alert alert-danger' role='alert'>We need your mobile number!</div>";
                } else {
                    if ($user_password != $user_confirm_password) {
                        echo "<div class='alert alert-danger' role='alert'>Oops! Passwords do not match.</div>";
                    } else {
                        $secure_password = password_hash($user_password, PASSWORD_BCRYPT);
                        $query = "INSERT INTO user (
                                user_name, 
                                user_password, 
                                user_contact, 
                                user_email, 
                                user_type
                                ) VALUES(
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
                            echo "<div class='alert alert-success' role='alert'>Welcome!</div>";
                        }
                    }
                }
            }

            ?>
            <div class="form-floating mb-3">
                <input name="user_name" type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="user_contact" class="form-control" id="floatingContactAddress"
                    placeholder="+91 XXXXXXXXXX">
                <label for="floatingInput">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="user_email" class="form-control" id="floatingEmailAddress"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_confirm_password" class="form-control" id="floatingConfirmPassword"
                    placeholder="Confirm Password">
                <label for="floatingPassword">Confirm Password</label>
            </div>

            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" name="user_tnc" id="flexCheckDefault">
                <label class="form-check-label" name="user_tnc" value="1" for="flexCheckDefault">
                    I agree to Terms & Conditions
                </label>
            </div> -->
            <button type="submit" class="register-btn" value="submit" name="submit">SUBMIT</button>
            <p class="text-center mt-2">By creating this account you accept our Terms & Conditions</p>
        </form>
    </div>

    <div class="col-md-6 register-section-banner">
        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_mjlh3hcy.json" background="transparent"
            speed="1" class="newletter-lottie" loop autoplay></lottie-player>
    </div>

</div>