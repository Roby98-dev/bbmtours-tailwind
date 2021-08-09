<header>
    <nav class="w-full px-2 shadow border-gray-400">
        <div class="hidden md:flex justify-between max-w-6xl py-2 mx-auto items-center">
            <div class="text-lg">
                <a href="<?= SITEURL; ?>homepage.php" class="flex">
                    <img src="<?= SITEURL; ?>images/bbm-logo.png" alt="Logo BBM Tours" class="w-10 h-8">
                </a>
            </div>
            <div class="text-indigo-600 text-center uppercase text-lg">
                <a href="<?= SITEURL; ?>homepage.php" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded-full border border-indigo-500 bg-indigo-100">Home</a>
                <a href="explore.html" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded-full border border-indigo-500 bg-indigo-100">Explore</a>
                <a href="" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded-full border border-indigo-500 bg-indigo-100">Event</a>
                <a href="" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded-full border border-indigo-500 bg-indigo-100">Pricing</a>
            </div>
            <div class="text-xl flex items-center">
                <div>
                    <?php if (!$_SESSION) { ?>
                        <a href="<?= SITEURL; ?>admin/">
                            <i class="bx bx-user-circle ml-2 text-indigo-600 text-xl"></i>
                        </a>
                    <?php } else { ?>
                        <a href="<?= SITEURL; ?>admin/">
                            <img src="<?= SITEURL; ?>images/profile/<?= $_SESSION['image']; ?>" class="ml-2 w-8 rounded-full">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="flex md:hidden justify-between p-2 items-center">
            <a href="<?= SITEURL; ?>homepage.php" class="flex">
                <img src="<?= SITEURL; ?>images/bbm-logo.png" alt="Logo BBM Tours" class="w-10 h-8">
            </a>
            <div>
                <?php if (!$_SESSION) { ?>
                    <a href="<?= SITEURL; ?>admin/">
                        <i class="bx bx-user-circle ml-2 text-indigo-600 text-3xl"></i>
                    </a>
                <?php } else { ?>
                    <a href="<?= SITEURL; ?>admin/">
                        <img src="<?= SITEURL; ?>images/profile/<?= $_SESSION['image']; ?>" class="ml-2 w-8 rounded-full">
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="md:hidden shadow z-10 flex justify-between fixed bottom-0 bg-gray-200 mb-2 rounded-lg px-5">
                <div class="py-1 mx-1 w-14">
                    <a href="<?= SITEURL; ?>homepage.php" class="text-center">
                        <div>
                            <i class="bx bx-home-alt font-semibold text-xl hover:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm">Home</p>
                        </div>
                    </a>
                </div>

                <div class="py-1 mx-1 w-14">
                    <a href="<?= SITEURL; ?>homepage.php" class="text-center">
                        <div>
                            <i class="bx bx-search font-semibold text-xl hover:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm">Explore</p>
                        </div>
                    </a>
                </div>

                <div class="py-1 mx-1 w-14 flex items-center justify-center">
                    <a href="<?= SITEURL; ?>homepage.php" class="text-center">
                        <div class="bg-indigo-500 rounded-full px-1 shadow">
                            <i class="bx bx-plus font-bold text-xl text-gray-100 hover:text-blue-400"></i>
                        </div>
                    </a>
                </div>

                <div class="py-1 mx-1 w-14">
                    <a href="<?= SITEURL; ?>homepage.php" class="text-center">
                        <div>
                            <i class="bx bx-calendar font-semibold text-xl hover:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm">Event</p>
                        </div>
                    </a>
                </div>
                <div class="py-1 mx-1 w-14">
                    <a href="<?= SITEURL; ?>homepage.php" class="text-center">
                        <div>
                            <i class="bx bx-book font-semibold text-xl hover:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm">Blog</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>