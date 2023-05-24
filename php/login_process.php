<?php
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

        header("Location: ../index.html");
    } else {
        header("Location: ../login.php?login=wrongpassword");
    }
} else {
    header("Location: ../login.php?$username=notregistered");
}