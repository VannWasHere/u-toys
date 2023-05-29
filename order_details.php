<?php
session_start();
require 'php/1_conn.php';
require 'component/not_error.php';
require 'component/set_cookies.php';

    $order_queries = mysqli_query($conn, "SELECT * FROM order_table JOIN user ON order_table.user_id = user.user_id JOIN product ON order_table.product_id = product.product_id WHERE order_id = '$_GET[oid]'");
    $row = mysqli_fetch_assoc($order_queries);

    $user_address = mysqli_query($conn, "SELECT * FROM user_address WHERE user_id = '$_SESSION[user_id]'");
    $address = mysqli_fetch_assoc($user_address);

    echo "<script> var product_total_prices= ". $row['total_prices'] ."; </script>";
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
    <div class="order-details-header">
        <div class="fixed-container">
            <h2 id="ord-details-h2">Order Details</h2>
            <hr>
        </div>
    </div>

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
                      <th scope="col">Prices</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $order_queries2 = mysqli_query($conn, "SELECT * FROM order_table JOIN user ON order_table.user_id = user.user_id JOIN product ON order_table.product_id = product.product_id WHERE order_id = '$_GET[oid]'");
                while ($order_row = mysqli_fetch_array($order_queries2)) {
                    echo "
                    <tr>
                        <td>$order_row[order_id]</td>
                        <td><img src='images/$order_row[product_photos]' alt='$order_row[product_name]' class='checkout-product-images'></td>
                        <td>$order_row[product_name]</td>
                        <td>$order_row[product_quantity]</td>
                        <td>$order_row[product_prices]</td>
                    </tr>
                    ";
                }
                    ?>
                </tbody>
            </table>
            <div class="shipping-expedition">
                <form action="php/addPayment_process.php" method="post">
                    <input type="text" name="province_id" id="province_id" value="<?=$address['province_id'];?>" class="input-hidden">
                    <input type="text" name="city_id" id="city_id" value="<?=$address['city_id'];?>" class="input-hidden">
                    <input type="text" name="product_weight" id="product_weight" value="550" class="input-hidden">


                    <!-- HIDDEN INPUT -->
                    <input type="text" name="order_id" value="<?=$_GET['oid'];?>" class="input-hidden">
                    <input type="text" name="product_id" value="<?=$row['product_id'];?>" class="input-hidden">
                    <input type="text" name="user_id" value="<?=$_SESSION['user_id']?>" class="input-hidden">
                    <input type="text" name="address_id" value="<?=$address['address_id'];?>" class="input-hidden">


                    <div class="row g-3 mt-2">
                        <div class="col">

                            <div class="select-container">
                                <label for="">Choose Your Expedition<i style="color:red">*</i></label> <br>
                                <select class="form-select" name="user_expedition" aria-label="Default select example">

                                </select>
                            </div>

                            <div class="select-container mt-4">
                                <label for="">Choose Your Expidition Type<i style="color:red">*</i></label> <br>
                                <select class="form-select" name="user_package" aria-label="Default select example">

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container">
                                <label for="" class="input-hidden">Expedition Type</label>
                                <input type="text" name="expedition_type" class="form-control visually-hidden" placeholder="Expedition Type" readonly>

                                <input type="text" name="estimated_date" class="form-control visually-hidden" placeholder="Expedition Type" readonly>
                            </div>
                            
                            <div class="input-container">
                                <label for="" class="input-hidden">Your Expedition </label>
                                <input type="text" style="text-transform:uppercase;" class="form-control visually-hidden" name="expedition_name" placeholder="Expedition Name" readonly>
                            </div>

                            <div class="input-container">
                                <label for="">Expedition Prices</label>
                                <input type="text" name="expedition_prices" class="form-control" required placeholder="Expedition Prices" readonly>    
                            </div>

                            <div class="input-container mt-4">
                                <label for="">Total Prices</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" class="form-control" name="total_prices" required placeholder="Subtotal" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="button-addpayment" name="addPayment" disabled>Continue To Payment</button>
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
                $("input[name=expedition_name]").val(choosen_expedition);
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
            $("select[name=user_package]").on("change", function() {
                var package = $("option:selected", this).attr("packages");
                var shipping_fee = $("option:selected", this).attr("courier_fee");
                var estimated_shipping = $("option:selected", this).attr("etd");

                var num_prices = Number(product_total_prices);
                var shipping_num = Number(shipping_fee);

                $("input[name=expedition_type]").val(package);
                $("input[name=expedition_prices]").val(shipping_fee);
                $("input[name=total_prices]").val(shipping_num + num_prices);
                $("input[name=estimated_date]").val(estimated_shipping);

                  // Check if an option is selected
                if (package !== "" && shipping_fee !== "" && estimated_shipping !== "") {
                    // Enable the button
                    $("#button-addpayment").prop("disabled", false);
                } else {
                    // Disable the button
                    $("#button-addpayment").prop("disabled", true);
                }
            });
        });
    </script>
</body>
</html>