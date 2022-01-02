<?php
session_start();
include './components/restrict.php';

  if((isset($_POST['submit'])) && (isset($_POST['registration']))){

    $registration = $_POST['registration'];
    $registration = htmlentities($registration, ENT_QUOTES, "UTF-8");

  // API call

  //   $_SESSION['registration'] = $registration;

  //   header('Location: check_in_vehicle_data.php');
  //   exit();}

  // else{
  //   header('Location: check_in.php');
  //   exit();
  // }


// Init cURL session
$curl = curl_init();

// Set API Key
$ApiKey = "04b698ce-b079-477f-90d5-f8e3b3c2471f";

// Construct URL String
$url = "https://uk1.ukvehicledata.co.uk/api/datapackage/%s?v=2&api_nullitems=1&key_vrm=%s&auth_apikey=%s";
$url = sprintf($url, "VehicleData", "$registration", $ApiKey); // Syntax: sprintf($url, "PackageName", "VRM", ApiKey);
// Note your package name here. There are 5 standard packagenames. Please see your control panel > weblookup or contact your account manager

// Create array of options for the cURL session
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

// Execute cURL session and store the response in $response
$response = curl_exec($curl);

// If the operation failed, store the error message in $error
$error = curl_error($curl);

// Close cURL session
curl_close($curl);

// If there was an error, print it to screen. Otherwise, unserialize response and print to screen.
if ($error) {
  echo "cURL Error: " . $error;
  exit();
} else {
  
  $data = json_decode($response, true);
  $status = $data['Response']['StatusCode'];
  if($status==="Success"){

    $_SESSION['data'] = $data;
    $_SESSION['Vrm'] = $data['Response']['DataItems']['VehicleRegistration']['Vrm'];

    header('Location: check_in_vehicle_data.php');
    exit();

  } else{
    $_SESSION['error'] = '<span class="text-center mb-4" style="color:red; font-weight: 800;">Invalid Registration</span>';
    
    header('Location: check_in.php');
  }

}


// echo $data;
// $json_string = json_encode($data, JSON_PRETTY_PRINT);
// echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// $json_pretty = json_encode($data, JSON_PRETTY_PRINT);
// echo "<pre>".$json_pretty."<pre/>";


  }
