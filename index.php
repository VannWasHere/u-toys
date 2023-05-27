<?php
session_start();

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
                <img src="https://images3.alphacoders.com/823/82317.jpg" alt="image1" class="image-content">
            </div>
            <div class="images-slide another fade-animation">
                <img src="https://images.alphacoders.com/475/475967.jpg" alt="image2" class="image-content">
            </div>
            <div class="images-slide another fade-animation">
                <img src="https://images3.alphacoders.com/147/147799.jpg" alt="image3" class="image-content">
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
                <div class="category-examples">Products 1</div>
                <div class="category-examples">Products 2</div>
                <div class="category-examples">Products 3</div>
                <div class="category-examples">Products 4</div>
            </div>
        </div>
        <div class="home-products">
            <h1 class="home-products-h1">Our Products</h1>
            <div class="product-grid-card-container">
                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="product-images-container">
                        <img src="https://www.drumondpark.com/site/product/24/productimg1_540x529.png?crc=rt1wn4" alt="" class="product-images">
                    </div>
                    <div class="product-description">
                        <p class="product-name">Logo the Board Game</p>
                        <p class="product-category">Board Game</p>
                        <p class="product-price">Rp.90.000,00</p>
                        <div class="detail-and-addcart">
                            <button type="button" class="see-details-button">See Detail</button>
                            <p class="add-to-cart">Add to Cart</p>
                        </div>
                    </div>
                </div>
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
</body>
</html>