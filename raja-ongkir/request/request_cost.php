<?php

$city_id = $_POST['city_id'];
$expedition = $_POST['expedition'];
$weight = $_POST['weight'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=455&destination=$city_id&weight=$weight&courier=$expedition",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 44bfe94e73b3c639e3d49a99c3b81ab5"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response, TRUE);

  $packages = $array_response['rajaongkir']['results']['0']['costs'];
  echo "<option value=''>--Choose Your Packages--</option>";

  foreach($packages as $key => $each_packages){
    echo "<option packages='".$each_packages['service']."' courier_fee='".$each_packages['cost']['0']['value']."' etd='".$each_packages['cost']['0']['etd']."'>";
    echo $each_packages['service']." ";
    echo "Rp.".number_format($each_packages['cost']['0']['value']).",- ";
    echo $each_packages['cost']['0']['etd'];
    echo "</option>";
  }
}