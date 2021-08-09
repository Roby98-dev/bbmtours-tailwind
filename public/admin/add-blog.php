<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Add Blog</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <div class="wrapper">
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="slug" placeholder="Title of the Blog">
                    </td>
                </tr>

                <tr>
                    <td>Excerpt: </td>
                    <td>
                        <textarea name="excerpt" cols="30" rows="5" placeholder="Excerpt of the Blog."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Body: </td>
                    <td>
                        <textarea name="body" id="editor1" placeholder="Body of the Blog." class=""></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                            $sql = "SELECT * FROM tbl_blog_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                            ?>
                                    <option value="<?= $id; ?>"><?= $title; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Category Found</option>
                            <?php
                            }
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Finish
                        <input type="radio" name="active" value="No" checked> Draf
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="author" value="<?= $_SESSION['user_id']; ?>" class="hidden">
                        <input type="submit" name="submit" value="Add Blog" class="bg-green-500 py-2 px-4 rounded-full text-gray-100 cursor-pointer">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            $slug = $_POST['slug'];
            $excerpt = $_POST['excerpt'];
            $body = $_POST['body'];
            $category = $_POST['category'];
            $author = $_POST['author'];

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));

                    $image_name = "Blog-bbmt-" . rand(0000, 9999) . "." . $ext;

                    $src = $_FILES['image']['tmp_name'];

                    $dst = "../images/demo/" . $image_name;

                    $upload = move_uploaded_file($src, $dst);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location:' . SITEURL . 'admin/add-blog.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }

            $sql2 = "INSERT INTO tbl_blog SET 
                    slug = '$slug',
                    excerpt = '$excerpt',
                    body = '$body',
                    image_name = '$image_name',
                    category_id = '$category',
                    active = '$active',
                    user_id = '$author'
                ";

            // echo $sql2;
            // die;

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $_SESSION['add'] = "<div class='text-green-900 bg-green-300 px-5 py-2 rounded-lg'>Blog Added Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-blog.php');
            } else {
                $_SESSION['add'] = "<div class='text-red-900 bg-red-300 px-5 py-2 rounded-lg'>Failed to Add blog.</div>";
                header('location:' . SITEURL . 'admin/manage-blog.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>