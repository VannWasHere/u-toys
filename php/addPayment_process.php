<?php
require '1_conn.php';

if(isset($_POST['addPayment'])) {
    // Create ID
    // Get current date in ddmmyy format
    $today = date("dmy");

    // Get the highest ID for today
    $sql = "SELECT MAX(order_id) AS max_id FROM invoice WHERE invoice_id LIKE 'PAY$today%'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['max_id'] ?? "PAY$today" . "000";

    // Extract the autoincrement part from the ID
    $last_num = substr($last_id, -2);

    // Increment the autoincrement part and pad with leading zeros
    $new_num = str_pad($last_num + 1, 3, '0', STR_PAD_LEFT);

    // Combine the parts to create the new ID
    $invoice_id = "PAY" . $today . $new_num;

    $invoice_id; //Invoice ID
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $address_id = $_POST['address_id'];
    $subtotal = $_POST['total_prices'];
    $expedition_name = $_POST['expedition_name'];
    $expedition_type = $_POST['expedition_type'];
    $estimated = $_POST['estimated_date'];
    $status = "Pending";

    date_default_timezone_set("Asia/Jakarta");
    $payment_created = date("Y-m-d H:i:s");

    // Queries 
    $insert_invoice = mysqli_query($conn, "INSERT INTO invoice VALUES(
        '$invoice_id',
        '$order_id',
        '$product_id',
        '$user_id',
        '$address_id',
        '$subtotal',
        '$expedition_name',
        '$expedition_type',
        '$estimated',
        '$status',
        '$payment_created'
    )");

    if($insert_invoice) {
        $checking_q = mysqli_query($conn, "SELECT * FROM invoice WHERE invoice_id='$invoice_id'");

        $row = mysqli_fetch_assoc($checking_q);

        header("Location: ../midtrans-request/examples/snap/checkout-process-simple-version.php?order_id=$row[invoice_id]");
    }
} else {
    header("Location: ../index.php");
}