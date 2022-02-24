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
                            <a href="<?= SITEURL; ?>admin/update-admin.php?id=<?= $id; ?>">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M20.8733438,18.6798456 L18.6561681,20.8970213 L15.8183182,20.1064695 L15.006735,20.4411839 L13.5498403,22.99899 L10.4152664,22.99899 L8.96643872,20.4324639 L8.15567513,20.0925211 L5.31808752,20.8732969 L3.1019687,18.6571781 L3.89252047,15.8193282 L3.557737,15.0075774 L1,13.5496234 L1,10.4151434 L3.56757573,8.96634421 L3.90747891,8.15567513 L3.12670306,5.31808752 L5.34198234,3.10280823 L8.17984769,3.89446381 L8.99071892,3.56004309 L10.4454387,1 L13.5808166,1 L15.0296158,3.56757573 L15.8402849,3.90747891 L18.6774046,3.12683179 L20.8961418,5.34235339 L20.1054595,8.18067182 L20.4399569,8.99172892 L23,10.4464487 L23,13.5818266 L20.4326665,15.0304891 L20.0924686,15.8429951 L20.8733438,18.6798456 Z M17.9808573,15.7077573 L18.8526582,13.6256062 L21,12.4139314 L21,11.6103133 L18.8534478,10.3905557 L17.9941264,8.30695569 L18.6558226,5.93165934 L18.0869626,5.36362372 L15.7044076,6.01919516 L13.6244596,5.14709956 L12.4129214,3 L11.6093033,3 L10.3895457,5.1465522 L8.30575983,6.00595029 L5.93001038,5.34320732 L5.36375245,5.90946526 L6.01919516,8.29155242 L5.14709956,10.3715004 L3,11.5830386 L3,12.3875547 L5.14481829,13.610138 L6.00385363,15.6930443 L5.34202685,18.0688091 L5.90946526,18.6362476 L8.29155242,17.9808048 L10.3714059,18.8528608 L11.5829156,20.99899 L12.3873378,20.99899 L13.6089604,18.8542408 L15.6920343,17.9951364 L18.0677992,18.6569631 L18.6362007,18.0885616 L17.9808573,15.7077573 Z M12,16 C9.790861,16 8,14.209139 8,12 C8,9.790861 9.790861,8 12,8 C14.209139,8 16,9.790861 16,12 C16,14.209139 14.209139,16 12,16 Z M12,14 C13.1045695,14 14,13.1045695 14,12 C14,10.8954305 13.1045695,10 12,10 C10.8954305,10 10,10.8954305 10,12 C10,13.1045695 10.8954305,14 12,14 Z" />
                                </svg>
                            </a>
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

                        <div class="p-5 border border-indigo-500 rounded mx-1 my-2">
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
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>