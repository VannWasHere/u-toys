<?php 
session_start();
require 'php/1_conn.php';
require 'component/not_error.php';
require 'component/set_cookies.php';

    // Check the login status and set a PHP variable
    $loggedIn = isset($_SESSION["login"]) && $_SESSION["login"] === true;

    // Pass the login status to JavaScript
    echo "<script>var isLoggedIn = " . ($loggedIn ? "true" : "false") . ";</script>";

    $queries = mysqli_query($conn, "SELECT * FROM product WHERE product_id='$_GET[id]'");
    $row = mysqli_fetch_assoc($queries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['product_name']; ?></title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/product_details.css">

</head>
<body>

<?php
include 'component/header.php';
include 'component/navigation_bar.php';
?>
    
    <section class="product-detail-container">
        <form action="" method="post">
            <div class="product-details-flex">

                <!-- Left Grid -->
                <div class="product-details-left">
                    <div class="images-container">
                        <img id="product-images" src="images/<?= $row['product_photos'];?>" alt="Board Game">
                        <br><br>
                    </div>
                </div>

                <!-- Middle Grid -->
                <div class="product-details-middle">

                    <p style="letter-spacing: 1px; color: rgb(159, 149, 149); text-transform:uppercase;"><?= $row['product_category'];?></p>
                    <h1 style="margin-top: 1.5%; text-transform: uppercase; letter-spacing: 0.8px;"><?= $row['product_name'];?></h1>
                    <p id="product-prices" class="product-prices">IDR <?= $row['product_prices'];?></p>
                    <hr>

                    <details open>
                        <summary style="margin-top: 2%; user-select: none;">About Product</summary>
                        <p id="product-description"><?=$row['product_details'];?></p>
                    </details>

                    <div class="shipping-option-container">
                        <p style="margin-top: 1%; letter-spacing: 1px; color: rgb(159, 149, 149);">Shipping To</p>
                        <select name="" id="shipping-option">
                            <option value='' selected>Select One</option>
                            <?php
                                $address_queries = mysqli_query($conn, "SELECT * FROM user_address WHERE user_id='$_SESSION[user_id]'");

                                while($address = mysqli_fetch_array($address_queries)) {
                                    echo "
                                    <option value='$address[receiver_address]'>$address[receiver_address]</option>
                                    ";
                                }
                            ?>
                        </select>
                    </div>

                </div>

                <!-- Right Grid -->
                <div class="product-details-right">
                    
                    <div class="order-summary-container">
                        <p style="font-weight: 600; padding-bottom: 1%; user-select: none;">Order Summary</p>
                        <hr>

                        <div class="flex-summary-container">

                            <div class="quantity-container">
                                <p class="p-summary">Quantity</p>
                                <div class="number-container">
                                    <button type="button" class="add-min-button" id="min-buttons">-</button>
                                    <input type="number" id="quantity-number" value="1" readonly>
                                    <button type="button" class="add-min-button" id="add-buttons">+</button>
                                </div>
                            </div>

                            <div class="price-container">
                                <p class="p-summary">Prices</p>
                                <p class="p-summary" id="prices">IDR <?= $row['product_prices']?></p>
                            </div>

                            <div class="buttons-container">
                                <button type="button" id="add-tocart-button">Add to Cart</button>
                                <button type="button" id="order-button">Place Order</button>
                            </div>
                        </div>
                    </div>
                    <input type="text" style="display: none;" value="<?= $_GET['id'];?>" name="uid">
                </div>
            </div>
        </form>
    </section>

    <div class="more-likethis-product">
        <div class="product-items-container">
            <div class="product-sidebar">
                <p style="letter-spacing: 1px; margin-bottom: 1%;"> <b>More Like LOGO THE BOARD GAME</b> </p>
            </div>
            <div class="product-grid-card-container">

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>


                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

                <div class="card-container">
                    <a href="product_details.html" id="product-card">
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
                    </a>
                </div>

            </div>
        </div>
    </div>


    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/quantityNumber_and_PriceCalculation.js"></script>
    <script src="js/isLogin.js"></script>
    <script src="js/prices_formatter.js"></script>

</body>
</html>