<?php
require '1_conn.php';


$q_not_get = mysqli_query($conn, "SELECT * FROM product");

?>
<div class="product-grid-card-container">
    <?php
    if(isset($_GET['cat'])) {
        $q_not_get = mysqli_query($conn, "SELECT *, REPLACE(FORMAT(product_prices, 0), ',', '.') AS formatted_prices FROM product WHERE product_category='$_GET[cat]' AND product_name LIKE '%$_GET[keyword]%' ORDER BY product_prices $_GET[sort]");
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
                            <p class='add-to-cart'>Add to Cart</p>
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
                        <p class='add-to-cart'>Add to Cart</p>
                    </div>
                </div>
            </a>
        </div>
        ";
        }
    }
    ?>
</div>