<?php include('partials-front/header.php'); ?>
<?php include('partials-front/navbar.php'); ?>

<?php
if (isset($_GET['blog_id'])) {
    $id = $_GET['blog_id'];
    $sql = "SELECT tbl_blog.id, tbl_blog.slug, tbl_blog.body, tbl_blog.image_name AS image_thumb, tbl_blog.created_at, tbl_blog.user_id, tbl_blog.category_id, tbl_blog.active, tbl_blog.excerpt, tbl_admin.username, tbl_blog_category.title 
    FROM ((tbl_blog 
    INNER JOIN tbl_admin 
    ON tbl_blog.user_id = tbl_admin.id) 
    INNER JOIN tbl_blog_category 
    ON tbl_blog.category_id = tbl_blog_category.id) 
    WHERE tbl_blog.id = $id;";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $slug = $row['slug'];
    $cat_id = $row['category_id'];
    $author = $row['username'];
    $image_name = $row['image_thumb'];
    $date = $row['created_at'];
    $category = $row['title'];
    $body = $row['body'];
    $excerpt = $row['excerpt'];
} else {
    header('location:' . SITEURL . 'homepage.php');
}
?>

<section class="px-2 ">
    <div class="flex justify-center">
        <div class="flex max-w-6xl mx-auto w-full text-sm py-2">
            <a href="<?= SITEURL; ?>homepage.php" class="font-semibold text-blue-500">Home</a>
            <span class="text-gray-500 mx-1">\</span>
            <a href="<?= SITEURL; ?>" class="font-semibold text-blue-500">Blog</a>
            <span class="text-gray-500 mx-1">\</span>
            <p class="font-semibold"><?= $slug; ?></p>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="flex max-w-6xl mx-auto w-full py-2">
            <p class="text-sm text-gray-500"><?= $excerpt; ?></p>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="max-w-6xl mx-auto w-full border border-indigo-500 rounded-xl">
            <div style="background-image: url(<?= SITEURL; ?>images/demo/<?= $image_name; ?>);" class="h-96 w-full bg-cover bg-center bg-no-repeat rounded-xl">
                <div class="h-full rounded-md bg-gradient-to-t from-black w-full md:p-5 p-2 relative">
                    <div class="absolute bottom-2 flex items-center">
                        <h1 class="text-gray-100 text-xl md:text-2xl font-semibold">@<?= $author; ?></h1>
                        <span class="text-gray-100 text-xl md:text-2xl font-semibold mx-2">&centerdot;</span>
                        <h1 class="text-indigo-700 text-sm bg-green-200 px-2 rounded-full font-semibold"><?= $category; ?></h1>
                    </div>
                    <div class="absolute bottom-2 flex items-center md:right-5 right-2">
                        <h1 class="text-gray-100 text-sm font-semibold"><?= timeago($date); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="max-w-3xl mx-auto w-full py-5 border-b border-gray-200">
            <h1 class="font-semibold text-xl md:text-3xl text-indigo-500"><?= $slug; ?></h1>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="max-w-3xl mx-auto w-full py-5 border-b border-gray-200">
            <h1 class="text-gray-800"><?= $body; ?></h1>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>