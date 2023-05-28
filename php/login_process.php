<?php
session_start();
require '1_conn.php';

// Variable
$username = strtolower($_POST['username']);
$password = $_POST['password'];

// Checking rows that have the variable like users input
$checking_row = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' or email_address='$username'");

if(mysqli_num_rows($checking_row) === 1) {
    $row = mysqli_fetch_assoc($checking_row);

    if(password_verify($password, $row['password'])) {
        // Start Session
        $user_id = $row['user_id'];
        $_SESSION['login'] = TRUE;
        $_SESSION['user_id'] = $user_id;
        
        setcookie('secret', $row['user_id'], time() + (5 * 24 * 60 * 60), '/', '', true, true);
        setcookie('secret1', hash('sha256', $row['username']), time() + (5 * 24 * 60 * 60), '/', '', true, true);

        header("Location: ../index.php");
    } else {
        header("Location: ../login.php?login=wrongpassword");
    }
} else {
    header("Location: ../login.php?$username=notregistered");
}