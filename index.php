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
    <title>Home</title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <!-- Link JS -->
    <script src="js/carousel.js"></script>
</head>
<body>

<?php
include 'component/header.php';
include 'component/navigation_bar.php';
?>
    <!-- Carousel Container -->
    <div class="slider-container">
        <div class="images-sec-container">
            <div class="images-slide fade-animation">
                <img src="assets/banner1.jpg" alt="image1" class="image-content">
            </div>
            <div class="images-slide another fade-animation">
                <img src="assets/banner2.jpg" alt="image2" class="image-content">
            </div>
            <div class="images-slide another fade-animation">
                <img src="assets/banner3.jpg" alt="image3" class="image-content">
            </div>
            
            <!-- Next and previous buttons -->
            <a class="prev" onclick="nextSlide(1)">&#10094;</a>
            <a class="next" onclick="prevSlide(1)">&#10095;</a>
        </div>
    </div>

    <div class="content-container">
        <div class="home-products-category">
            <h1 class="home-products-h1">Products Category</h1>
            <div class="home-products-category-container">
                <!-- Examples -->
                <div class="category-examples" onclick="window.location.href = 'product.php?cat=puzzle'" id="puzzle-category">
                    <div class="h3-container">
                        <h3>Puzzle</h3>
                    </div>
                </div>

                <div class="category-examples" onclick="window.location.href = 'product.php?cat=rubic'" id="cube-category">
                    <div class="h3-container">
                        <h3>Cube</h3>
                    </div>
                </div>

                <div class="category-examples" onclick="window.location.href = 'product.php?cat=board-game'" id="board-category">
                    <div class="h3-container">
                        <h3>Board Game</h3>
                    </div>
                </div>

                <div class="category-examples" onclick="window.location.href = 'product.php?cat=card-game'" id="card-category">
                    <div class="h3-container">
                        <h3>Card</h3>
                    </div>
                </div>

            </div>
        </div>
        <div class="home-products">
            <h1 class="home-products-h1">Our Products</h1>
            <div class="product-grid-card-container">

            <?php

            $queries = mysqli_query($conn, "SELECT * FROM product ORDER BY RAND() LIMIT 8");
            while($row = mysqli_fetch_array($queries)) {
                echo "
                <div class='card-container' onclick=\"location.href='product_details.php?id=$row[product_id]'\">
                    <a id='product-card'>
                        <div class='product-images-container'>
                            <img src='images/$row[product_photos]' alt='$row[product_name]' class='product-images'>
                        </div>
                        <div class='product-description'>
                            <p class='product-name'>$row[product_name]</p>
                            <p class='product-category' style='text-transform:uppercase;'>$row[product_category]</p>
                            <p class='product-price product-prices'>IDR $row[product_prices]</p>
                            <div class='detail-and-addcart'>
                                <button type='button' class='see-details-button'>See Detail</button>
                                <form action='php/addtocart_process.php' method='post'>
                                    <input type='text' name='user_id' value='$_SESSION[user_id]' hidden>    
                                    <input type='text' name='product_id' value='$row[product_id]' hidden>
                                    <button type='submit' class='add-to-cart'>Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>   
                ";
            }
            
            ?>   
            </div>
        </div>
    </div>

    <div class="container-footer">
        <footer>
            
        </footer>
    </div>

    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/isLogin.js"></script>
    <script src="js/prices_formatter.js"></script>

</body>
</html>