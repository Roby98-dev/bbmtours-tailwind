<section class="px-2 py-10">
    <div class="p-2">
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <h1 class="text-center text-gray-600 text-2xl md:text-4xl mx-auto font-bold">Ratusan rencana perjalanan telah tersedia untukmu</h1>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <div class="h-full w-full p-2 flex items-center">
                <p class="text-center text-gray-600 text-md mx-auto">Bingung mau jalan-jalan ke mana? Yuk lihat rekomendasi rencana perfjalanan yang mungkin kamu suka</p>
            </div>
        </div>
    </div>

    <div class="md:flex justify-center hidden">
        <div class="max-w-6xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

            <?php
            $sql2 = "SELECT tbl_itinarary.id, tbl_itinarary.image_name, tbl_itinarary.title AS iti_title, tbl_category.title AS cata_title, tbl_day.day 
            FROM (( tbl_itinarary 
            INNER JOIN tbl_category 
            ON tbl_itinarary.destination_id = tbl_category.id ) 
            INNER JOIN tbl_day 
            ON tbl_itinarary.day_id = tbl_day.id) ORDER BY tbl_itinarary.id DESC LIMIT 4";

            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['iti_title'];
                    $category = $row['cata_title'];
                    $day = $row['day'];
                    $image_name = $row['image_name'];
            ?>
                    <a href="#" class="mb-4">
                        <div class="rounded-lg mx-2">
                            <?php
                            if ($image_name == "") {
                            ?>
                                <div style="background-image: url(<?= SITEURL; ?>images/profile/<?= $image_name; ?>);" class="h-80 bg-cover bg-center bg-no-repeat rounded-lg">
                                    <div class="bg-black rounded-lg h-full bg-opacity-50 flex justify-center items-center">
                                        <div class="text-gray-100">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div style="background-image: url(<?= SITEURL; ?>images/profile/<?= $image_name; ?>);" class="h-80 bg-cover bg-center bg-no-repeat rounded-lg">
                                    <div class="bg-black rounded-lg h-full bg-opacity-50 flex justify-center items-center">
                                        <div class="text-gray-100">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </a>
            <?php
                }
            } else {
                echo "<div class='error'>Food not available.</div>";
            }
            ?>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper-container md:hidden">
        <div class="swiper-wrapper">
            <?php
            $sql = "SELECT tbl_itinarary.id, tbl_itinarary.image_name, tbl_itinarary.title AS iti_title, tbl_category.title AS cata_title, tbl_day.day 
            FROM (( tbl_itinarary 
            INNER JOIN tbl_category 
            ON tbl_itinarary.destination_id = tbl_category.id ) 
            INNER JOIN tbl_day 
            ON tbl_itinarary.day_id = tbl_day.id) ORDER BY tbl_itinarary.id DESC LIMIT 4";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row2 = mysqli_fetch_assoc($res)) {
                    $id = $row2['id'];
                    $title = $row2['iti_title'];
                    $category = $row2['cata_title'];
                    $day = $row2['day'];
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
                            <a target="blank" href="<?= SITEURL; ?>images/profile/<?= $image_name; ?>">
                                <div class="text-black h-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url(<?= SITEURL; ?>images/profile/<?= $image_name; ?>);">
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

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>