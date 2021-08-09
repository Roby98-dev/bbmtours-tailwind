<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Edit Category</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="wrapper">

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_category WHERE id=$id";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        } else {
            header('location:' . SITEURL . 'admin/manage-category.php');
        }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?= $title; ?>" class="px-1 py-2 outline-none">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if ($current_image != "") {
                        ?>
                            <img src="<?= SITEURL; ?>images/category/<?= $current_image; ?>" width="150px">
                        <?php
                        } else {
                            echo "<div class='error'>Image Not Added.</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="Yes"> Yes

                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?= $current_image; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="submit" name="submit" value="Save" class="bg-green-500 rounded-full px-4 py-1 my-2 cursor-pointer">
                    </td>
                </tr>

            </table>

        </form>

        <?php

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                //Check whether the image is available or not
                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));

                    $image_name = "New_Destination_Category_" . rand(000, 999) . '.' . $ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
        ?>
                        <script>
                            window.location = "manage-category.php";
                        </script>
                        <?php
                        die();
                    }

                    if ($current_image != "") {
                        $remove_path = "../images/category/" . $current_image;

                        $remove = unlink($remove_path);
                        if ($remove == false) {
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                        ?>
                            <script>
                                window.location = "manage-category.php";
                            </script>
                <?php
                            die();
                        }
                    }
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }

            //3. Update the Database
            $sql2 = "UPDATE tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active' 
                    WHERE id=$id
                ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {

                $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                ?>
                <script>
                    window.location = "manage-category.php";
                </script>
            <?php
            } else {
                $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
            ?>
                <script>
                    window.location = "manage-category.php";
                </script>
        <?php
            }
        }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>