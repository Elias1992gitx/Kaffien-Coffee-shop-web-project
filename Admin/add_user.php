<?php
include('./config.php');
include('./Partials/navbar.php');


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_type = $_POST['user_type'];


    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            $_SESSION['add'] ="Successfully added"; 
            header('location:manage_user.php');
        }
    }
}

?>
<div class="main-containt">
    <div class="wrapper">
        <div class="form-container">

            <form action="#" method="post">
                <h3>register</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
                <input type="text" name="name" required placeholder="enter your name">
                <input type="email" name="email" required placeholder="enter your email">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="password" name="cpassword" required placeholder="confirm your password">
                <select name="user_type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                <input type="submit" name="submit" value="register now" class="form-btn">
                <p>what to go back? <a href="manage_user.php">return</a></p>
            </form>

        </div>
    </div>
            </div>
             <?php
        include('./Partials/footer.php');
        ?>