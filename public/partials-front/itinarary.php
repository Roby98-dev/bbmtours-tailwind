<section class="px-2 py-10">
    <div class="flex justify-between max-w-6xl mx-auto pr-4">
        <div class="p-2">
            <div>
                <div class="h-full w-full md:p-2 flex text-left">
                    <h1 class="text-gray-600 text-2xl tracking-wider md:text-4xl font-bold">Tour Packages</h1>
                </div>
            </div>
            <div>
                <div class="h-full w-full md:p-2 flex items-center">
                    <p class="text-gray-600 md:text-md tracking-wider">Choose the package according to your wishes</p>
                </div>
            </div>
        </div>
        <div class="flex items-center">
            <p class="text-center">
                <a href="#">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12,23 C5.92486775,23 1,18.0751322 1,12 C1,5.92486775 5.92486775,1 12,1 C18.0751322,1 23,5.92486775 23,12 C23,18.0751322 18.0751322,23 12,23 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z M9.29289322,8.70710678 L10.7071068,7.29289322 L15.4142136,12 L10.7071068,16.7071068 L9.29289322,15.2928932 L12.5857864,12 L9.29289322,8.70710678 Z" />
                    </svg>
                </a>
            </p>
        </div>
    </div>

    <div class="md:flex justify-center hidden">
        <div class="max-w-6xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

            <?php
            $sql2 = "SELECT tbl_itinarary.id, tbl_itinarary.image_name, tbl_itinarary.link, tbl_itinarary.price, tbl_itinarary.title AS iti_title, tbl_category.title AS cata_title, tbl_day.day 
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
                    $link = $row['link'];
                    $price = $row['price'];
            ?>
                    <a href="<?= SITEURL; ?>packages/<?= $link; ?>" class="mb-4">
                        <div class="rounded-lg mx-2">
                            <?php
                            if ($image_name == "") {
                            ?>
                                <div style="background-image: url(<?= SITEURL; ?>packages/img/<?= $image_name; ?>);" class="h-80 bg-cover bg-center bg-no-repeat rounded-lg">
                                    <div class="bg-black rounded-lg h-full bg-opacity-50 flex justify-center items-center">
                                        <div class="text-gray-100 px-5">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                            <h4>Start from <span class="font-bold">$<?= $price; ?></span></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div style="background-image: url(<?= SITEURL; ?>packages/img/<?= $image_name; ?>);" class="h-80 bg-cover bg-center bg-no-repeat rounded-lg">
                                    <div class="bg-black rounded-lg h-full bg-opacity-50 flex justify-center items-center">
                                        <div class="text-gray-100 px-5">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                            <h4>Start from <span class="font-bold">$<?= $price; ?></span></h4>
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
                echo "<div class='error'>Not available.</div>";
            }
            ?>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper-container md:hidden">
        <div class="swiper-wrapper">
            <?php
            $sql = "SELECT tbl_itinarary.id, tbl_itinarary.image_name, tbl_itinarary.link, tbl_itinarary.price, tbl_itinarary.title AS iti_title, tbl_category.title AS cata_title, tbl_day.day 
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
                    $link = $row2['link'];
                    $price = $row2['price'];
            ?>
                    <div style="width: 75%; height: 20rem;" class="swiper-slide shadow-lg bg-gray-800 rounded-lg relative">
                        <?php
                        if ($image_name == "") {
                        ?>
                            <a href="<?= SITEURL; ?>packages/<?= $link; ?>">
                                <div style="background-image: url('assets/images/dafault/dafault.jpeg');" class="h-full rounded-lg bg-cover bg-center bg-no-repeat">
                                    <div class="text-gray-100">
                                        <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                        <h4><?= $day; ?> in <?= $category; ?></h4>
                                        <h4>Start from <span class="font-bold">$<?= $price; ?></span></h4>
                                    </div>
                                </div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="<?= SITEURL; ?>packages/<?= $link; ?>">
                                <div class="text-black h-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url(<?= SITEURL; ?>packages/img/<?= $image_name; ?>);">
                                    <div class="bg-gradient-to-t rounded-lg from-black h-full flex p-5 items-center">
                                        <div class="text-gray-100">
                                            <h4 class="text-xl font-semibold tracking-wider"><?= $title; ?></h4>
                                            <h4><?= $day; ?> in <?= $category; ?></h4>
                                            <h4>Start from <span class="font-bold">$<?= $price; ?></span></h4>
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