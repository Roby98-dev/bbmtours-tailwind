<?php include('partials/menu.php'); ?>

<div class="bg-gray-200 md:ml-16 lg:ml-60 px-2 py-10">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <table id="order_data" class="">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the Rows
                $count = mysqli_num_rows($res);

                $i = 1;

                if ($count > 0) {
                    //Order Available
                    while ($row = mysqli_fetch_assoc($res)) {
                        //Get all the order details
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];

                ?>

                        <tr>
                            <td><?= $i++; ?>. </td>
                            <td><?= $food; ?></td>
                            <td><?= $price; ?></td>
                            <td><?= $qty; ?></td>
                            <td><?= $total; ?></td>
                            <td><?= $order_date; ?></td>

                            <td>
                                <?php
                                // Ordered, On Delivery, Delivered, Cancelled

                                if ($status == "Ordered") {
                                    echo "<label>$status</label>";
                                } elseif ($status == "On Delivery") {
                                    echo "<label style='color: orange;'>$status</label>";
                                } elseif ($status == "Delivered") {
                                    echo "<label style='color: green;'>$status</label>";
                                } elseif ($status == "Cancelled") {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                                ?>
                            </td>
                            <td><?= $customer_name; ?></td>
                            <td><?= $customer_contact; ?></td>
                            <td><?= $customer_email; ?></td>
                            <td><?= $customer_address; ?></td>
                            <td>
                                <a href="<?= SITEURL; ?>admin/update-order.php?id=<?= $id; ?>" class="btn-secondary">Update Order</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>