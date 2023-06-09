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
    <title>Our Products</title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/product.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

</head>
<body>
<?php
include 'component/header.php';
include 'component/navigation_bar.php';
?>

    <div class="page-container">
        <?php
            include 'component/product_header.php';
        ?>

        <div class="images-container">
            <img class="adds-image" id="cat-images" src="" alt="adds">
        </div>
        
        <div class="flex-container">
            <!-- Search Bar -->
            <div class="search-container">
                <label for="search-input" style="text-transform: uppercase; font-weight:600;">Search <?= $_GET['cat'];?> Product</label>
                <input type="search" name="product-search" id="user-search" placeholder="Ex: Monopoly" autocomplete="off">
                <input type="text" value="<?=$_GET['cat'];?>" id="prod_cat" style='display:none;'>
                <input type="text" value="<?=$_GET['sort'];?>" id="prod_filtering" style='display:none;'>
                 
            </div>
            <!-- Filter Product -->
            <div class="filter-container">
                <p>Sort based of</p>
                <!-- Dropdown Filter -->
                <select name="product-filter" id="product-filter">
                    <option value="">Select Filter</option>
                    <option value="clear" class="filter-opt">No Filter</option>
                    <option value="low-to-high-prices" class="filter-opt">Low to High Prices</option>
                    <option value="high-to-low-prices" class="filter-opt">High to Low Prices</option>
                </select>
            </div>
        </div>

        <div class="product-items-container">
            <div class="product-sidebar">
                <p style="letter-spacing: 1px;"> <b>Category</b> </p>
            </div>
            <div class="container-the-card" id="containing-card">
                <div class="product-grid-card-container">
                    <?php
                    if(isset($_GET['cat'])) {
                        $q_not_get = mysqli_query($conn, "SELECT *, REPLACE(FORMAT(product_prices, 0), ',', '.') AS formatted_prices FROM product WHERE product_category='$_GET[cat]' ORDER BY product_prices $_GET[sort]");
                        while($product = mysqli_fetch_array($q_not_get)) {
                            echo "
                            <div class='card-container'>
                                <a href='product_details.php?id=$product[product_id]' id='product-card'>
                                    <div class='product-images-container'>
                                        <img src='images/$product[product_photos]' alt='$product[product_name]' class='product-images'>
                                    </div>
                                    <div class='product-description'>
                                        <p class='product-name'>$product[product_name]</p>
                                        <p class='product-category' style='text-transform: uppercase;'>$product[product_category]</p>
                                        <p class='product-price'>Rp.$product[formatted_prices]</p>
                                        <div class='detail-and-addcart'>
                                            <button type='button' class='see-details-button'>See Detail</button>
                                            <form action='php/addtocart_process.php' method='post'>
                                                <input type='text' name='user_id' value='$_SESSION[user_id]' hidden>    
                                                <input type='text' name='product_id' value='$product[product_id]' hidden>
                                                <button type='submit' class='add-to-cart'>Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ";
                        }
                    } else if(isset($_GET['cat']) && isset($_GET['sort'])) {
                        while($product = mysqli_fetch_array($q_not_get)) {
                        echo "
                        <div class='card-container'>
                            <a href='product_details.php?id=$product[product_id]' id='product-card'>
                                <div class='product-images-container'>
                                    <img src='images/$product[product_photos]' alt='$product[product_name]' class='product-images'>
                                </div>
                                <div class='product-description'>
                                    <p class='product-name'>$product[product_name]</p>
                                    <p class='product-category' style='text-transform: uppercase;'>$product[product_category]</p>
                                    <p class='product-price'>Rp.$product[formatted_prices]</p>
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
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript Link -->
    <script src="js/isLogin.js"></script>
    <script src="js/prices_formatter.js"></script>
    <script src="js/ajax_search.js"></script>

    <script>
        var url = new URL(window.location.href);
        var cat = url.searchParams.get('cat');
        var addsImage = document.getElementById('cat-images');

        if(cat == 'puzzle') {
            var page_puzzle = document.getElementById('puzzle-div');
            page_puzzle.classList.add('active');
            addsImage.src="adds/puzzle.png";
        } else if(cat == 'rubic') {
            var page_puzzle = document.getElementById('rubic-div');
            page_puzzle.classList.add('active');
            addsImage.src="adds/rubic.png";
        } else if(cat == 'board-game') {
            var page_puzzle = document.getElementById('board-div');
            page_puzzle.classList.add('active');
            addsImage.src="adds/board-game.jpg";
        } else if(cat == 'card-game') {
            var page_puzzle = document.getElementById('card-div');
            page_puzzle.classList.add('active');
            addsImage.src="adds/card.jpg";
        } else if(cat == null) {
            window.location.assign('product.php?cat=puzzle');
        } else if(cat == '') {
            window.location.assign('product.php?cat=puzzle');
        }
    </script>

    <script>
        const selectElement = document.getElementById('product-filter');

        selectElement.addEventListener('change', function() {
            const selectedValue = this.value;
            let linkAddress = '';

            console.log(selectedValue);

            switch (selectedValue) {
            case 'clear':
                linkAddress = "product.php?cat=<?= $_GET['cat'];?>";
                break;
            case 'low-to-high-prices':
                linkAddress = "product.php?cat=<?= $_GET['cat'];?>&sort=ASC";
                break;
            case 'high-to-low-prices':
                linkAddress = "product.php?cat=<?= $_GET['cat'];?>&sort=DESC";
                break;
            default:
                linkAddress = '';
                break;
            }

            window.location.href = linkAddress;
        });
    </script>
</body>
</html>