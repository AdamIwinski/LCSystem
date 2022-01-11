<?php
  session_start();
  include './components/restrict.php';

  include './components/header.php';
  include './components/navbar.php';

  require_once "connect.php";
  mysqli_report(MYSQLI_REPORT_STRICT);

    try{
      $connection = new mysqli($host, $db_user, $db_password, $db_name);
      if($connection -> connect_errno!=0)
        {
          throw new Exception(mysqli_connect_errno());
        }
        else{
            $response = $connection->query("SELECT * FROM sold ORDER BY id ASC");
            $cars = $response-> fetch_all();
            // print_r($car);   
          }     
          $connection->close();
    }
    catch(Exception $e)
    {
      echo '<span style="color:red;">error</span>';;
    } 
?>
<div class="container bg-white table-responsive mt-4">

<table class="table table-striped table-hover ">
  <thead class="table-dark">
    <tr>
      <th scope="col">NR</th>
      <th scope="col">REG</th>
      <th scope="col">Make</th>
      <th scope="col">Model</th>
      <th scope="col">Price</th>
      <th scope="col">Arrived</th>
      <th scope="col">Sold</th>
      <th scope="col">No Days</th>
    </tr>
  </thead>
  <tbody>

<?php
    $nr = 0;  
    foreach ($cars as $car){
    $nr = $nr+1; 

    $date1 = new DateTime($car[8]);
    $date2 = new DateTime($car[9]);
    $days  = $date2->diff($date1)->format('%a');

echo 
    '<tr class="border-bottom">
      <td>'.$nr.'</td>
      <td>'.$car[1].'</td>
      <td>'.$car[4].'</td>
      <td>'.$car[5].'</td>
      <td>'.$car[3].'</td>
      <td>'.$car[8].'</td>
      <td>'.$car[9].'</td>
      <td>'.$days.'</td>
    </tr>';
    }
?>

  </tbody>
</table>
</div>

<?php
  include './components/footer.php';
?>