<header>
    <div class="md:h-screen h-96 bg-indigo-600 bg-cover bg-center bg-no-repeat" style="background-image: url(https://i.picsum.photos/id/123/2000/1000.jpg?hmac=-vB3RB-rl7VLL6yY5GKrXiLqclCunWwq1YZvFJIYg8Q);">
        <div class="h-full rounded-md bg-gradient-to-t from-black w-full p-2 flex justify-center items-center">
            <div>
                <h1 class="text-center text-indigo-100 text-3xl px-14 md:text-5xl mx-auto font-bold py-10">Plan your trip with BBM Tours</h1>
                <div class="pl-5 pr-2 py-2 rounded-full bg-gray-100 shadow mx-4">
                    <form action="<?= SITEURL; ?>food-search.php" method="POST" class="flex justify-between items-center">
                        <input type="search" name="search" placeholder="Search destination.." required class="bg-gray-100 outline-none w-full">
                        <button type="submit" name="submit" class="rounded-full text-indigo-600 cursor-pointer">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16.3198574,14.9056439 L21.7071068,20.2928932 L20.2928932,21.7071068 L14.9056439,16.3198574 C13.5509601,17.3729184 11.8487115,18 10,18 C5.581722,18 2,14.418278 2,10 C2,5.581722 5.581722,2 10,2 C14.418278,2 18,5.581722 18,10 C18,11.8487115 17.3729184,13.5509601 16.3198574,14.9056439 Z M10,16 C13.3137085,16 16,13.3137085 16,10 C16,6.6862915 13.3137085,4 10,4 C6.6862915,4 4,6.6862915 4,10 C4,13.3137085 6.6862915,16 10,16 Z" />
                            </svg>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>