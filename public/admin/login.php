<?php include('../config/constants.php'); ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="<?= SITEURL; ?>assets/css/styles.css">
</head>

<body>
    <section class="px-2">
        <div class="mt-16 border border-indigo-500 rounded-md py-2">
            <div class="py-5">
                <h1 class="text-center text-green-500 font-semibold text-4xl uppercase">Login</h1>
                <div class="flex justify-center">
                    <div class="h-1 w-24 mb-3 bg-green-500"></div>
                </div>
            </div>

            <div class="h-auto">
                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                ?>

                <form action="" method="POST" class="text-center">
                    Username: <br>
                    <div class="my-2">
                        <input type="text" name="username" placeholder="Enter Username" class="rouded-full bg-gray-200 p-2">
                    </div>

                    Password: <br>
                    <div class="my-2">
                        <input type="password" name="password" placeholder="Enter Password" class="rouded-full bg-gray-200 p-2">
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn-primary rounded-full px-2 my-5">
                </form>

                <p class="text-center"><a href="<?= SITEURL; ?>homepage.php">Poinsla</a></p>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $user_id = $row['id'];
    $image_name = $row['image_name'];
    $user_grade = $row['user_grade'];

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Your success login</div>";
        $_SESSION['user'] = $username;
        $_SESSION['image'] = $image_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_grade'] = $user_grade;

        header('location:' . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        header('location:' . SITEURL . 'admin/login.php');
    }
}
?>