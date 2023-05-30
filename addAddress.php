<?php
session_start();
require 'php/1_conn.php';
include 'component/not_error.php';
include 'component/set_cookies.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Address</title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/addAddress.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

</head>
<body> 

<?php

include 'component/navigation_bar.php';

?>

    <div class="account-page-container">

        <h2 style="margin-top: 3%; margin-bottom: 2%;">Add Address</h2>
        <div class="grid-container">

            <!-- First Flex -->
            <div class="account-page-sidebar">
                <ul id="account-sidebar">
                    <li><a href="">Profile</a></li>
                    <li><a href="">Purchase History</a></li>
                    <li><a href="addAddress.html" class="active">Add Address</a></li>
                <hr style="margin-top: 3%;">
                <button type="button" id="signout-sidebar" onclick="location.href = 'php/1_signout_process.php'">Sign Out</button>
                </ul>
            </div>

            <div class="add-address-form">
                <form action="php/addAddress_process.php" method="post">
                    <div class="input-container">
                        <h4 class="h4-title">Contact</h4>
                        <label for="receiver_contact" class="form-label">Receiver Name and Phone Number</label> <br>
                        <input type="text" class="address-input" name="receiver_name" placeholder="Ex: Daffa Kaisha" required> <br>
                        <input type="number" class="address-input" name="receiver_number" placeholder="Ex: 0812345678" required> <br>
                    </div>

                    <div class="location-form-container">
                        <h4 class="h4-title">Location</h4>
                        <div class="location-form-grid">
                            <!-- Left Grid -->
                            <div class="left-location-form">
                                <div class="input-container">
                                    <label for="" class="form-label">Province</label> <br>
                                    <select name="province_name" class="select_input">

                                    </select>
                                </div>
                            </div>

                            <!-- Right Grid -->
                            <div class="input-container">
                                <label for="" class="form-label">City</label> <br>
                                <select name="city_name" class="select_input">

                                </select>
                            </div>
                        </div>
                        <div class="input-container">
                            <label for="" class="form-label">Address</label>
                            <textarea name="receiver_address" id="receiver-address" placeholder="Ex: Perumahan Citra Raya Bunderan 1, Jalan Selo 5 No 10"></textarea>
                            <input style="display: none;" type="text" name="user_id" value="<?php echo $_SESSION['user_id'];?>" hidden>
                        </div>
                    </div>
                    <button type="submit" id="submit-add-address">Submit New Address</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Auto Fill JS -->
    <script>
    $(document).ready(function(){
        $.ajax({
          type: 'post',
          url: 'raja-ongkir/request/request_province.php',
          success: function(hasil_provinsi){
            $("select[name=province_name]").html(hasil_provinsi);
          }
        });

        $("select[name=province_name]").on("change", function(){
          // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
          var choosen_province = $("option:selected", this).attr("province_id");
          $.ajax({
            type: 'post',
            url: 'raja-ongkir/request/request_city.php',
            data: 'user_province='+choosen_province,
            success:function(hasil_distrik){
              $("select[name=city_name]").html(hasil_distrik);
            }
          })
        });
    });
  </script>
</body>
</html>