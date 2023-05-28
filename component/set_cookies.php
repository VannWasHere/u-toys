<?php
if(!isset($_SESSION['login'])) {
    if(isset($_COOKIE['secret']) && isset($_COOKIE['secret1'])) {
        // Take the values on cookies
        $cookies_id = $_COOKIE['secret'];
        $cookies_uname = $_COOKIE['secret1'];
    
        // Take the row from cookies_id var
        $checking_cookies = mysqli_query($conn, "SELECT username FROM user WHERE user_id = '$cookies_id'");
        $rows = mysqli_fetch_assoc($checking_cookies);
    
        // Compare Hash Username 
        if ($cookies_uname === hash('sha256', $rows['username'])) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $cookies_id;
        }
    }
}