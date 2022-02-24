<?php include('partials/menu.php'); ?>

<div class="md:ml-16 lg:ml-60 px-2 py-10">
    <div class="py-5">
        <h1 class="text-center text-green-500 font-semibold text-2xl uppercase">Welcome <?= $_SESSION['user']; ?>!</h1>
        <div class="flex justify-center">
            <div class="h-1 w-24 mb-3 bg-green-500"></div>
        </div>
        <h1 class="text-center text-gray-500 text-lg uppercase">Dashboard</h1>
    </div>

    <div class="flex justify-center">
        <div class="flex max-w-6xl mx-auto w-full my-5 justify-center">
            <div class="mx-4">
                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-3 max-w-6xl mx-auto w-full">
            <div class="flex justify-center">
                <div class="mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500 mx-auto">
                    <?php
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                        <h1><?= $count; ?></h1>
                        <p>Categories</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mx-auto mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500">
                    <?php
                    $sql5 = "SELECT * FROM tbl_blog";
                    $res5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($res5);
                    ?>
                    <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                        <h1><?= $count5; ?></h1>
                        <p>Blog</p>
                    </div>
                </div>
            </div>


            <div class="flex justify-center">
                <div class="mx-auto mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500">
                    <?php
                    $sql2 = "SELECT * FROM tbl_food";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                    ?>

                    <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                        <h1><?= $count2; ?></h1>
                        <p>Itinerary</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mx-auto mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500">
                    <?php
                    $sql3 = "SELECT * FROM tbl_order";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                    ?>

                    <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                        <h1><?= $count3; ?></h1>
                        <p>Orders</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="mx-auto mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500">
                    <?php
                    $sql6 = "SELECT * FROM tbl_admin";
                    $res6 = mysqli_query($conn, $sql6);
                    $count6 = mysqli_num_rows($res6);
                    ?>
                    <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                        <h1><?= $count6; ?></h1>
                        <p>User</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <?php if ($_SESSION['user_grade'] == 1) { ?>
                    <div class="mx-auto mb-2 text-center h-20 w-60 hover:bg-green-200 transition duration-300 rounded-xl flex justify-center border border-indigo-500 hover:border-red-500">

                        <?php
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $total_revenue = $row4['Total'];
                        ?>

                        <div class="text-center py-4 hover:font-bold transition duration-300 text-indigo-500">
                            <h1>Rp <?= $total_revenue; ?></h1>
                            <p>Revenue <?= date('M Y'); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>