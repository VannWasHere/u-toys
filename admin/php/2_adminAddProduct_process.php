<?php
require '1_conn.php';

if (isset($_POST['submit'])) {  
    //Date (Asia Timezone)
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y-m-d H:i:s");

    // Taking Variable
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_subcategory = $_POST['product_subcategory'];
    $product_details = htmlspecialchars($_POST['product_details']); 

    // Product Photos Management
    $file_name = $_FILES['product_photos']['name'];
    $file_size = $_FILES['product_photos']['size'];
    $file_error = $_FILES['product_photos']['error'];
    $file_tmp = $_FILES['product_photos']['tmp_name'];

    if ($file_error === 4) {
        header("Location: ../index.php?upload=nofileupload");
    }

    // Filtering Image Extention
    $image_ext_filter = ['jpg', 'jpeg', 'png'];
    $image_ext = explode('.', $file_name);
    $image_ext = strtolower(end($image_ext));

    if(!in_array($image_ext, $image_ext_filter)) {
        header("Location: ../index.php?upload=yournotuploadingimages");
    }

    // Generating Random Name Files
    $new_file_name = uniqid();
    $new_file_name .= '.';
    $new_file_name .= $image_ext;

    move_uploaded_file($file_tmp, '..\..\images\\' . $new_file_name );

    $inserting_query = mysqli_query($conn, "INSERT INTO product VALUES('', '$product_name', '$product_price', '$product_category', '$product_subcategory', '$product_details', '$new_file_name', '$date', NULL)");

    if ($inserting_query) {
        header("Location: ../index.php?upload=success");
    } else {
        header("Location: ../index.php?upload=failed");
    }
}