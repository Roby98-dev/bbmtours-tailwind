<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">

    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Add Itinarary</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <div>Title: </div>
            <div>
                <input type="text" name="title" placeholder="Title" class="px-1 py-2 rounded-lg">
            </div>
        </div>

        <div>
            <div>Description: </div>
            <div>
                <textarea name="description" id="editor1" placeholder="Description" class="px-1 py-2 rounded-lg"></textarea>
            </div>
        </div>

        <div>
            <div>Price: </div>
            <div>
                <input type="number" name="price" placeholder="price" class="px-1 py-2 rounded-lg">
            </div>
        </div>

        <div>
            <div>Image Link: </div>
            <div>
                <input type="text" name="image_name" placeholder="Link Image" class="px-1 py-2 rounded-lg">
            </div>
        </div>

        <div>
            <div>Link Page: </div>
            <div>
                <input type="text" name="link" placeholder="Link Page" class="px-1 py-2 rounded-lg">
            </div>
        </div>

        <div class="my-5">
            <div>Destination: </div>
            <div>
                <select name="category">
                    <?php
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

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
            </div>
        </div>

        <div class="my-5">
            <div>Day: </div>
            <div>
                <select name="day">
                    <?php
                    $sql3 = "SELECT * FROM tbl_day";

                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);

                    if ($count3 > 0) {
                        while ($row = mysqli_fetch_assoc($res3)) {
                            $id = $row['id'];
                            $day = $row['day'];
                    ?>
                            <option value="<?= $id; ?>"><?= $day; ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <option value="0">No Day Found</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="my-5">
            <div>Featured: </div>
            <div>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </div>
        </div>

        <div class="my-5">
            <div>Active: </div>
            <div>
                <input type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </div>
        </div>

        <div>
            <div colspan="2">
                <input type="submit" name="submit" value="Add Itinarary" class="btn-secondary">
            </div>
        </div>
    </form>


    <?php
    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $day = $_POST['day'];
        $link = $_POST['link'];

        if (isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        } else {
            $featured = "No";
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "No";
        }

        if (isset($_POST['image_name'])) {
            $image_name = $_POST['image_name'];
        } else {
            $image_name = "Kosong";
        }

        $sql2 = "INSERT INTO tbl_itinarary SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    destination_id = $category,
                    featured = '$featured',
                    active = '$active',
                    day_id = '$day',
                    link = '$link'
                ";

        // echo $sql2;
        // die;

        $res2 = mysqli_query($conn, $sql2);

        if ($res2 == true) {
            $_SESSION['add'] = "<div class='success'>Itinarary Added Successfully.</div>";
    ?>
            <script>
                window.location = "index.php";
            </script>
        <?php
        } else {
            $_SESSION['add'] = "<div class='error'>Failed.</div>";
        ?>
            <script>
                window.location = "add-itinarary.php";
            </script>
    <?php
        }
    }
    ?>
</div>

<?php include('partials/footer.php'); ?>