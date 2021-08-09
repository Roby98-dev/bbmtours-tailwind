<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Manage User</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="md:flex justify-center">
        <div class="max-w-6xl">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if (isset($_SESSION['pwd-not-match'])) {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }

            if (isset($_SESSION['change-pwd'])) {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            ?>
            <div class="flex justify-end px-2">
                <a href="add-admin.php" class="bg-blue-500 px-2 py-1 text-gray-100 rounded-full my-5"><i class="bx bx-plus"></i> User</a>
            </div>

            <div class="mb-10 mt-5 overflow-x-scroll">
                <table id="user_data">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tbl_admin WHERE user_grade = 1 ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) {

                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                    $image_name = $rows['image_name'];
                        ?>

                                    <tr>
                                        <td class="flex justify-center">
                                            <?php
                                            if ($image_name == "") {
                                                echo "<div class='error'>Image not Added.</div>";
                                            } else {
                                            ?>
                                                <img src="<?= SITEURL; ?>images/profile/<?= $image_name; ?>" class="w-14 rounded-full">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?= $full_name; ?></td>
                                        <td><?= $username; ?></td>
                                        <td>
                                            <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $id; ?>" class="rounded-full btn-secondary px-2">Profile</a>
                                        </td>
                                    </tr>

                        <?php
                                }
                            } else {
                                echo '<div class="danger">No data</div>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="overflow-x-scroll my-10">
                <table id="user_data2">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Profile</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM tbl_admin WHERE user_grade = 2 ORDER BY id DESC";
                        $res2 = mysqli_query($conn, $sql2);

                        if ($res2 == TRUE) {
                            $count = mysqli_num_rows($res2);

                            if ($count > 0) {
                                while ($rows2 = mysqli_fetch_assoc($res2)) {

                                    $id = $rows2['id'];
                                    $full_name = $rows2['full_name'];
                                    $username = $rows2['username'];
                                    $image_name = $rows2['image_name'];
                        ?>

                                    <tr>
                                        <td class="flex justify-center">
                                            <?php
                                            if ($image_name == "") {
                                                echo "<div class='error'>Image not Added.</div>";
                                            } else {
                                            ?>
                                                <img src="<?= SITEURL; ?>images/profile/<?= $image_name; ?>" class="w-14 rounded-full">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?= $full_name; ?></td>
                                        <td><?= $username; ?></td>
                                        <td>
                                            <a href="<?= SITEURL; ?>admin/user-profile.php?user_id=<?= $id; ?>" class="rounded-full btn-secondary px-2">Profile</a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            } else {
                                echo '<div class="danger">No data</div>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>