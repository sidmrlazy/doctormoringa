<div class="container section-wrapper">
    <p class="section-heading">Feedbacks</p>
    <p class="section-details">View all user feedbacks for products</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">USER NAME</th>
                <th scope="col">USER CONTACT</th>
                <th scope="col">ITEM NAME</th>
                <th scope="col">FEEDBACK</th>
                <th scope="col">DATE | TIME</th>
                <th scope="col">FEEDBACK STATUS</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            include('includes/server/config.php');
            $query = "SELECT * FROM `feedback`";
            $get_result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($get_result)) {
                $feedback_user_name = $row['feedback_user_name'];
                $feedback_user_contact = $row['feedback_user_contact'];
                $feedback_item_id = $row['feedback_item_id'];
                $feedback_content = $row['feedback_content'];
                $feedback_date = $row['feedback_date'];
                $feedback_status = $row['feedback_status'];

                $count_query = "SELECT * FROM `items` WHERE `item_id` = $feedback_item_id";
                $count_result = mysqli_query($connection, $count_query);
                while ($row = mysqli_fetch_assoc($$count_result)) {
                    $item_name = $row['item_name'];
                }
            ?>
            <tr>
                <th scope="row"><?php echo $feedback_user_name ?></th>
                <td><?php echo $feedback_user_contact; ?></td>
                <td><?php echo $item_name; ?></td>
                <td><?php echo $feedback_content; ?></td>
                <td><?php echo $feedback_date; ?></td>
                <td><?php
                        if ($feedback_status == "0") {
                            echo 'Live';
                        } elseif ($feedback_status == "1") {
                            echo 'Needs Approval';
                        }
                        ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>