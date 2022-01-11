<?php
  session_start();
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
          <button class="btn btn-primary filter-button" data-filter="All">All</button>
          <button class="btn btn-primary filter-button" data-filter="sale-frame">For sale</button>
          <button class="btn btn-primary filter-button" data-filter="Compound-frame">Compound</button>
          <button class="btn btn-primary filter-button" data-filter="Depolution-frame">Depolution</button>
          <button class="btn btn-primary filter-button" data-filter="Yard-frame">Yard</button>
          <a href="list-simple.php"  class="btn btn-secondary">Simple</a>
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
<div class="container">
  <?php   foreach ($cars as $car){
    $data = json_decode($car[9], true);
    // define variables
    $engineCapacity = $data['Response']['DataItems']['VehicleRegistration']['EngineCapacity'];
    $yearOfManufacture = $data['Response']['DataItems']['VehicleRegistration']['YearOfManufacture'];
    $model = $data['Response']['DataItems']['VehicleRegistration']['Model'];
    $make = $data['Response']['DataItems']['VehicleRegistration']['Make'];
    $fuelType = $data['Response']['DataItems']['VehicleRegistration']['FuelType'];
    $Transmission = $data['Response']['DataItems']['SmmtDetails']['Transmission'];
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

    echo '
    <div class="row g-0 justify-content-center">
      <div class="col-10 col-md-8 card mb-3 '.$location.'-frame filter">
        <a href="vehicle.php?id='.$id.'">
        <div class="card-header d-flex justify-content-between '.$location.'">
          <div>'.$location.'</div>
          <div class="price">'.$price.'</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-5 col-xl-4">
            <img src="'.$path.'" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-7 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">'.$make." ".$model.'</h5>
              <div class="row g-0 justify-content-around mt-5">
                <div class="col-5 offset-1 offset-md-0 d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">'.$yearOfManufacture.'</p>
                </div>
                <div class="col-5 offset-1 offset-md-0 d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">'.$engineCapacity.'</p>
                </div>
                <div class="col-5 offset-1 offset-md-0 d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">'.$Transmission.'</p>
                </div>
                <div class="col-5 offset-1 offset-md-0 d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">'.$fuelType.'</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>'."Ref: ".$id.'</small>
            <small><time class="text-muted timeago" datetime="'.$dateAdded.'"></time></small>
        </div>
        </a>
      </div>
    </div>
    ';
  }
?>
<!-- end card -->
</div>

<?php
  include './components/footer.php';
?>