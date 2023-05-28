<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
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
  $province_data = $array_response['rajaongkir']['results'];
  
  echo "<option value=''>--Choose Province--</option>";

  foreach($province_data as $key => $each_province){
    echo "<option value='" . $each_province['province'] . "|" . $each_province['province_id'] . "' province_id='" . $each_province['province_id'] . "'>";
    echo $each_province['province'];
    echo "</option>";
  }
}