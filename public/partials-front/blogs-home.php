<section class="bg-gray-100 py-10">
    <div class="p-2 hidden md:block">
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <h1 class="text-center text-gray-600 text-2xl md:text-4xl mx-auto font-bold">Kamu Harus Baca</h1>
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <p class="text-center text-gray-600 text-md mx-auto">Berita travel terkini</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto w-full pt-5 md:pt-0 md:hidden">
        <div class="my-2 ml-5">
            <h1 class="text-xl font-semibold">Kamu Harus Baca</h1>
            <p class="text-gray-500 text-sm">Berita travel terkini</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto w-full">
        <?php
        $sql2 = "SELECT tbl_blog.id, tbl_blog.slug, tbl_blog.body, tbl_blog.image_name AS image_thumb, tbl_blog.created_at, tbl_blog.user_id, tbl_blog.category_id, tbl_admin.username, tbl_admin.image_name AS image_user, tbl_blog_category.title 
        FROM ((tbl_blog 
        INNER JOIN tbl_admin 
        ON tbl_blog.user_id = tbl_admin.id) 
        INNER JOIN tbl_blog_category 
        ON tbl_blog.category_id = tbl_blog_category.id) 
        WHERE tbl_blog.active = 'Yes' 
        ORDER BY tbl_blog.id 
        DESC LIMIT 6";

        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $user_id = $row['user_id'];
                $slug = $row['slug'];
                $excerpt = $row['body'];
                $image_thumb = $row['image_thumb'];
                $image_user = $row['image_user'];
                $author = $row['username'];
                $category = $row['title'];
                $date = $row['created_at'];
        ?>

                <div class="p-5 border-b border-gray-200">
                    <?php
                    if ($image_thumb == "") {
                        echo "<div class='text-red-500 text-center px-5 py-2'>Image not Available.</div>";
                    } else {
                    ?>
                        <a href="<?= SITEURL; ?>blog-single.php?blog_id=<?= $id; ?>">
                            <img src="<?= SITEURL; ?>images/demo/<?= $image_thumb; ?>" class="h-44 w-full bg-indigo-500 rounded-lg object-cover shadow-lg object-center" />
                        </a>
                    <?php
                    }
                    ?>
                    <div class="my-4">
                        <a href="<?= SITEURL; ?>blog-single.php?blog_id=<?= $id; ?>" class="text-xl font-semibold"><?= $slug; ?></a>
                        <p class="text-sm text-gray-600"><?= $excerpt = substr($excerpt, 0, 100); ?>...
                            <a href="<?= SITEURL; ?>blog-single.php?blog_id=<?= $id; ?>">Read more</a>
                        </p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-900">
                            <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $user_id; ?>">
                                <img src="<?= SITEURL; ?>images/profile/<?= $image_user; ?>" alt="BBMT blog" class="mx-2 w-5 h-5 rounded-full">
                            </a>
                            <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $user_id; ?>" class="flex items-center">
                                <p class="mx-2"><?= $author; ?></p>
                            </a>
                            <p>&CenterDot;</p>
                            <p class="mx-2 text-gray-500 text-xs"><?= timeago($date); ?></p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-green-800 mx-2 bg-green-400 px-3 rounded-full">
                                <?= $category; ?>
                            </p>
                            <p>&CenterDot;</p>
                            <svg class="mx-2" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.91207766,11.1619952 C9.9696849,11.4322343 10,11.7125769 10,12 C10,12.2874231 9.9696849,12.5677657 9.91207766,12.8380048 L14.9830579,15.3734949 C15.716367,14.5318864 16.7960692,14 18,14 C20.209139,14 22,15.790861 22,18 C22,20.209139 20.209139,22 18,22 C15.790861,22 14,20.209139 14,18 C14,17.7125769 14.0303151,17.4322343 14.0879223,17.1619952 L9.01694214,14.6265051 C8.28363296,15.4681136 7.20393084,16 6,16 C3.790861,16 2,14.209139 2,12 C2,9.790861 3.790861,8 6,8 C7.20393084,8 8.28363296,8.53188639 9.01694214,9.37349494 L14.0879223,6.83800484 C14.0303151,6.56776568 14,6.28742308 14,6 C14,3.790861 15.790861,2 18,2 C20.209139,2 22,3.790861 22,6 C22,8.209139 20.209139,10 18,10 C16.7960692,10 15.716367,9.46811361 14.9830579,8.62650506 L9.91207766,11.1619952 Z M6,14 C7.1045695,14 8,13.1045695 8,12 C8,10.8954305 7.1045695,10 6,10 C4.8954305,10 4,10.8954305 4,12 C4,13.1045695 4.8954305,14 6,14 Z M18,8 C19.1045695,8 20,7.1045695 20,6 C20,4.8954305 19.1045695,4 18,4 C16.8954305,4 16,4.8954305 16,6 C16,7.1045695 16.8954305,8 18,8 Z M18,20 C19.1045695,20 20,19.1045695 20,18 C20,16.8954305 19.1045695,16 18,16 C16.8954305,16 16,16.8954305 16,18 C16,19.1045695 16.8954305,20 18,20 Z" />
                            </svg>

                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='text-center text-red-500'>Blog not available.</div>";
        }
        ?>
    </div>

    <div class="py-5 flex justify-center">
        <div class="bg-gray-300 rounded-full py-2 px-2 flex items-center">
            <div class="w-8"></div>
            <a href="#" class="text-lg text-gray-900">Artikel lainnya</a>
            <div class="ml-4">
                <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill-rule="evenodd" points="14.586 12 7.293 4.707 8.707 3.293 17.414 12 8.707 20.707 7.293 19.293" />
                </svg>
            </div>
        </div>
    </div>
</section>