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
    <title>My Cart</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/cart.css">

    <!-- Link JS -->
    <script src="js/cart.js"></script>
</head>
<body>
<?php
include 'component/header.php';
include 'component/navigation_bar.php';
?>

        <div class="cart-container">
            <h2 style="letter-spacing: 2px; margin-bottom: 1%;">Shopping Cart</h2>
            <hr>

            <div class="cart-grid-container">
                <!-- Left Side -->
                <div class="left-container">

                    <!--Product Cart Container -->
                    <div class="cart-list-container">
                        <div class="title-container">
                            <h4 class="h4-title">Product</h4>
                            <h4 class="h4-title">Quantity</h4>
                            <h4 class="h4-title">Prices</h4>
                        </div>

                            <?php
                                require 'php/1_conn.php';

                                $cart_query = mysqli_query($conn, "SELECT * FROM cart JOIN user ON cart.user_id = user.user_id JOIN product ON cart.product_id = product.product_id WHERE cart.user_id = '$_SESSION[user_id]'");

                                while($row = mysqli_fetch_assoc($cart_query)) {
                                    echo "
                                    <div class='product-container'>
                                    <input type='checkbox' id='cart-checkbox'>
                                
                                        <div class='product-name'>
                                            <img class='images-product' src='images/$row[product_photos]' alt='$row[product_name]'>
                                            <p class='product-title'>$row[product_name]</p>
                                        </div>
            
                                        <div class='product-quantity'>
                                            <p>1</p>
                                        </div>
            
                                        <div class='product-prices'>
                                            <p>IDR $row[product_prices]</p>
                                        </div>
                                    </div>
                                    ";
                    }
                    ?>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="right-container">
                    <div class="order-summary-container">
                        <div class="p-cart-container">
                            <p class="cart-text">Subtotal</p>
                            <p class="cart-text">IDR 200.000</p>
                        </div>
                        <div class="p-cart-container">
                            <p class="cart-text">Discound</p>
                            <p class="cart-text">IDR 0</p>
                        </div>
                        <div class="p-cart-container">
                            <p class="cart-text">Total</p>
                            <p class="cart-text">IDR 200.000</p>
                        </div>
                        <button id="cart-order-button">Place Order</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="js/isLogin.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>