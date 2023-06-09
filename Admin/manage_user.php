<?php
include('./config.php');
include('./Partials/navbar.php')
?>

<!-- Main containt -->
<div class="main-containt">
    <div class="wrapper">
        <br>
        <h2>Manage Users</h2>

        <br>
        <p>
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>
        </p>
        <br>
        <a href="./add_user.php" class="btn-primary">Add</a>

        <a href="./delete_user.php" class="btn-danger">Delete</a>

        <br>
        <br>
        <table class="table-full">
            <tr>
                <th>Number</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Update users</th>

            </tr>
            <?php
            $sql = "select * from user_form";
            $result = mysqli_query($conn, $sql);
            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);
                $number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $user_type = $row['user_type'];
            ?>

                    <tr>
                        <td><?php echo $number++; ?>.</td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $user_type ?></td>
                        <td>
                            <a href="<?php echo SITE; ?>Admin/update_user.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                // no record
            }
            ?>

        </table>
    </div>
</div>
<!-- End of main containt -->

<?php
include('./Partials/footer.php');
?>