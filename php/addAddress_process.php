<?php

require '1_conn.php';

$user_id = $_POST['user_id'];
$receiver_name = $_POST['receiver_name'];
$receiver_number = $_POST['receiver_number'];
$receiver_province = $_POST['province_name'];
$receiver_city = $_POST['city_name'];
$receiver_address = $_POST['receiver_address'];

$receiver_province_explode = explode('|', $receiver_province);
$receiver_city_explode = explode('|', $receiver_city);

$insert_query = mysqli_query($conn, "INSERT INTO user_address VALUES('', '$user_id', '$receiver_name', '$receiver_number', '$receiver_province_explode[0]', '$receiver_province_explode[1]', '$receiver_city_explode[0]', '$receiver_city_explode[1]', '$receiver_address')");

if($insert_query) {
    header("Location: ../addAddress.php?q=success");
} else {
    header("Location: ../addAddress.php?q=failed");
}