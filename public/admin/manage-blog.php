<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Manage Blog</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <a href="<?= SITEURL; ?>admin/add-itinarary.php" class="bg-blue-500 rounded px-4 py-2 text-gray-100">Add Blog</a>

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
    <div class="py-5 overflow-x-scroll">
        <table id="blog_data" class="tbl-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Excerpt</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT tbl_blog.id, tbl_blog.slug, tbl_blog.body, tbl_blog.image_name AS image_thumb, tbl_blog.created_at, tbl_blog.user_id, tbl_blog.category_id, tbl_blog.active, tbl_admin.username, tbl_blog_category.title 
                FROM ((tbl_blog 
                INNER JOIN tbl_admin 
                ON tbl_blog.user_id = tbl_admin.id) 
                INNER JOIN tbl_blog_category 
                ON tbl_blog.category_id = tbl_blog_category.id) 
                WHERE tbl_blog.active = 'Yes' 
                ORDER BY tbl_blog.id DESC;";

                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $i = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $slug = $row['slug'];
                        $category = $row['title'];
                        $image_name = $row['image_thumb'];
                        $excerpt = $row['body'];
                        $active = $row['active'];
                        $author = $row['username'];
                ?>
                        <tr>
                            <td><?= $i++; ?>. </td>
                            <td><?= $slug = substr($slug, 0, 50); ?></td>
                            <td><?= $category; ?></td>
                            <td><?= $author; ?></td>
                            <td>
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='error'>Image not Added.</div>";
                                } else {
                                ?>
                                    <img src="<?= SITEURL; ?>images/demo/<?= $image_name; ?>" class="h-20 w-60 bg-indigo-500 rounded-lg object-cover shadow-lg object-center" />
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $excerpt = substr($excerpt, 0, 50); ?>...</td>
                            <td><?= $active; ?></td>
                            <td class="flex items-center">
                                <a href="<?= SITEURL; ?>admin/update-blog.php?id=<?= $id; ?>" class="bg-green-500 rounded-full px-3 py-1 mx-1">Edit</a>
                                <a href="<?= SITEURL; ?>admin/delete-blog.php?id=<?= $id; ?>&image_name=<?= $image_name; ?>" class="bg-red-500 rounded-full px-3 py-1 mx-1">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>