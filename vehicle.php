<?php
  session_start();
  include './components/header.php';
  include './components/navbar.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];

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
            $sql = $connection->query("SELECT * FROM cars WHERE id = $id");
            $car = $sql-> fetch_assoc();
          }else {
            $sql = $connection->query("SELECT * FROM cars WHERE id = $id AND (Location = 'For Sale' OR Location = 'Yard')");
            $car = $sql-> fetch_assoc();
          } 
            // print_r($car);
            $connection->close();
          }
      }
      catch(Exception $e)
      {
        echo '<span style="color:red;">error</span>';
        // echo'<br> informacja dev:'.$e;
      }  
} 
if(!isset($car['Vrm'])){
  include 'echo.php';
  exit();
}
$data = json_decode($car['Data'], true);
$vrm = $data['Response']['DataItems']['VehicleRegistration']['Vrm'];
$colour = $data['Response']['DataItems']['VehicleRegistration']['Colour'];
$vehicleClass = $data['Response']['DataItems']['VehicleRegistration']['VehicleClass'];
$engineNumber = $data['Response']['DataItems']['VehicleRegistration']['EngineNumber'];
$engineCapacity = $data['Response']['DataItems']['VehicleRegistration']['EngineCapacity'];
$yearOfManufacture = $data['Response']['DataItems']['VehicleRegistration']['YearOfManufacture'];
$model = $data['Response']['DataItems']['VehicleRegistration']['Model'];
$gearCount = $data['Response']['DataItems']['VehicleRegistration']['GearCount'];
$vin = $data['Response']['DataItems']['VehicleRegistration']['Vin'];
$make = $data['Response']['DataItems']['VehicleRegistration']['Make'];
$seatingCapacity = $data['Response']['DataItems']['VehicleRegistration']['SeatingCapacity'];
$fuelType = $data['Response']['DataItems']['VehicleRegistration']['FuelType'];
$Co2Emissions = $data['Response']['DataItems']['VehicleRegistration']['Co2Emissions'];
$VehicleClass = $data['Response']['DataItems']['VehicleRegistration']['VehicleClass'];
$BodyStyle = $data['Response']['DataItems']['SmmtDetails']['BodyStyle'];
$NumberOfDoors = $data['Response']['DataItems']['SmmtDetails']['NumberOfDoors'];
$Transmission = $data['Response']['DataItems']['SmmtDetails']['Transmission'];
$location = $car['Location'];
$price = $car['Price'];
$path = $car['Path'];
$id = $car['id'];
$vrm= $car['Vrm'];
$milage = $car['Milage'];
$enginePrice = $car['Engine_price'];
$engineCondition = $car['Engine_Starts'];
$comment = $car['Comment'];
$partsSold = $car['Parts_sold'];
$dateAdded = $car['time'];

    if($price === "Unknown"){
      $price = $callForPrice;
    } else {
      $price = "£".$price;
    }

    if($enginePrice === "Unknown"){
      $enginePrice = $callForPrice;
    } else {
      $enginePrice = "£".$enginePrice;
    }
    
    if($milage !== "Unknown"){
          $milage = $milage." miles";
    }
    
?>

<div class="container col-10">
  <div class="row g-0 justify-content-center">
    <div class="col-md-10 card mb-5 mt-2 <?php echo $location?>-frame">
      <div class="card-header mb-4 <?php echo  $location?>">
          <div><?php echo  $location?></div>
      </div>
      <div class="container col-10">
        <h2><?php echo $make." ".$model ?></h2>
        <div class="row mt-4">
          <div class="col-lg-6"><img src="<?php echo  $path?>" class="img-fluid" style="object-fit:cover; height:100%;" alt=""></div>
          <div class="col-lg-6">
            <table class="table table-hover">
              <tbody class="table-hover">
                <tr>
                  <td><h3>Price:</h3></td>
                  <td class="text-end"><h3><?php echo  $price?></h3></td>
                </tr>
                <tr>
                  <td><p>Milage:</p></td>
                  <td class="text-end"><p><?php echo  $milage  ?></p></td>
                </tr>
                <tr>
                  <td><p>Starts:</p></td>
                  <td class="text-end">
                    <p>
                     <a data-bs-target="#engineInfo" data-bs-toggle="modal" href="#engineInfo"><i class="fa fa-info-circle fa-fw"></i><?php echo  $engineCondition ?></a> 
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><p>Engine number:</p></td>
                  <td class="text-end"><p><?php echo $engineNumber?></p></td>
                </tr>
                <tr>
                  <td><p>Engine price:</p></td>
                  <td class="text-end"><p><?php echo $enginePrice?></p></td>
                </tr>
              </tbody>
            </table>
          </div>

<?php
if(isset($_SESSION['username'])){ 
  echo '<div class="row g-0 justify-content-start">
          <div class="col-lg-6  text-center">
            <h3 class="my-2" id="registration">'.$vrm.'</h3>
          </div>
          <div class="col-lg-6 text-center">
            <h3 class="my-2" id="vin">'.$vin.'</h3>
          </div>
        </div>';
}?>

<!-- modal -->
<div class="modal fade" id="engineInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Engine Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          At the time the vehicle arrived at ours premises it was tested to verify whether the engine could be started. Starts is defined as:
        </p>
        <br>
        <p>
          <b>Yes</b> - We were able to start the engine. We do not guarantee the condition of the engine or that it will start again when collected from our premises.
        </p>
        <br>
        <p>
          <b>No</b> - We were unable to start the engine.
        </p>
        <br>
        <p>
          <b>Unknown</b> - We ware unable to try and start the engine. This may be for a number of reasons such as: There is no key with the vehicle; It may cause further damage to the vehicle if we attempt to start the engine; The engine / battery are damaged etc.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
<!-- modal end -->

          <div class="row g-0 justify-content-center">
            <div class="card-body mt-3">
              <hr>
              <h2>Overview</h2>
              <div class="row mt-3 mb-5">
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $yearOfManufacture ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $engineCapacity ?> cc</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $Transmission ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $fuelType ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/car.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $BodyStyle ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/colour.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $colour ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/door.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $NumberOfDoors ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/seat.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $seatingCapacity ?></p>
                </div>
              </div>
              <hr>
              <h2>Comments</h2>
              <div class="container col-10 mt-3 mb-5">
                <p><?php echo  $comment ?></p>
              </div>
              <hr>
              <h2>Parts sold</h2>
              <div class="container col-10 mt-3 mb-5">
                <p><?php echo  $partsSold ?></p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
      <div class="div d-flex justify-content-evenly mb-5">
        <a class="btn btn-secondary w-25" href="list.php">Close</a>

<?php
if(isset($_SESSION['username'])){
  $_SESSION['Id'] = $car['id'];
  echo '<a href="edit.php" class="btn btn-primary w-25">Edit</a>';
}
?>

      </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small><?php echo "Ref: ".$id ?></small>
            <small><time class="text-muted timeago" datetime="<?php echo $dateAdded ?>"></time></small>
        </div>
    </div>

  </div>
</div>
<?php
  include './components/footer.php';
?>