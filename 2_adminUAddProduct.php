<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Product</title>
    <link rel="stylesheet" href="css/2_admin_home.css">
</head>
<body>
    <div class="admin-container">

    <?php
        include 'component/admin_sidebar.php';
    ?>

        <!-- Admin Action -->
        <div class="admin-content">
            <h2 style="text-transform: uppercase; text-align: center; letter-spacing: 1px;">Add Item Form</h2>
            <div class="add-item-container">
                <!-- Form -->
                <form action="php/2_adminAddProduct_process.php" method="post" enctype="multipart/form-data">
                    <div class="input-container">
                        <label for="product_name" class="item-form">Product Name</label> <br>
                        <input type="text" name="product_name" placeholder="Product Name" class="item-input" autocomplete="off" required>
                    </div>
                    <div class="input-container">
                        <label for="product_price" class="item-form">Product Price</label> <br>
                        <input type="number" name="product_price" placeholder="Product Price" class="item-input" autocomplete="off" required>
                    </div>
                    <div class="input-container">
                        <label for="product_category" class="item-form">Product Category</label> <br>
                        <select name="product_category" class="item-input">
                            <option value="" selected>Select One</option>
                            <option value="rubic">Rubic</option>
                            <option value="puzzle">Puzzle</option>
                            <option value="board-game">Board Game</option>
                            <option value="card-game">Card Game</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="product_subcategory" class="item-form">Product SubCategory</label> <br>
                        <select name="product_subcategory" class="item-input">
                            <option value="" selected>Select One</option>
                            <option value="1 Player">1 Player</option>
                            <option value="2 - 4 Player">2 - 4 Player</option>
                            <option value="4 - 8 Player">4 - 8 Player</option>
                            <option value="8+ Player">8+ Player</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="product_photos" class="item-form">Product Photos</label> <br>
                        <input type="file" name="product_photos" placeholder="Product Price" class="item-input" autocomplete="off" required>
                    </div>
                    <div class="input-container">
                        <label for="product_details" class="item-form">Product Details</label> <br>
                        <textarea name="product_details" class="item-input" cols="30" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="submit" id="add-item-button">Add New Item</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>