<?php
  session_start();
  include './components/restrict.php';
  $title = "LC Hughes Vehicle Stock List";
  include './components/header.php';
  include './components/navbar.php';
  include './components/variables.php';
?>
<?php
if(isset($_SESSION['username'])){
  echo
  '<div class="row g-0 justify-content-center mt-4">
      <div class="col-md-8 text-center mb-5">
          <a href="list.php" class="btn btn-primary">Pretty</a>
      </div>
    </div>';
}
// -----------------------------------------------------

  require_once "connect.php";
  mysqli_report(MYSQLI_REPORT_STRICT);

    try{
      $connection = new mysqli($host, $db_user, $db_password, $db_name);
      if($connection -> connect_errno!=0)
        {
          throw new Exception(mysqli_connect_errno());
        }
        else{
          if(isset($_SESSION['username'])){
            $response = $connection->query("SELECT * FROM cars ORDER BY id DESC");
            $cars = $response-> fetch_all();
          }else {
            $response = $connection->query("SELECT * FROM cars WHERE Location = 'For Sale' OR Location = 'Yard'  ORDER BY id DESC");
            $cars = $response-> fetch_all();
          }     

          $connection->close();
        }
    }
    catch(Exception $e)
    {
      echo '<span style="color:red;">error</span>';;
    } 
    include './components/clear.php';
?>
<div class="container bg-white table-responsive mt-4">

<table class="table table-striped table-hover ">
  <thead class="table-dark">
    <tr>
      <th scope="col">NR</th>
      <th scope="col">ID</th>
      <th scope="col">REG</th>
      <th scope="col">Make</th>
      <th scope="col">Model</th>
      <th scope="col">Year</th>
      <th scope="col">Engine Code</th>
      <th scope="col">Engine size</th>
      <th scope="col">Fuel Type</th>
      <th scope="col">Transmission</th>
      <th scope="col">Milage</th>
      <th scope="col">Location</th>
      <th scope="col">Arrived</th>
      <th scope="col">Days in</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
  <?php   
    
   $nr = 0;
  foreach ($cars as $car){
    $nr = $nr+1;
    
    $date1 = date("Y-m-d")." ".date("H:i:s");
    $date2 = new DateTime($date1);
    $date3 = new DateTime($car[11]);
    $days  = $date3->diff($date2)->format('%a');
    $date3 = date("Y-m-d");


    $data = json_decode($car[9], true);
    // define variables
    $engineCapacity = $data['Response']['DataItems']['VehicleRegistration']['EngineCapacity'];
    $yearOfManufacture = $data['Response']['DataItems']['VehicleRegistration']['YearOfManufacture'];
    $model = $data['Response']['DataItems']['VehicleRegistration']['Model'];
    $make = $data['Response']['DataItems']['VehicleRegistration']['Make'];
    $fuelType = $data['Response']['DataItems']['VehicleRegistration']['FuelType'];
    $Transmission = $data['Response']['DataItems']['SmmtDetails']['Transmission'];
    $engineCode = $data['Response']['DataItems']['TechnicalDetails']['General']['Engine']['Code']['CodeList'][0]['EngineCode'];
    $location = $car[10];
    $price = $car[3];
    $path = $car[6];
    $id = $car[0];
    $vrm= $car[1];
    $milage = $car[2];
    $dateAdded = $car[11];

    if($price === "Unknown"){
      $price = "Call for price";
    } else {
      $price = "£".$price;
    }
    echo'
    <tr class="border-bottom">
      <td>'.$nr.'</td>
      <td>'.$id.'</td>
      <td>'.$car[1].'</td>
      <td>'.$make.'</td>
      <td>'.$model.'</td>
      <td>'.$yearOfManufacture.'</td>
      <td>'.$engineCode.'</td>
      <td>'.$engineCapacity.'cc</td>
      <td>'.$fuelType.'</td>
      <td>'.$Transmission.'</td>
      <td>'.$milage.'</td>
      <td>'.$car[10].'</td>
      <td>'.$date3.'</td>
      <td>'.$days.'</td>
      <td><a href="vehicle.php?id='.$id.'" class="btn btn-primary">View</a></td>
    </tr>
    ';
  }
?>
<!-- end card -->
</div>

<?php
  include './components/footer.php';
?>