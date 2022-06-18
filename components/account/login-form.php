<div class="container register-section">
    <div class="col-md-6">
        <div class="register-header">
            <h1>Login </h1>
            <p>New User? <span><a href="register">Register Here </a></span></p>
        </div>
        <?php

        // Check if the user is already logged in, if yes then redirect him to welcome page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: welcome.php");
            exit;
        }

        // Include config file
        require_once "server/config.php";

        // Define variables and initialize with empty values
        $user_contact = $user_password = "";
        $user_contact_err = $user_password_err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["user_contact"]))) {
                $user_contact_err = "Please enter username.";
            } else {
                $user_contact = trim($_POST["user_contact"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["user_password"]))) {
                $user_password_err = "Please enter your password.";
            } else {
                $user_password = trim($_POST["user_password"]);
            }

            // echo  " Contact " . $user_contact . " Password " . $user_password;
            // Validate credentials
            if (empty($user_contact_err) && empty($user_password_err)) {
                // Prepare a select statement

                $res = mysqli_query($connection, "SELECT user_id, user_contact, user_password, user_name FROM user WHERE user_contact ='$user_contact' and user_password='$user_password'");
                $check_user = mysqli_num_rows($res);
                if ($check_user > 0) {
                    $row = mysqli_fetch_assoc($res);
                    $_SESSION['USER_LOGIN'] = 'yes';
                    $_SESSION['USER_ID'] = $row['user_id'];
                    $_SESSION['user_contact'] = $row['user_contact'];
                    $_SESSION['user_name'] = $row['user_name'];

                    // if (isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID'] != '') {
                    //     wishlist_add($connection, $_SESSION['USER_ID'], $_SESSION['WISHLIST_ID']);
                    //     unset($_SESSION['WISHLIST_ID']);
                    // }
                    // echo "valid";

                    $_SESSION["loggedin"] = true;
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["user_contact"] = $row['user_contact'];
                    $_SESSION["user_name"] = $row['user_name'];
                    // Redirect user to welcome page
                    // header("location: index.php");
                    echo "<div class='alert alert-success' role='alert'>
                    Logged In!.
                    </div>";
                    // header("location: index");
                    return true;
                } else {
                    $login_err = "Invalid username or password.";
                }


                // $sql = "SELECT user_id, user_contact, user_password, user_name FROM user WHERE user_contact = ?";

                // if ($stmt = mysqli_prepare($connection, $sql)) {
                //     // Bind variables to the prepared statement as parameters
                //     mysqli_stmt_bind_param($stmt, "s", $param_user_contact);

                //     // Set parameters
                //     $param_user_contact = $user_contact;

                //     // Attempt to execute the prepared statement
                //     if (mysqli_stmt_execute($stmt)) {
                //         // Store result
                //         mysqli_stmt_store_result($stmt);

                //         // Check if username exists, if yes then verify password
                //         if (mysqli_stmt_num_rows($stmt) == 1) {
                //             // Bind result variables
                //             mysqli_stmt_bind_result($stmt, $id, $user_contact, $hashed_password);
                //             if (mysqli_stmt_fetch($stmt)) {
                //                 if (password_verify($user_password, $hashed_password)) {
                //                     // Password is correct, so start a new session
                //                     // session_start();

                //                     // Store data in session variables
                //                     $_SESSION["loggedin"] = true;
                //                     $_SESSION["user_id"] = $id;
                //                     $_SESSION["user_contact"] = $user_contact;

                //                     // Redirect user to welcome page
                //                     // header("location: index.php");
                //                     echo "<div class='alert alert-success' role='alert'>
                //                     Logged In! Start shopping.
                //                   </div>";
                //                 } else {
                //                     // Password is not valid, display a generic error message
                //                     $login_err = "Invalid username or password.";
                //                 }
                //             }
                //         } else {
                //             // Username doesn't exist, display a generic error message
                //             $login_err = "Invalid username or password.";
                //         }
                //     } else {
                //         echo "Oops! Something went wrong. Please try again later.";
                //     }

                //     // Close statement
                //     mysqli_stmt_close($stmt);
                // }
            }

            // Close connection
            mysqli_close($connection);
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-floating mb-3">
                <input name="user_contact" type="text"
                    class="form-control <?php echo (!empty($user_contact_err)) ? 'is-invalid' : ''; ?>"
                    id="floatingInput" value="<?php echo $user_contact; ?>" placeholder="user_contact">
                <label for="floatingInput">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input name="user_password" type="password"
                    class="form-control <?php echo (!empty($user_password_err)) ? 'is-invalid' : ''; ?>"
                    id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div>
                <button class="register-btn" type="submit" value="Login" name="submit">LOGIN</button>
            </div>

            <!-- <div class="register-header">
                <p>Forgot Password?<span><a href="regiser">Click Here </a></span></p>
            </div> -->

        </form>
    </div>

    <div class="col-md-6 register-section-banner">
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_xlmz9xwm.json" background="transparent"
            speed="1" class="newletter-lottie" loop autoplay></lottie-player>
    </div>

</div>