<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Edit User</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="flex justify-center">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
                $current_profile = $row['image_name'];
                $current_background = $row['background_name'];
            } else {
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }
        ?>

        <div class="max-w-6xl mx-auto w-full">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="flex justify-center rounded-lg">
                    <?php if ($current_background == '') { ?>
                        <div class="h-80 w-full">
                            <div class="flex justify-center items-center">
                                <h1 class="text-xl text-red-500 text-center font-semibold">Background image is missing</h1>
                            </div>
                            <div class="flex justify-center items-center bg-gray-300 my-5">
                                <input type="file" name="background">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div style="background-image: url(<?= SITEURL; ?>images/profile/background/<?= $current_background; ?>);" class="h-80 w-full bg-cover bg-center flex justify-center items-center rounded-lg bg-no-repeat">
                            <div class="bg-blue-300 rounded-lg p-1">
                                <input type="file" name="background">
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="py-5">
                    <div class="flex justify-center">
                        <lebel>Current Image</lebel>
                    </div>
                    <div class="flex justify-center">
                        <?php
                        if ($current_profile == "") {
                        ?>
                            <div class="h-60 w-60 bg-cover flex justify-center items-center bg-center rounded-full bg-no-repeat">
                                <div>
                                    <div class="flex justify-center items-center">
                                        <h1 class="text-xl text-red-500 text-center font-semibold">Profile image is missing</h1>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <div class="bg-blue-300 rounded-lg">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div>
                                <div class="flex justify-center">
                                    <div style="background-image: url(<?= SITEURL; ?>images/profile/<?= $current_profile; ?>);" class="h-60 w-60 bg-cover bg-center rounded-full bg-no-repeat">
                                    </div>
                                </div>
                                <div class="my-2 flex justify-center">
                                    <div class="bg-blue-300 rounded-lg p-1">
                                        <input type="file" name="image">
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="bg-gray-300 p-2 rounded-lg w-full max-w-xl md:px-10">
                        <div class="my-5">
                            <label>Full Name</label> <br>
                            <input type="text" name="full_name" value="<?= $full_name; ?>" class="bg-gray-300 outline-none py-2">
                        </div>

                        <div class="my-5">
                            <label>Username</label> <br>
                            <input type="text" name="username" value="<?= $username; ?>" class="bg-gray-300 outline-none py-2">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="py-5 flex text-gray-200">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="current_profile" value="<?= $current_profile; ?>">
                        <input type="hidden" name="current_background" value="<?= $current_background; ?>">
                        <input type="submit" name="submit" value="Save" class="rounded-full bg-green-500 mx-1 px-2 cursor-pointer py-0">
                        <a href="<?= SITEURL; ?>admin/update-password.php?id=<?= $id; ?>" class="rounded-full bg-blue-500 mx-1 px-2 cursor-pointer py-0">Edit Password</a>
                        <a href="<?= SITEURL; ?>admin/delete-admin.php?id=<?= $id; ?>" class="rounded-full bg-red-500 mx-1 px-2 cursor-pointer py-0">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $current_profile = $_POST['current_profile'];
    $current_background = $_POST['current_background'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "New-Profile-image-" . rand(0000, 9999) . '.' . $ext;
            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "../images/profile/image/" . $image_name;

            $upload = move_uploaded_file($src_path, $dest_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload new image.</div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');
                die();
            }

            if ($current_profile != "") {
                $remove_path = "../images/profile/" . $current_profile;

                $remove = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                    die();
                }
            }
        } else {
            $image_name = $current_profile;
        }
    } else {
        $image_name = $current_profile;
    }

    if (isset($_FILES['background']['name'])) {
        $background_name = $_FILES['background']['name'];

        if ($background_name != "") {
            $ext = end(explode('.', $background_name));

            $background_name = "New-Profile-background-" . rand(0000, 9999) . '.' . $ext;
            $src_path = $_FILES['background']['tmp_name'];
            $dest_path = "../images/profile/background/" . $background_name;

            $upload = move_uploaded_file($src_path, $dest_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload new background.</div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');
                die();
            }

            if ($current_background != "") {
                $remove_path = "../images/profile/background/" . $current_background;

                $remove = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current background.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                    die();
                }
            }
        } else {
            $background_name = $current_background;
        }
    } else {
        $background_name = $current_background;
    }

    $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        background_name = '$background_name',
        image_name = '$image_name'
        WHERE id='$id'
        ";

    // echo $sql;
    // die;

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to edit Admin.</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
?>

<?php include('partials/footer.php'); ?>