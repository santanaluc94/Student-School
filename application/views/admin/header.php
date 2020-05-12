<?php
$userAllowedAdmin = [
    'root',
    'admin',
    'teacher_admin'
];

$userAllowedTeachers = [
    'root',
    'teachers',
    'teacher_admin'
]

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student School</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap 4 Mobile App Template">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700|Nunito:400,600,700" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous">
    </script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('public/jquery_flipster_master/dist/jquery.flipster.min.css'); ?>">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/theme.css'); ?>">
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/styles.css'); ?>">
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/header_admin.css'); ?>">
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/boleto/boleto_styles.css'); ?>">

</head>

<body>
    <header class="header-admin">
        <div class="branding">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <h1 class="site-logo">
                        <a class="navbar-brand" href="<?= base_url('') ?>">
                            <img class="logo-icon" src="<?= base_url('public/images/logo-icon.svg'); ?>" alt="logo">
                            <!-- Logo -->
                            <span class="logo-text">Student School</span>
                        </a>
                    </h1>

                    <div class="menu-admin">
                        <ul class="menu-admin social-list list-inline mb-0 ">
                            <li class="list-inline-item">
                                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                            </li>
                            <?php if (in_array($_SESSION['adminData']->user_type, $userAllowedAdmin)) : ?>
                                <li class="list-inline-item">
                                    <a class="nav-link" href="<?= base_url('admin/account/profile'); ?>">Categories</a>
                                </li>
                                <li class="list-inline-item dropdown drop-menu">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Teacher</a>
                                    <div class="dropdown-menu box-dropdown-admin" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item line-dropdown-admin" href="<?= base_url('admin/teacher/grid'); ?>">All Teachers</a>
                                        <a class="dropdown-item line-dropdown-admin" href="<?= base_url('admin/teacher/add'); ?>">Add Teachers</a>
                                        <a class="dropdown-item line-dropdown-admin" href="<?= base_url('admin/admin/add'); ?>">Add Admin</a>
                                        <a class="dropdown-item line-dropdown-admin" href="<?= base_url('admin/admin/grid'); ?>">All Admins</a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <a class="nav-link" href="<?= base_url('admin/settings'); ?>">Settings</a>
                                </li>
                            <?php endif; ?>
                            <?php if (in_array($_SESSION['adminData']->user_type, $userAllowedTeachers)) : ?>
                                <li class="list-inline-item">
                                    <a class="nav-link" href="<?= base_url('admin/courses'); ?>">Courses</a>
                                </li>
                            <?php endif; ?>
                            <li class="list-inline-item">
                                <a class="nav-link" href="<?= base_url('admin/profile'); ?>">Profile</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="nav-link" href="<?= base_url('admin/dashboard/logOut'); ?>">Log Out</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Menu -->
                </nav>
            </div>
        </div>
    </header>
    <!--Header-->