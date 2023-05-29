<?php
require '1_conn.php';


if(isset($_POST['addOrder'])) {

    // Get current date in ddmmyy format
    $today = date("dmy");

    // Get the highest ID for today
    $sql = "SELECT MAX(order_id) AS max_id FROM order_table WHERE order_id LIKE 'ORD$today%'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['max_id'] ?? "ORD$today" . "000";

    // Extract the autoincrement part from the ID
    $last_num = substr($last_id, -2);

    // Increment the autoincrement part and pad with leading zeros
    $new_num = str_pad($last_num + 1, 3, '0', STR_PAD_LEFT);

    // Combine the parts to create the new ID
    $new_id = "ORD" . $today . $new_num;


    $product_id = $_POST['pid'];
    $user_id = $_POST['uid'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $total_prices = $_POST['total_prices'];

    $addOrderQ = mysqli_query($conn, "INSERT INTO order_table VALUES ('', '$new_id', '$user_id', '$product_id', '$product_quantity', '$total_prices', 'Not-Paid')");

    if($addOrderQ) {
        $next_q = mysqli_query($conn, "SELECT * FROM order_table WHERE order_id = '$new_id'");

        if($next_q) {
           $row = mysqli_fetch_assoc($next_q);
           
           header("Location: ../order_details.php?oid=$row[order_id]");
        }

    }
}