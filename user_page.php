<?php
include('./config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin page</h1>
    <p><?php

        echo "hello " . $_SESSION['username'];
        ?></p>
    <br>
    <a href="./register.php">register</a>
    <br>
    <a href="./logout.php">logout</a>
</body>

</html>