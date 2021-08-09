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
                            <i class="bx mx-2 bx-share"></i>
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
            <div class="ml-4"><i class="bx bx-right-arrow-alt text-2xl"></i></div>
        </div>
    </div>
</section>