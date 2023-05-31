<?php
session_start();

if(!isset($_SESSION['admin-login'])) {
    header("Location: adminLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/userOrder.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="admin-container">
    <?php
        include '../component/admin_sidebar.php';
    ?>
        <div class="admin-content">
            <h2 id="h2-header">Order List</h2>
            <div class="table-container">
                <table class="table order-list-table">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'php/1_conn.php';
                        $q = mysqli_query($conn, "SELECT *, REPLACE(FORMAT(subtotal, 0), ',', '.') AS formatted_prices FROM invoice JOIN order_table ON invoice.order_id = order_table.order_id JOIN product ON invoice.product_id = product.product_id JOIN user ON invoice.user_id = user.user_id WHERE invoice.payment_status = 'Pending'");

                        while($row = mysqli_fetch_array($q)) {
                        echo "
                        <tr id='user-order-rows' onclick=\"window.location.href = 'index.php';\">
                            <td>$row[invoice_id]</td>
                            <td>$row[username]</td>
                            <td>$row[product_name]</td>
                            <td>$row[product_quantity]</td>
                            <td>Rp. $row[subtotal]</td>
                            <td>$row[payment_status]</td>
                        </tr>
                        ";
                    }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JS LINK -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>