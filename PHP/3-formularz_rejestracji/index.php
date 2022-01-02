<?php
  session_start();
  if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] ==true)){
    header('Location: project.php');
    exit();
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
  message <br><br>
  <a href="rejestracja.php">Rejestracja - zaloz darmowe konto!</a> <br> <br>

  <form action="login.php" method="POST">
    Login: <br> <input type="text" name="login"><br>
    Password: <br> <input type="password" name="password"><br>
    <input type="submit" value="Login">
  </form>
  <?php

    if(isset($_SESSION['blad'])) 
    echo $_SESSION['blad'];
    unset($_SESSION['blad']);

  ?>
</body>
</html>