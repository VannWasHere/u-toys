<?php
require '1_conn.php';

// Variable
$username = strtolower($_POST['username']);
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Date (Asia Timezone)
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i:s");

// Query Process
$checking_duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' OR email_address='$email'");

if(mysqli_num_rows($checking_duplicate) > 0) {
    header("Location: ../register.php?register=usernameoremailhasbeentaken");
    exit;
} else {
    $insert_user = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$email', NULL, '$hashed_password', NULL, NULL, '$date', NULL)");
    if($insert_user) {
        header("Location: ../login.php");
    } else {
        header("Location: ../register.php");
    }
}