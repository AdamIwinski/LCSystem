<?php
  session_start();
  if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] ==true) && (isset($_SESSION['user'])) && ($_SESSION['user'] =="adam"))
  {
  
  }else if($_SESSION['zalogowany'] ==false)
  {
    header("Location: ../index.php");
    exit();
  }else{
    $address =  $_SESSION['user'];
    header("Location: ../$address/$address.php");
    exit();
  }
  
  echo "<p>Witaj ".$_SESSION['user'].'![<a href="../logout.php">Wyloguj sie</a>]</p>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>adam</title>
</head>
<body>
<h1 style="color:red; text-align:center">strona adama</h1>  

</body>
</html>