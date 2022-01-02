<?php
session_start();
session_unset();
header('Location: list.php');
?>