<?php
include_once('partials/menu.php');

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM tbl_admin WHERE id = $id";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $username = $row['username'];
    $full_name = $row['full_name'];
    $image_name = $row['image_name'];
    $background_name = $row['background_name'];
} else {
    header('location:' . SITEURL . 'homepage.php');
}
?>

<div class="bg-gray-200 md:ml-16 lg:ml-60">
    <div class="relative">
        <?php if ($background_name == '') { ?>
            <div class="h-80 w-full flex justify-center items-center">
                <h1 class="text-xl text-red-500 text-center font-semibold">Background image is missing</h1>
            </div>
        <?php } else { ?>
            <div style="background-image: url(<?= SITEURL; ?>images/profile/background/<?= $background_name; ?>);" class="h-80 w-full bg-cover bg-center bg-no-repeat">
            </div>
        <?php } ?>
        <div class="absolute top-64 border-2 border-indigo-500 rounded-full md:left-28 left-1/3">
            <img src="<?= SITEURL; ?>images/profile/<?= $image_name; ?>" class="w-32 rounded-full">
        </div>

        <div class="flex justify-center pb-5 border-b-2 border-gray-300 px-4">
            <div class="flex justify-between max-w-4xl mx-auto w-full mt-20">
                <div class="px-2">
                    <h1 class="font-bold text-xl tracking-wider"><?= $full_name; ?></h1>
                    <h1 class="text-lg text-gray-500">@<?= $username; ?></h1>
                </div>
                <div class="px-2">
                    <?php if ($_SESSION['user_id'] == $id) { ?>
                        <div class="text-gray-100">
                            <a href="<?= SITEURL; ?>admin/update-admin.php?id=<?= $id; ?>" class="rounded-full bg-green-500 py-2 px-5 font-semibold tracking-wider">Edit</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="flex justify-center pb-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-w-5xl mx-auto w-full">
                <?php
                $sql2 = "SELECT tbl_blog.id, tbl_blog.slug, tbl_blog.body, tbl_blog.image_name AS image_thumb, tbl_blog.created_at, tbl_blog.user_id, tbl_blog.category_id, tbl_admin.username, tbl_admin.image_name AS image_user, tbl_blog_category.title 
                FROM ((tbl_blog 
                INNER JOIN tbl_admin 
                ON tbl_blog.user_id = tbl_admin.id) 
                INNER JOIN tbl_blog_category 
                ON tbl_blog.category_id = tbl_blog_category.id) 
                WHERE tbl_blog.user_id = $id 
                ORDER BY tbl_blog.id 
                DESC LIMIT 3";

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
                                <img src="<?= SITEURL; ?>images/demo/<?= $image_thumb; ?>" class="h-44 w-full bg-indigo-500 rounded-lg object-cover shadow-lg object-center" />
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
                                    <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $user_id; ?>">
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
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>