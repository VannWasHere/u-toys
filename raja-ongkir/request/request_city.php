<?php

$choosen_province = $_POST['user_province'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$choosen_province,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    // Silahkan diisi dengan api_key dari rajaongkir.com
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
  $city_data = $array_response['rajaongkir']['results'];

  echo "<option value=''>--Choose City--</option>";

  foreach($city_data as $key => $each_city){
    echo "<option value='" . $each_city['type'] . ' ' . $each_city['city_name'] . "|" . $each_city['city_id'] . "' city_id='" . $each_city['city_id'] . "'>";
    echo $each_city['type']." ";
    echo $each_city['city_name'];
    echo "</option>";
  }
}