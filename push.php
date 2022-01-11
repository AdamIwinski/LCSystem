<?php
  session_start();
  include './components/restrict.php';
  require_once "connect.php";

if(isset($_POST['Vrm'])){

  mysqli_report(MYSQLI_REPORT_STRICT);
  
    try{
      $connection = new mysqli($host, $db_user, $db_password, $db_name);


      $Vrm = mysqli_real_escape_string($connection, $_POST['Vrm']);
      $Milage = mysqli_real_escape_string($connection, $_POST['Milage']);
      $Price = mysqli_real_escape_string($connection, $_POST['Price']);
      $Engine_price = mysqli_real_escape_string($connection, $_POST['Engine_price']);
      $Engine_Starts = mysqli_real_escape_string($connection, $_POST['Engine_Starts']);
      $Path = mysqli_real_escape_string($connection, $_POST['Path']);
      $Comment = mysqli_real_escape_string($connection, $_POST['Comment']);
      $Parts_sold = mysqli_real_escape_string($connection, $_POST['Parts_sold']);
      $Data = mysqli_real_escape_string($connection, $_POST['Data']);
      $Location = mysqli_real_escape_string($connection, $_POST['Location']);

      if($connection -> connect_errno!=0)
        {
          throw new Exception(mysqli_connect_errno());
        }
        else{

          if($connection->query(sprintf("INSERT INTO `cars` (`id`, `Vrm`,`Milage`,`Price`,`Engine_price`,`Engine_Starts`,`Path`,`Comment`,`Parts_sold`,`Data`,`Location`) VALUES (NULL, '$Vrm','$Milage','$Price','$Engine_price','$Engine_Starts','$Path','$Comment','$Parts_sold','$Data','$Location')")))
          {
            include './components/clear.php';
            $connection->close();
            header('Location: list.php');
            exit();
          }
          else{
            throw new Exception($connection->error);
          }
        
          $connection->close();
        }
    }
    catch(Exception $e)
    {
      // echo '<span style="color:red;">error</span>';
      // echo'<br> informacja dev:'.$e;
    }  

}
if(isset($_SESSION['Vrm'])){

  mysqli_report(MYSQLI_REPORT_STRICT);
  
    try{
      $connection = new mysqli($host, $db_user, $db_password, $db_name);

      $Model = $_SESSION['Model'];
      $Make = $_SESSION['Make'];
      $Id = $_SESSION['Id'];
      $Vrm = $_SESSION['Vrm'];
      $Milage = $_SESSION['Milage'];
      $Price = $_SESSION['Price'];
      // $Engine_price = $_SESSION['Engine_price'];
      // $Engine_Starts = $_SESSION['Engine_Starts'];
      $Path = $_SESSION['Path'];
      $Comment = $_SESSION['Comment'];
      $Parts_sold = $_SESSION['Parts_sold'];
      $Location = $_SESSION['Location'];
      $TimeArrived = $_SESSION['Time'];

      if($connection -> connect_errno!=0)
        {
          throw new Exception(mysqli_connect_errno());
        }
        else
        {
          
          if (($Location === "Sold")||($Location ==="Recycled")){
              if($connection->query(sprintf("INSERT INTO `$Location` (`id`, `Vrm`,`Milage`,`Price`,`Make`,`Model`,`Comment`,`Parts_sold`,`Arrived`) VALUES (NULL, '$Vrm','$Milage','$Price','$Make','$Model','$Comment','$Parts_sold','$TimeArrived')")))
              
              unlink($Path);
              if($connection->query(sprintf("DELETE FROM `cars` WHERE `id` = $Id")))
            {
              include './components/clear.php';
              $connection->close();
              header('Location: list.php');
              exit();
            }
            else{
              throw new Exception($connection->error);
            }

            $connection->close();
          }
          else{

            if($connection->query(sprintf("UPDATE `cars` 
            SET Milage = '$Milage', Price = '$Price', Engine_price = '$Engine_price', Engine_Starts = '$Engine_Starts', Path = '$Path', Comment = '$Comment', Parts_sold = '$Parts_sold', Location = '$Location' WHERE id = '$Id'")))
            {
              include './components/clear.php';
              $connection->close();
              header('Location: list.php');
              exit();
            }
            else{
              throw new Exception($connection->error);
            }

            $connection->close();
          }
      }
    }
    catch(Exception $e)
    {
      echo '<span style="color:red;">error</span>';
      echo'<br> informacja dev:'.$e;
    }  

}
