<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
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
            <a class="navbar-brand" href="<?php echo base_url() . 'admin/home'; ?>">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/user/'; ?>">Kelola User </a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/mitra/'; ?>">Kelola
                                Mitra</a>
                        </div>
                        <!-- </li>
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Toko
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/store/'; ?>">Kelola Toko</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/store/create_toko'; ?>">Buat Toko</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/category/'; ?>">Kelola
                                Category</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/category/create_category'; ?>">Buat
                                Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/menu/'; ?>">Kelola Menu</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/menu/create_menu'; ?>">Buat
                                Menu</a>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Premium
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/orders'; ?>"><i class="fas fa-shopping-basket"></i> Kelola Premium</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/premium/'; ?>"><i class="fas fa-shopping-basket"></i> Kelola Premium Sales</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/premium/create_premium'; ?>"><i class="fas fa-shopping-basket"></i> Buat Premium Sales</a>
                        </div>


                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php $admin = $this->session->userdata('admin'); ?>
                            <?php echo ucfirst($admin['username']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="<?php echo base_url() . 'admin/profile'; ?>"><i class="fas fa-user-circle"></i> My Profile</a> -->
                            <a class="dropdown-item" href="<?php echo base_url() . 'chat'; ?>"><i class="fas fa-circle"></i> Chat</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() . 'Auth'; ?>"><i class="fas fa-star"></i> Find Mitra</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url() . 'admin/login/logout'; ?>" class="nav-link">Logout </a>
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