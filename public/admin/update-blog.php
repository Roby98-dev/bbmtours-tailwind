<?php include('partials/menu.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM tbl_blog WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $slug = $row2['slug'];
    $excerpt = $row2['excerpt'];
    $body = $row2['body'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_title'];
    $author = $row2['author'];
    $active = $row2['active'];
} else {
    header('location:' . SITEURL . 'admin/manage-blog.php');
}
?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Edit Blog</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="max-w-6xl mx-auto w-full">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="bg-gray-200 p-2 rounded">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-2">
                            <label>Title </label>
                            <br>
                            <input type="text" name="slug" value="<?= $slug; ?>" class="h-20 w-full rounded-lg px-4">
                        </div>
                        <div class="p-2">
                            <label>Excerpt </label>
                            <br>
                            <textarea name="excerpt" class="h-20 w-full rounded-lg p-4"><?= $excerpt; ?></textarea>
                        </div>
                    </div>


                    <div class="px-2">
                        <label>Body</label>
                        <textarea name="body" id="editor1"><?= $body; ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 py-5">
                        <div class="mb-5">
                            <div class="px-2">
                                <label>Current Image</label>
                                <?php
                                if ($current_image == "") {
                                    echo "<div class='error'>Image not Available.</div>";
                                } else {
                                ?>
                                    <img src="<?= SITEURL; ?>images/demo/<?= $current_image; ?>" class="h-40 w-full bg-indigo-500 rounded-lg object-cover shadow-lg object-center" />
                                <?php
                                }
                                ?>
                            </div>

                            <div class="mt-4">
                                <div class="bg-indigo-200 rounded-lg p-2">
                                    <label>New Image </label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 px-2">
                            <div>
                                <label>Category: </label>
                                <select name="category">
                                    <?php
                                    $sql = "SELECT * FROM tbl_blog_category WHERE active='Yes'";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);

                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $category_title = $row['title'];
                                            $category_id = $row['id'];
                                    ?>
                                            <option <?php if ($current_category == $category_title) {
                                                        echo "selected";
                                                    } ?> value="<?= $category_id; ?>"><?= $category_title; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "<option value='0'>Category Not Available.</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mt-4">
                                <label>Active: </label>
                                <input <?php if ($active == "Yes") {
                                            echo "checked";
                                        } ?> type="radio" name="active" value="Yes"> Yes
                                <input <?php if ($active == "No") {
                                            echo "checked";
                                        } ?> type="radio" name="active" value="No"> No
                            </div>
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                        <input type="hidden" name="current_image" value="<?= $current_image; ?>">

                        <input type="submit" name="submit" value="Save" class="bg-green-200 cursor-pointer text-green-800 rounded-full border border-green-800 px-4 py-1">
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {

                $id = $_POST['id'];
                $user_id = $_POST['user_id'];
                $slug = $_POST['slug'];
                $excerpt = $_POST['excerpt'];
                $body = $_POST['body'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $active = $_POST['active'];


                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "") {

                        $ext = end(explode('.', $image_name));

                        $image_name = "New-blog-image-" . rand(0000, 9999) . '.' . $ext;

                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/demo/" . $image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            header('location:' . SITEURL . 'admin/manage-blog.php');
                            die();
                        }

                        if ($current_image != "") {
                            $remove_path = "../images/demo/" . $current_image;

                            $remove = unlink($remove_path);

                            if ($remove == false) {
                                $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                header('location:' . SITEURL . 'admin/manage-blog.php');
                                die();
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image;
                }

                $sql3 = "UPDATE tbl_blog SET 
                    slug = '$slug',
                    excerpt = '$excerpt',
                    body = '$body',
                    image_name = '$image_name',
                    category_id = '$category',
                    active = '$active'
                    WHERE id=$id
                ";

                // echo $sql3;
                // die;

                $res3 = mysqli_query($conn, $sql3);

                if ($res3 == true) {
                    $_SESSION['update'] = "<div class='success'>Blog Updated Successfully.</div>";
                    header('location:' . SITEURL . 'admin/manage-blog.php');
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update blog.</div>";
                    header('location:' . SITEURL . 'admin/manage-blog.php');
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>