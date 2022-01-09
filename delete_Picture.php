<?php
session_start(); 
include './components/restrict.php';
// using unlike() function 
$file_pointer = $_SESSION['Path']; 
// echo $file_pointer;
if ($file_pointer !== "pictures/Default.png"){
  unlink($file_pointer);
  unset($_SESSION['Path']);
  unset($_SESSION['Message']);

} else {
  unset($_SESSION['Path']);
  unset($_SESSION['Message']);
}
header('Location: check_in_vehicle_data.php');
?> 