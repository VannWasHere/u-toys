<?php
session_start();
require 'php/1_conn.php';
require 'component/not_error.php';
require 'component/set_cookies.php';

    $order_queries = mysqli_query($conn, "SELECT * FROM order_table JOIN user ON order_table.user_id = user.user_id JOIN product ON order_table.product_id = product.product_id WHERE order_id = '$_GET[oid]'");
    $row = mysqli_fetch_assoc($order_queries);

    $user_address = mysqli_query($conn, "SELECT * FROM user_address WHERE user_id = '$_SESSION[user_id]'");
    $address = mysqli_fetch_assoc($user_address);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="css/order_details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2 id="ord-details-h2">Order Details</h2>
    <hr>

    <div class="checkout-container">
        <p id="checkout-username">Username</p>

        <h3 id="checkout-h3">Product Summary</h3>

        <div class="product-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Product</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total Prices</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $row['order_id'];?></td>
                        <td><img src="images/<?=$row['product_photos'];?>" alt="" class="checkout-product-images"></td>
                        <td><?=$row['product_name'];?></td>
                        <td><?=$row['product_quantity'];?></td>
                        <td><?=$row['total_prices'];?></td>
                    </tr>
                </tbody>
            </table>
            <div class="shipping-expedition">
                <form action="" method="post">
                    <input type="text" name="province_id" id="province_id" value="<?=$address['province_id'];?>" class="input-hidden">
                    <input type="text" name="city_id" id="city_id" value="<?=$address['city_id'];?>" class="input-hidden">
                    <input type="text" name="product_weight" id="product_weight" value="550" class="input-hidden">

                    <div class="select-container">
                        <label for="">Choose Your Expedition</label> <br>
                        <select class="form-select" name="user_expedition" aria-label="Default select example">

                        </select>
                    </div>

                    <div class="select-container mt-4">
                        <label for="">Choose Your Package</label> <br>
                        <select class="form-select" name="user_package" aria-label="Default select example">

                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'post',
                url: 'raja-ongkir/includes/expedition.php',
                success: function(local_expedition){
                    $("select[name=user_expedition]").html(local_expedition);
                }
            });
            $("select[name=user_expedition]").on("change", function() {
                var choosen_expedition = $("select[name=user_expedition]").val();
                var choosen_district = $('#city_id').val();
                $total_weight = $("input[name=product_weight]").val();
                $.ajax({
                    type: 'post',
                    url: 'raja-ongkir/request/request_cost.php',
                    data: 'expedition='+choosen_expedition+'&city_id='+choosen_district+'&weight='+$total_weight,
                    success: function(my_package) {
                        $("select[name=user_package]").html(my_package);
                        $("input[name=user_expedition]").val(choosen_expedition);
                    }
                });
            });
        });
    </script>
</body>
</html>