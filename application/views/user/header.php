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
    <link rel="stylesheet" href="<?= base_url('public/plugins/jquery-flipster/dist/jquery.flipster.min.css'); ?>">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/theme.css'); ?>">
    <link id="theme-style" rel="stylesheet" href="<?= base_url('public/css/styles.css'); ?>">

</head>

<body>
    <header class="header">
        <div class="branding">
            <div class="container position-relative">
                <nav class="navbar navbar-expand-lg">
                    <h1 class="site-logo">
                        <a class="navbar-brand" href="<?= base_url('') ?>">
                            <img class="logo-icon" src="<?= base_url('public/images/logo-icon.svg'); ?>" alt="logo">
                            <!-- Logo -->
                            <span class="logo-text">Student School</span>
                        </a>
                    </h1>

                    <ul class="social-list list-inline mb-0 position-absolute">
                        <li class="list-inline-item">
                            <a class="nav-link" href="<?= base_url('user/dashboard'); ?>">Dashboard</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link" href="<?= base_url('user/my-courses'); ?>">My Courses</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link" href="<?= base_url('user/profile'); ?>">Profile</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link" href="<?= base_url('user/dashboard/logOut'); ?>">Log Out</a>
                        </li>
                    </ul>
                    <!-- Menu -->
                </nav>
            </div>
        </div>
    </header>
    <!--Header-->