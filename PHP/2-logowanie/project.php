<?php
  session_start();

  if(!isset($_SESSION['zalogowany'])){
    header('Location: index.php');
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
  <?php

  echo "<p>Witaj ".$_SESSION['user'].'![<a href="logout.php">Wyloguj sie</a>]</p>';
  echo "<p>drewno ".$_SESSION['drewno']."</p>";
  echo "<p>kamien ".$_SESSION['kamien']."</p>";
  echo "<p>zboze ".$_SESSION['zboze']."</p>";

  echo "<p>e-mail ".$_SESSION['email']."</p>";
  echo "<p>Dni premiium ".$_SESSION['dnipremium']."</p>";
  ?>

</body>
</html>