<section class="px-2 py-10">
    <div class="p-2">
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <h1 class="text-center text-gray-600 text-2xl md:text-4xl mx-auto font-bold">Object Wisata favorit di Indonesia</h1>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <p class="text-center text-gray-600 text-md mx-auto">Bingung mau jalan-jalan ke mana? Yuk lihat rekomendasi rencana perfjalanan yang mungkin kamu suka</p>
            </div>
        </div>
    </div>

    <div class="md:flex justify-center hidden">
        <div class="max-w-6xl w-full mx-auto grid grid-cols-1 md:grid-cols-3">

            <?php
            $sql2 = "SELECT tbl_food.id, tbl_food.category_id, tbl_food.title, tbl_food.image_name AS obj_img, tbl_food.active, tbl_category.id, tbl_category.title AS cat_title
            FROM tbl_food 
            INNER JOIN tbl_category 
            ON tbl_food.category_id = tbl_category.id 
            WHERE tbl_food.active = 'Yes' 
            AND tbl_food.featured = 'Yes' 
            LIMIT 3";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $category = $row['cat_title'];
                    $image_name = $row['obj_img'];
            ?>
                    <div class="mx-2 mb-2 rounded-lg h-60">
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
                            <a target="blank" href="<?= SITEURL; ?>images/food/<?= $image_name; ?>">
                                <div class="text-black h-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url(<?= SITEURL; ?>images/food/<?= $image_name; ?>);">
                                    <div class="bg-gradient-to-t rounded-lg from-black h-full flex justify-center p-5 items-center">
                                        <div class="text-gray-100 text-center">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $category; ?></h4>
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

    <!-- Swiper -->
    <div class="swiper-container md:hidden py-5">
        <div class="swiper-wrapper">
            <?php
            $sql = "SELECT tbl_food.id, tbl_food.category_id, tbl_food.title, tbl_food.image_name AS obj_img, tbl_food.active, tbl_category.id, tbl_category.title AS cat_title
            FROM tbl_food 
            INNER JOIN tbl_category 
            ON tbl_food.category_id = tbl_category.id 
            WHERE tbl_food.active = 'Yes' 
            AND tbl_food.featured = 'Yes' 
            LIMIT 6";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row2 = mysqli_fetch_assoc($res)) {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $category = $row2['cat_title'];
                    $image_name = $row2['obj_img'];
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
                            <a target="blank" href="<?= SITEURL; ?>images/food/<?= $image_name; ?>">
                                <div class="text-black h-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url(<?= SITEURL; ?>images/food/<?= $image_name; ?>);">
                                    <div class="bg-gradient-to-t rounded-lg from-black h-full flex p-5 items-center">
                                        <div class="text-gray-100">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $category; ?></h4>
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

    <p class="text-center">
        <a href="#">See All Objects</a>
    </p>
</section>