# 🥘 BBMT Company Website

In this course, you'll learn to Create a Complete Dynamic and Fully Functional Website using PHP prrogramming language and MySQL Database.

# ⚙️ Technology Used

1. HTML5
2. CSS3
3. Core/Procedural PHP programming language
4. MySQL Relational Database

# 🧰 Features

1. Visitors/Users can browse all the Categories and Food Items.
2. They also can order easily from the website.
3. Admin can Manage Admin, Caegories and Food Items
4. Admin can also Manage and Track Food Order and Delivery

```php
<?php
//Start Session
session_start();

//Create Constants to Store Non Repeating Values
define('SITEURL', 'http://localhost/food-order/'); //Update the home URL of the project if you have changed port number or it's live on server
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database

?>
```

6. Now, Open the project in your browser. It should run perfectly.
