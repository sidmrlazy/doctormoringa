<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">
        <p>Feedbacks</p>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">USER NAME</th>
                    <th scope="col">USER CONTACT</th>
                    <th scope="col">ITEM NAME</th>
                    <th scope="col">FEEDBACK</th>
                    <th scope="col">DATE | TIME</th>
                    <th scope="col">FEEDBACK STATUS</th>
                    <th scope="col">ACTION</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');

                // CHANGE STATUS TO LIVE
                if (isset($_POST['live'])) {
                    $feedback_id = $_POST['feedback_id'];
                    // $feedback_status = 'Live';
                    // echo "LIVE" . " " . $feedback_id;
                    $change_status_live_query = "UPDATE `feedback` SET `feedback_status` = 'Live'  WHERE feedback_id = $feedback_id";
                    $change_status_live_result = mysqli_query($connection, $change_status_live_query);
                    if (!$change_status_live_result) {
                        echo "<div class='alert alert-danger' role='alert'>ERROR!</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Feedback is now Live!</div>";
                    }
                }

                // CHANGE STATUS TO BLOCK
                if (isset($_POST['block'])) {
                    $feedback_id = $_POST['feedback_id'];
                    $feedback_status = 'Blocked';
                    // echo "BLOCKED" . " " . $feedback_id;
                    $change_status_block_query = "UPDATE `feedback` SET `feedback_status` = 'Blocked'  WHERE feedback_id = $feedback_id";
                    $change_status_block_result = mysqli_query($connection, $change_status_block_query);
                    if (!$change_status_block_result) {
                        echo "<div class='alert alert-danger' role='alert'>ERROR!</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Feedback is Blocked!</div>";
                    }
                }

                // DELETE FEEDBACK
                if (isset($_POST['delete'])) {
                    $feedback_id = $_POST['feedback_id'];
                    $change_status_block_query = "DELETE FROM `feedback` WHERE `feedback_id` = $feedback_id";
                    $change_status_block_result = mysqli_query($connection, $change_status_block_query);
                    if (!$change_status_block_result) {
                        echo "<div class='alert alert-danger' role='alert'>ERROR!</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Feedback Deleted!</div>";
                    }
                }

                // FETCH ALL FEEDBACK
                $query = "SELECT * FROM `feedback`";
                $get_result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($get_result)) {
                    $feedback_id = $row['feedback_id'];
                    $feedback_user_name = $row['feedback_user_name'];
                    $feedback_user_contact = $row['feedback_user_contact'];
                    $feedback_item_id = $row['feedback_item_id'];
                    $feedback_content = $row['feedback_content'];
                    $feedback_date = $row['feedback_date'];
                    $feedback_status = $row['feedback_status'];

                    $query = "SELECT * FROM `items` WHERE `item_id` = $feedback_item_id";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_name = $row['item_name'];



                ?>
                <tr>
                    <form method="POST" action="">
                        <input hidden type="text" name="feedback_id" value="<?php echo $feedback_id ?>">
                        <th scope="row"><?php echo $feedback_user_name ?></th>
                        <td><?php echo $feedback_user_contact; ?></td>
                        <td><?php echo $item_name; ?></td>
                        <td><?php echo $feedback_content; ?></td>
                        <td><?php echo $feedback_date; ?></td>
                        <td><?php echo $feedback_status; ?></td>

                        <td><button type='submit' name='live' value='live' class='table-edit-btn'>Live</button></td>
                        <td><button type='submit' name='block' value='block' class='table-edit-btn'>Block</button></td>
                        <td><button type='submit' name='delete' value='delete' class='table-edit-btn'>Del</button></td>
                    </form>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>