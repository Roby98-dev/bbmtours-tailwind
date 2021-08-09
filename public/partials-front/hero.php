<header>
    <div class="p-2">
        <div class="md:h-screen max-w-6xl mx-auto h-96 bg-indigo-600 bg-cover bg-center bg-no-repeat rounded-md" style="background-image: url(<?= SITEURL; ?>images/demo/Blog-bbmt-5163.jpg);">
            <div class="h-full rounded-md bg-gradient-to-t from-black w-full p-2 flex justify-center items-center">
                <div>
                    <h1 class="text-center text-indigo-100 text-3xl px-14 md:text-5xl mx-auto font-bold py-10">Plan your trip with BBM Tours</h1>
                    <div class="pl-5 pr-2 py-2 rounded-full bg-gray-100 shadow mx-4">
                        <form action="<?= SITEURL; ?>food-search.php" method="POST" class="flex justify-between items-center">
                            <input type="search" name="search" placeholder="Search destination.." required class="bg-gray-100 outline-none w-full">
                            <button type="submit" name="submit" class="rounded-full text-indigo-600 cursor-pointer">
                                <i class="bx bx-search px-1 font-bold"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>