<?php
  session_start();
  if(!isset($_SESSION['udana_rejestracja']))
  {
    header('Location: index.php');
    exit();
  }
  else{
    unset($_SESSION['udana_rejestracja']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>dzieki</h1>
  <a href="index.php">zaloguj</a>
</body>
</html>