<?php
session_start();

require_once "connect.php";

  $connect = @new mysqli($host, $db_user, $db_password, $db_name);

  if($connect -> connect_errno!=0)
  {
    echo "Error: ".$connect->connect_errno;
  }
  else
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = htmlentities($username, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    if($response = $connect->query(
    
    sprintf("SELECT*FROM users WHERE BINARY user='%s' AND BINARY pwd='%s'",
    mysqli_real_escape_string($connect,$username),
    mysqli_real_escape_string($connect,$password),
    )))
    {
      $noUsers = $response->num_rows;

      if($noUsers>0)
      {
        // $_SESSION['logged_in'] = true;

        $row = $response->fetch_assoc();
        $_SESSION['username'] = $row['user'];
        $_SESSION['access'] = $row['access'];

        unset($_SESSION['error']);
        $response->free_result();
        header('Location: list.php');
      } else {
        echo "Error: ";
        $_SESSION['error'] = '<span class="text-center" style="color:red;">Wrong Username or Password</span>';
        header('Location: login.php');
      }
    }

    $connect->close();
  }
