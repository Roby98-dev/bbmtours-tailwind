<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">

    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Itinarary</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    if (isset($_SESSION['unauthorize'])) {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
    }

    if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    ?>

    <a href="<?php echo SITEURL; ?>admin/add-itinarary.php" class="bg-blue-500 px-4 font-semibold rounded py-1 text-gray-200"><i class="bx bx-plus"></i>Itinarary</a>

    <div class="py-5 overflow-x-scroll">
        <table id="category-destination" class="stripe hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Day</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT tbl_itinarary.id, tbl_itinarary.image_name, tbl_itinarary.title AS iti_title, tbl_category.title AS cata_title, tbl_day.day, tbl_itinarary.price, tbl_itinarary.featured, tbl_itinarary.active
                FROM (( tbl_itinarary 
                INNER JOIN tbl_category 
                ON tbl_itinarary.destination_id = tbl_category.id ) 
                INNER JOIN tbl_day 
                ON tbl_itinarary.day_id = tbl_day.id) ORDER BY tbl_itinarary.id DESC";

                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['iti_title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $day = $row['day'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                ?>
                        <tr>
                            <td><?= $title; ?></td>
                            <td>Rp <?= $price; ?></td>
                            <td>
                                <?php
                                if ($image_name != "") {
                                ?>
                                    <img src="<?= $image_name; ?>" class="h-20 w-60 bg-indigo-500 rounded-lg object-cover shadow-lg object-center" />
                                <?php
                                } else {
                                    echo "<div class='error'>Image not Added.</div>";
                                }
                                ?>
                            </td>
                            <td><?= $day; ?></td>
                            <td><?= $featured; ?></td>
                            <td><?= $active; ?></td>
                            <td>
                                <a href="<?= SITEURL; ?>admin/update-food.php?id=<?= $id; ?>" class="bg-green-500 py-1 px-4 rounded-full text-xl font-semibold text-gray-100">Edit</a>
                                <a href="<?= SITEURL; ?>admin/delete-food.php.php?id=<?= $id; ?>&image_name=<?= $image_name; ?>" class="bg-red-500 py-1 px-4 rounded-full text-xl font-semibold text-gray-100">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <div class="error">No Category Added.</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>