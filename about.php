<?php
session_start();
require 'php/1_conn.php';
require 'component/set_cookies.php';
// Check the login status and set a PHP variable
$loggedIn = isset($_SESSION["login"]) && $_SESSION["login"] === true;

// Pass the login status to JavaScript
echo "<script>var isLoggedIn = " . ($loggedIn ? "true" : "false") . ";</script>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/about.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>
<?php
include 'component/header.php';
include 'component/navigation_bar.php';
?>
    <!-- Konten -->
    <div class="container">
        <div class="logo-about-us">
            <center>
                <img src="assets/toys.png" alt="Logo">
            </center>
        </div>
        <div class="desc-logo">
            <center>
                <p>
                    <b>U-Toys Boardgame & Puzzle &trade;</b>
                </p>
            </center>
        </div>
    </div>
    <div class="grid-container">
        <div class="left-grid">
            <!-- Tiktok images -->
            <a href="https://www.tiktok.com/@utoys.boardgame" id="tiktok-logos" target="_blank"><img src="assets/tiktok_logo.png" class="soc-logo" alt="Tiktok Logo"></a>
            <p class="soc-p">TikTok</p>
        </div>
        <div class="right-grid">
            <!-- Instagram images -->
            <a href="https://www.instagram.com/utoys.boardgame/" id="ig-logos" target="_blank"><img src="assets/instagram_logo.png" class="soc-logo" alt="Instagram Logo"></a>
            <p class="soc-p">Instagram</p>
        </div>
    </div>
</body>
</html>