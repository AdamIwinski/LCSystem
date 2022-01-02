<?php
if(!isset($_SESSION['username'])){
  header('Location: list.php');
  exit();
}