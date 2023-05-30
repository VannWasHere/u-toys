<?php
require '1_conn.php';
session_start();

if(isset($_POST['admin-login'])) {    
    $username = $_POST['admin_name'];
    $password = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM utoys_website_admin");
    $row = mysqli_fetch_assoc($q);

    if($username === $row['admin_name']) {
        if($password === $row['admin_password']) {
            $_SESSION['admin-login'] = TRUE;
            header("Location: ../index.php");
        } else {
            header("Location: ../adminLogin.php?login=wrongpassword");
        }
    } else {
        header("Location: ../adminLogin.php?login=wrongusername");
    }
}