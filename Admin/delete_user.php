<?php
include('./config.php');
include('./Partials/navbar.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = $_POST['password'];

    $select = " SELECT * FROM user_form WHERE name = '$name' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if (!mysqli_num_rows($result) > 0) {
        $error[] = 'user does not exist!';
    } else {

            $delete = " DELETE FROM user_form WHERE name = '$name' && password = '$pass' ";
            mysqli_query($conn, $delete);
            $_SESSION['delete'] = "User deleted";
            header('location:manage_user.php');

    }
}
?>
<div class="main-containt">
    <div class="wrapper">
        <div class="form-container">

            <form action="#" method="post">
                <h3>Delete</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
                <input type="text" name="name" required placeholder="enter your name">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="submit" name="submit" value="delete" class="form-btn" id="danger">
                <p>Are you sure you want to delete? <a href="manage_user.php">return</a></p>
            </form>

        </div>
    </div>
</div>
<?php
include('./Partials/footer.php');
?>