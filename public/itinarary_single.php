<?php include('partials-front/header.php'); ?>
<?php include('partials-front/navbar.php'); ?>

<?php
if (isset($_GET['itinarary_id'])) {
    $id = $_GET['itinarary_id'];
    $sql = "SELECT * FROM tbl_itinarary WHERE id = $id";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);


    $image_name = $row['image_name'];
    $title = $row['title'];
    $body = $row['description'];
    $price = $row['price'];
} else {
    header('location:' . SITEURL . 'homepage.php');
}
?>

<section class="">
    <div class="flex justify-center">
        <div class="mx-auto w-full">
            <div style="background-image: url(<?= $image_name; ?>);" class="h-96 w-full bg-cover bg-center bg-no-repeat">
                <div class="h-full bg-gradient-to-t from-black w-full">
                    <div class="h-full w-full md:p-5 p-2 relative max-w-3xl mx-auto">
                        <div class="absolute bottom-2 flex items-center">
                            <h1 class="text-indigo-700 text-sm bg-green-200 px-2 rounded-full font-semibold"><?= $title; ?></h1>
                        </div>
                        <div class="absolute bottom-2 flex items-center md:right-5 right-2">
                            <table>
                                <tr>
                                    <td class="text-gray-400 mx-2">Harga hari ini:</td>
                                </tr>
                                <tr>
                                    <td class="text-gray-100 text-sm font-semibold">Rp <?= $price; ?>/Pax</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="max-w-3xl mx-auto w-full py-5 border-b border-gray-200">
            <h1><?= $body; ?></h1>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>