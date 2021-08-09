<section class="px-2 py-10">
    <div class="p-2">
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <h1 class="text-center text-gray-600 text-2xl md:text-4xl mx-auto font-bold">Destinasi favorit di Indonesia</h1>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <p class="text-center text-gray-600 text-md mx-auto">Jelajahi tempat-tempat menarik dan unik di masing-masing kota</p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <div class="md:flex justify-center hidden">
        <div class="max-w-6xl w-full mx-auto grid grid-cols-1 md:grid-cols-3">
            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>
                    <a href="<?= SITEURL; ?>category-foods.php?category_id=<?= $id; ?>" class="mx-2 rounded-lg shadow-md mb-4">
                        <?php
                        if ($image_name == "") {
                        ?>
                            <div style="background-image: url(<?= SITEURL; ?>images/category/<?= $image_name; ?>);">

                            </div>
                        <?php
                        } else {
                        ?>
                            <div style="background-image: url(<?= SITEURL; ?>images/category/<?= $image_name; ?>);" class="h-60 bg-cover bg-center rounded-lg bg-no-repeat">
                                <div class="bg-black bg-opacity-50 h-full rounded-lg flex justify-center items-center font-bold text-2xl">
                                    <h3 class="text-white tracking-widest"><?= $title; ?></h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </a>
            <?php
                }
            } else {
                echo "<div class='error'>Category not Added.</div>";
            }
            ?>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper-container md:hidden">
        <div class="swiper-wrapper">
            <?php
            $sql2 = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";

            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                while ($row2 = mysqli_fetch_assoc($res2)) {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $image_name = $row2['image_name'];
            ?>
                    <div style="width: 75%; height: 20rem;" class="swiper-slide shadow-lg bg-gray-800 rounded-lg relative">
                        <?php
                        if ($image_name == "") {
                        ?>
                            <a target="blank" href="assets/images/dafault/dafault.jpeg">
                                <div style="background-image: url('assets/images/dafault/dafault.jpeg');" class="h-full rounded-lg bg-cover bg-center bg-no-repeat">
                                </div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a target="blank" href="<?= SITEURL; ?>images/category/<?= $image_name; ?>">
                                <div class="text-black h-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url(<?= SITEURL; ?>images/category/<?= $image_name; ?>);">
                                    <div class="bg-gradient-to-t rounded-lg from-black h-full flex p-5 items-center">
                                        <div class="text-gray-100">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            } else {
                echo "<div class='error'>Food not available.</div>";
            }
            ?>
        </div>
    </div>
</section>