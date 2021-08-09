<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Add User</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="wrapper">
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Select bg Image: </td>
                    <td>
                        <input type="file" name="background">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
            </table>

            <div>
                <div class="py-2">
                    <input type="submit" name="submit" value="Add User" class="bg-green-500 text-gray-100 py-1 rounded-full px-2">
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "Profile-User-" . rand(0000, 9999) . "." . $ext;
            $src = $_FILES['image']['tmp_name'];
            $dst = "../images/profile/" . $image_name;
            $upload = move_uploaded_file($src, $dst);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                header('location:' . SITEURL . 'admin/add-admin.php');
                die();
            }
        }
    } else {
        $image_name = "";
    }

    if (isset($_FILES['background']['name'])) {
        $background_name = $_FILES['background']['name'];

        if ($background_name != "") {
            $ext = end(explode('.', $background_name));

            $background_name = "Background-User-" . rand(0000, 9999) . "." . $ext;

            $src = $_FILES['background']['tmp_name'];

            $dst = "../images/profile/background/" . $background_name;

            $upload = move_uploaded_file($src, $dst);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload background.</div>";
                header('location:' . SITEURL . 'admin/add-admin.php');
                die();
            }
        }
    } else {
        $background_name = "";
    }

    $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            username = '$username',
            image_name = '$image_name',
            background_name = '$background_name',
            password = '$password'
        ";

    // echo $sql;
    // die;

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add admin.</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
?>