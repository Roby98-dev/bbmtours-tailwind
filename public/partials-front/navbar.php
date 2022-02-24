<header>
    <nav class="w-full px-2 shadow border-gray-400">
        <div class="hidden md:flex justify-between max-w-6xl py-2 mx-auto items-center">
            <div class="text-lg">
                <a href="<?= SITEURL; ?>homepage.php" class="flex">
                    <img src="<?= SITEURL; ?>images/bbm-logo.png" alt="Logo BBM Tours" class="w-10 h-8">
                </a>
            </div>
            <div class="text-gray-600 text-center uppercase text-lg">
                <a href="<?= SITEURL; ?>homepage.php" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded">Home</a>
                <a href="explore.html" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded">Explore</a>
                <a href="" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded">Event</a>
                <a href="" class="mx-1 px-2 py-1 hover:bg-gray-200 rounded">Pricing</a>
            </div>
            <div class="text-lg flex items-center">
                <div>
                    <?php if (!$_SESSION) { ?>
                        <a class="px-2 py-1 rounded hover:bg-indigo-300 border border-indigo-500" href="<?= SITEURL; ?>admin/">
                            LOGIN
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
                    <a class="px-2 py-1 rounded hover:bg-indigo-300 border border-indigo-500" href="<?= SITEURL; ?>admin/">
                        LOGIN
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
                        <div class="px-1">
                            <svg width="48px" height="48px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" fill="white" fill-opacity="0.01" />
                                <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" fill="#2F88FF" stroke="black" stroke-width="4" stroke-linejoin="round" />
                                <path d="M24 16V32" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16 24L32 24" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
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