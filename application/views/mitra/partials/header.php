<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mitra Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dashboard.css'); ?>">
</head>

<body class="bg-white">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() . 'mitra/home'; ?>">Mitra Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/user/'; ?>">Kelola User</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/user/create_user'; ?>">Buat
                                User</a>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Toko
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/store/'; ?>">Kelola Toko</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/store/create_toko'; ?>">Buat Toko</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/category/'; ?>">Kelola
                                Category</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/category/create_category'; ?>">Buat
                                Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/menu/'; ?>">Kelola Produk</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/menu/create_menu'; ?>">Buat
                                Produk</a>
                        </div>
                    </li>>
                    <!-- <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orders
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/orders/'; ?>"><i class="fas fa-shopping-basket"></i> All Orders</a>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Premium
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/premium/list'; ?>"><i class="fas fa-shopping-basket"></i> Buy Premium</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php $mitra = $this->session->userdata('mitra'); ?>
                            <?php echo ucfirst($mitra['username']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'mitra/profile'; ?>"><i class="fas fa-user-circle"></i> My Profile</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'chat'; ?>"><i class="fas fa-circle"></i> Chat</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url() . 'Auth'; ?>"><i class="fas fa-star"></i> Find Mitra</a>
                        </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url() . 'mitra/login/logout'; ?>" class="nav-link">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(function() {
                var dropdownMenu = $(this).children(".dropdown-menu");
                if (dropdownMenu.is(":visible")) {
                    dropdownMenu.parent().toggleClass("open");
                }
            });
        });
    </script>