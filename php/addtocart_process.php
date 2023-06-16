<?php
require '1_conn.php';

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];

$query = mysqli_query($conn, "INSERT INTO cart VALUES ('', '$user_id', '$product_id')");

if($query) {
    header("Location: ../cart.php");
} else {
    header("Location: ../index.php");
}