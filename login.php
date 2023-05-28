<?php
session_start();
require 'php/1_conn.php';

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

if(isset($_SESSION['login']) == TRUE) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="image-login">
            <img src="https://images.unsplash.com/photo-1553517491-0d108eea9147?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1228&q=80" class="cover" alt="Toys Images">
        </div>
        <div class="form-login">
            <div class="login-header">
                <h2 id="login-h2">Welcome to U-Toys!</h2>
                <h3 id="slogan-h3">Hip Hip Hura Hura</h3>
            </div>

            <!-- Login Form -->
            <div class="login-form">
                <form action="php/login_process.php" method="post">
                    <input type="text" class="login-input" name="username" id="input-username" autocomplete="off" placeholder="Username or Email" required> <br>
                    <input type="password" class="login-input" name="password" id="input-password" autocomplete="off" placeholder="Password" required>
                    <p id="forgot-password">Forgot Password?</p>

                    <!-- Submit Button -->
                    <button type="submit" id="login-button">Sign In</button>
                </form>
            </div>
            <p id="register">If you don't have an account, <a href="register.php" style="cursor: pointer; color: #282A3A;">click here</a> to register!</p>
        </div>
    </div>

    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JQuery Code -->
    <script>
        $('#input-username, #input-password').on('input', function() {
            var username = $('#input-username').val();
            var password = $('#input-password').val();

            if (username !== '' && password !== '') {
                $('#login-button').addClass('active');
            } else {
                $('#login-button').removeClass('active');
            }
        });
    </script>
</body>
</html>