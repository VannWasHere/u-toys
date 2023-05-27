<?php

require '1_conn.php';

$user_id = $_POST['user_id'];
$receiver_name = $_POST['receiver_name'];
$receiver_number = $_POST['receiver_number'];
$receiver_province = $_POST['receiver_province'];
$receiver_city = $_POST['receiver_city'];
$receiver_address = $_POST['receiver_address'];

$insert_query = mysqli_query($conn, "INSERT INTO user_address VALUES('', '$user_id', '$receiver_name', '$receiver_number', '$receiver_province', '$receiver_city', '$receiver_address')");

if($insert_query) {
    header("Location: ../addAddress.php?q=success");
} else {
    header("Location: ../addAddress.php?q=failed");
}