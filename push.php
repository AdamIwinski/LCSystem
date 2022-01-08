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
        else
        {
          if($connection->query(sprintf("INSERT INTO `cars` (`id`, `Vrm`,`Milage`,`Price`,`Engine_price`,`Engine_Starts`,`Path`,`Comment`,`Parts_sold`,`Data`,`Location`) VALUES (NULL, '$Vrm','$Milage','$Price','$Engine_price','$Engine_Starts','$Path','$Comment','$Parts_sold','$Data','$Location')")))
          {
            include 'clear.php';
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
