<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>
<div class="container register-section">
    <div class="col-md-6">
        <div class="register-header">
            <h1>Create an Account</h1>
            <p>Already have an account? <span><a href="login">Login</a></span></p>
        </div>

        <?php

        require_once "server/config.php";

        $user_contact = $user_password = $confirm_user_password = "";
        $user_contact_err = $user_password_err = $confirm_user_password_err = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["user_contact"]))) {
                $user_contact_err = "Please enter User Contact.";
            } else {
                $sql = "SELECT user_id FROM user WHERE user_contact = ?";
                if ($stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $param_user_contact);
                    $param_user_contact = trim($_POST["user_contact"]);
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            $user_contact_err = "This Mobile number is already registered with us. Please Login";
                        } else {
                            $user_contact = trim($_POST["user_contact"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            if (empty(trim($_POST["user_password"]))) {
                $user_password_err = "Please enter a password.";
            } elseif (strlen(trim($_POST["user_password"])) < 6) {
                $user_password_err = "Password must have atleast 6 characters.";
            } else {
                $user_password = trim($_POST["user_password"]);
            }

            if (empty(trim($_POST["confirm_user_password"]))) {
                $confirm_user_password_err = "Please confirm password.";
            } else {
                $confirm_user_password = trim($_POST["confirm_user_password"]);
                if (empty($user_password_err) && ($user_password != $confirm_user_password)) {
                    $confirm_user_password_err = "Password did not match.";
                }
            }

            if (empty($user_contact_err) && empty($user_password_err) && empty($confirm_user_password_err)) {

                $sql = "INSERT INTO user (user_contact, user_password, user_type) VALUES (?, ?, 2)";
                if ($stmt = mysqli_prepare($connection, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ss", $param_user_contact, $param_user_password);
                    $param_user_contact = $user_contact;
                    // $param_user_password = password_hash($user_password, PASSWORD_DEFAULT);
                    $param_user_password = $user_password;
                    if (mysqli_stmt_execute($stmt)) {
                        header("location: login.php");
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            mysqli_close($connection);
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="number" name="user_contact" value="<?php echo $user_contact; ?>"
                    class="form-control <?php echo (!empty($user_contact_err)) ? 'is-invalid' : ''; ?> "
                    id="floatingContactAddress" placeholder="+91 XXXXXXXXXX">
                <label for="floatingInput">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_password" value="<?php echo $user_password; ?>"
                    class="form-control <?php echo (!empty($user_password_err)) ? 'is-invalid' : ''; ?>"
                    id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" value="<?php echo $confirm_user_password; ?>" name="confirm_user_password"
                    class="form-control <?php echo (!empty($confirm_user_password_err)) ? 'is-invalid' : ''; ?>"
                    id="floatingConfirmPassword" placeholder="Confirm Password">
                <label for="floatingPassword">Confirm Password</label>
            </div>

            <!-- <div class="form-floating mb-3">
                <input name="user_name " type="text" class="form-control " id="floatingInput" placeholder="user_name">
                <label for="floatingInput">Full Name</label>
            </div> -->

            <!-- <div class="form-floating mb-3">
                <input type="email" name="user_email" class="form-control" id="floatingEmailAddress"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div> -->


            <!-- <div class="form-floating mb-3">
                <select name="user_state" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>---- Select State ----</option>
                    <option name="user_state" value="UP">One</option>
                    <option name="user_state" value="UK">Two</option>
                    <option name="user_state" value="Kashmir">Three</option>
                </select>
                <label for="floatingSelect">State</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="user_city" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>---- Select City ----</option>
                    <option name="user_city" value="Lucknow">One</option>
                    <option name="user_city" value="Bareilly">Two</option>
                    <option name="user_city" value="Almorah">Three</option>
                </select>
                <label for="floatingSelect">City</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="user_address" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Full Address</label>
            </div>

            <div class="form-floating mb-3">
                <input name="user_pincode" type="text" class="form-control" id="floatingInput"
                    placeholder="Full Address">
                <label for="floatingInput">Pincode</label>
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