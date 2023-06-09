<?php

@include 'config.php';



if (isset($_POST['submit'])) {


    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = $_POST['email'];
    $pass = $_POST['password'];


    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ;";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        // $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['username'] = $row['name'];
            header('location:manage_user.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['username'] = $row['name'];
            header('location: ../Customer/home.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #eee;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #eee;
        }

        .form-container form {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .6);
            background: #fff;
            text-align: center;
            width: 500px;
            display: flex;
            flex-direction: column;
        }

        .form-container form h3 {
            font-size: 1.7rem;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input,
        .form-container form select {
            width: 90%;
            padding: 7px 7px;
            font-size: 1.1rem;
            margin: 8px 0;
            background: #eee;
            border-radius: 10px;
        }

        .form-container form select option {
            background: #fff;
            cursor: pointer;
        }

        .form-container form .form-btn {
            background: #794420;
            width: 30%;
            margin-left: 300px;
            font-size: 14px !important;
            color: white;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
            transition: 0.4s;
        }

        .form-container form .form-btn:hover {
            background: #d3ad7f;
            color: #fff;
        }

        .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }

        .form-container form p a {
            color: #d3ad7f;
        }

        .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: crimson;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>login</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>
        </form>

    </div>

</body>

</html>