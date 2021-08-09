<?php
include_once('../config/constants.php');
include_once('../config/functions.php');
include_once('login-check.php');
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BBM Tours | Dashboard</title>

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/vendor/dataTable/datatables.min.css">
</head>

<body>
    <div class="md:block text-center md:bg-indigo-500">
        <div class="flex justify-center border-b border-gray-300">
            <div class="max-w-6xl mx-auto w-full flex items-center py-2 px-4 justify-between">
                <div>
                    <a href="<?= SITEURL; ?>homepage.php" class="flex md:hidden">
                        <img src="<?= SITEURL; ?>images/bbm-logo.png" alt="Logo BBM Tours" class="w-10 h-8">
                    </a>
                </div>
                <div class="flex items-center bg-gray-200 rounded-full p-1">
                    <div>
                        <p class="font-semibold px-2">@<?= $_SESSION['user']; ?></p>
                    </div>
                    <div>
                        <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $_SESSION['user_id']; ?>">
                            <img src="<?= SITEURL; ?>images/profile/<?= $_SESSION['image']; ?>" class="ml-2 w-8 rounded-full">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu md:hidden text-center relative">
        <div class="absolute h-full w-5 right-0 bg-gradient-to-l from-gray-100"></div>
        <div class="absolute h-full w-5 left-0 bg-gradient-to-r from-gray-100"></div>
        <div class="flex overflow-scroll whitespace-nowrap py-3 px-4 items-center">
            <a href="index.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Dashboard</a>
            <?php if ($_SESSION['user_grade'] == 1) { ?>
                <a href="manage-admin.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">User</a>
            <?php } ?>
            <a href="manage-category.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Category</a>
            <a href="manage-food.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Food</a>
            <?php if ($_SESSION['user_grade'] == 1) { ?>
                <a href="manage-order.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Order</a>
            <?php } ?>
            <a href="manage-blog.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Blog</a>
            <a href="logout.php" class="bg-indigo-100 text-blue-800 border border-indigo-800 rounded-full px-3 mx-1 py-1">Logout</a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="fixed hidden md:block top-0">
        <div class="h-screen lg:w-60 md:w-16 bg-gray-900">
            <div class="flex justify-center py-2 items-center mb-5">
                <div>
                    <a href="<?= SITEURL; ?>homepage.php" class="flex">
                        <img src="<?= SITEURL; ?>images/bbm-logo.png" alt="Logo BBM Tours" class="w-10 h-8">
                    </a>
                </div>
            </div>

            <div>
                <a href="index.php" class="text-gray-400">
                    <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                        <div class="flex items-center px-1">
                            <i class="bx bx-grid-alt px-1 md:text-2xl lg:text-lg"></i>
                            <p class="md:hidden lg:block lg:text-lg">Dashboard</p>
                        </div>
                    </div>
                </a>
                <?php if ($_SESSION['user_grade'] == 1) { ?>
                    <a href="manage-admin.php" class="mx-2 text-gray-400">
                        <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                            <div class="flex items-center px-1">
                                <i class="bx bx-user px-1 md:text-2xl lg:text-lg"></i>
                                <p class="md:hidden lg:block lg:text-lg">Users</p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
                <a href="manage-category.php" class="mx-2 text-gray-400">
                    <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                        <div class="flex items-center px-1">
                            <i class="bx bx-map px-1 md:text-2xl lg:text-lg"></i>
                            <p class="md:hidden lg:block lg:text-lg">Categorys</p>
                        </div>
                    </div>
                </a>
                <a href="manage-food.php" class="mx-2 text-gray-400">
                    <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                        <div class="flex items-center px-1">
                            <i class="bx bx-home px-1 md:text-2xl lg:text-lg"></i>
                            <p class="md:hidden lg:block lg:text-lg">Food</p>
                        </div>
                    </div>
                </a>
                <?php if ($_SESSION['user_grade'] == 1) { ?>
                    <a href="manage-order.php" class="mx-2 text-gray-400">
                        <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                            <div class="flex items-center px-1">
                                <i class="bx bx-money px-1 md:text-2xl lg:text-lg"> </i>
                                <p class="md:hidden lg:block lg:text-lg">Order</p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
                <a href="manage-blog.php" class="mx-2 text-gray-400">
                    <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                        <div class="flex items-center px-1">
                            <i class="bx bx-book px-1 md:text-2xl lg:text-lg"></i>
                            <p class="md:hidden lg:block lg:text-lg">Blog</p>
                        </div>
                    </div>
                </a>
                <a href="logout.php" class="mx-2 text-gray-400">
                    <div class="my-2 hover:bg-indigo-500 md:flex justify-center lg:justify-start cursor-pointer rounded mx-2 hover:text-gray-100">
                        <div class="flex items-center px-1">
                            <i class="bx bx-log-out px-1 md:text-2xl lg:text-lg"></i>
                            <p class="md:hidden lg:block lg:text-lg">Logout</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>