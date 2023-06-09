<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        .a-links:hover {
            color: #512a10 !important;
            transition: 0.3s !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">
                <h1>Kaffien</h1>
            </a>
            <div class="navbar-nav">
                <ul class="nav-links">
                    <li class="nav-item"><a href="index.php" class="nav-link a-links">Home</a></li>
                    <li class="nav-item"><a href="manage_order.php" class="nav-link a-links">Orders</a></li>
                    <li class="nav-item"><a href="manage_user.php" class="nav-link a-links">Manage Users</a></li>
                    <li class="nav-item"><a href="./login.php" class="nav-link a-links">Log out</a></li>
                </ul>
            </div>
            <div class="menu-toggler">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->