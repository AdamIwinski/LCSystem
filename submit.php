<?php
  session_start();
  include './components/restrict.php';

  include './components/header.php';
  include './components/navbar.php';
  include './components/variables.php';
  include 'file_upload.php';

  $_SESSION['Milage'] = $_POST["Milage"];
  if("" == trim($_POST["Milage"])){
    $_POST["Milage"] = "Unknown";
  }    else{
    $_POST["Milage"] = $_POST["Milage"]." miles";
  }

  $_SESSION['Price'] = $_POST["Price"];
  if("" == trim($_POST["Price"])){
      $_POST["Price"] = $callForPrice;
    }    else{
      $_POST["Price"] = "£".$_POST["Price"];
    }

  //  file

  $_SESSION['Engine_price'] = $_POST["Engine_price"];
  if("" == trim($_POST["Engine_price"])){
      $_POST["Engine_price"] = $callForPrice;
    }    else{
      $_POST["Engine_price"] = "£".$_POST["Engine_price"];
    }

  $_SESSION['Comment'] = $_POST["Comment"];
  if("" == trim($_POST["Comment"])){
      $_POST["Comment"] = "None";
    }

  $_SESSION['Parts_sold'] = $_POST["Parts_sold"];
  if("" == trim($_POST["Parts_sold"])){
      $_POST["Parts_sold"] = "None";
    }
  $_SESSION['Location'] = $_POST["Location"];
  $_SESSION['Engine_Starts'] = $_POST["Engine_Starts"];

  // data for mysqli
  $_SESSION['Vrm'];
  $_SESSION['Milage'];
  $_SESSION['Price'];
  $_SESSION['Engine_price'];
  $_SESSION['Engine_Starts'];
  $_SESSION['Path'];
  $_SESSION['Comment'];
  $_SESSION['Parts_sold'];
  $_SESSION['Location'];
  $_SESSION['data'];

  $data = $_SESSION['data']['Response']['DataItems']['VehicleRegistration'];
  $data2 = $_SESSION['data']['Response']['DataItems']['SmmtDetails'];
  
$data['Colour'];
  if("" == trim($data["Colour"])){
      $data["Colour"] = "Unknown";
    }

$data['VehicleClass'];
  if("" == trim($data["VehicleClass"])){
      $data["VehicleClass"] = "Unknown";
    }

$data['EngineNumber'];
  if("" == trim($data["EngineNumber"])){
      $data["EngineNumber"] = "Unknown";
    }

$data['EngineCapacity'];
  if("" == trim($data["EngineCapacity"])){
      $data["EngineCapacity"] = "Unknown";
    } else{
      $data["EngineCapacity"] = $data["EngineCapacity"]." cc";
    }

$data['TransmissionType'];
  if("" == trim($data["TransmissionType"])){
      $data["TransmissionType"] = "Unknown";
    }

$data['YearOfManufacture'];
  if("" == trim($data["YearOfManufacture"])){
      $data["YearOfManufacture"] = "Unknown";
    }

$data['Model'];
  if("" == trim($data["Model"])){
      $data["Model"] = "Unknown";
    }

$data['GearCount'];
  if("" == trim($data["GearCount"])){
      $data["GearCount"] = "Unknown";
    }

$data['Vin'];
  if("" == trim($data["Vin"])){
      $data["Vin"] = "Unknown";
    }

$data['Make'];
  if("" == trim($data["Make"])){
      $data["Make"] = "Unknown";
    }

$data['TransmissionType'];
  if("" == trim($data["TransmissionType"])){
      $data["TransmissionType"] = "Unknown";
    }

$data['SeatingCapacity'];
  if("" == trim($data["SeatingCapacity"])){
      $data["SeatingCapacity"] = "Unknown";
    }

$data['FuelType'];
  if("" == trim($data["FuelType"])){
      $data["FuelType"] = "Unknown";
    }

$data['Co2Emissions'];
  if("" == trim($data["Co2Emissions"])){
      $data["Co2Emissions"] = "Unknown";
    }

$data['VehicleClass'];
  if("" == trim($data["VehicleClass"])){
      $data["VehicleClass"] = "Unknown";
    }

$data2['BodyStyle'];
  if("" == trim($data2["BodyStyle"])){
      $data2["BodyStyle"] = "Unknown";
    }

$data2['NumberOfDoors'];
  if("" == trim($data2["NumberOfDoors"])){
      $data2["NumberOfDoors"] = "Unknown";
    }

$data2['Transmission'];
  if("" == trim($data["Transmission"])){
      $data["Transmission"] = "Unknown";
    }
?>

<div class="container col col-md-10">
  <div class="row g-0 justify-content-center">
    <div class="col-md-8 card mb-3 <?php echo $_POST["Location"]?>-frame">
      <div class="card-header mb-4 <?php echo $_POST["Location"]?>">
          <div><?php echo $_POST["Location"];?></div>
      </div>
      <div class="container col-10">
        <h2><?php echo $data['Make']." ".$data['Model'];?></h2>
        <div class="row mt-4">
          <div class="col-lg-6"><img src="<?php echo $_SESSION['Path']?>" class="img-fluid" style="object-fit:cover; height:100%;" alt=""></div>
          <div class="col-lg-6">
            <table class="table table-hover">
              <tbody class="table-hover">
                <tr>
                  <td><h3>Price:</h3></td>
                  <td class="text-end"><h3><?php echo $_POST["Price"]?></h3></td>
                </tr>
                <tr>
                  <td><p>Milage:</p></td>
                  <td class="text-end"><p><?php echo $_POST["Milage"]?></p></td>
                </tr>
                <tr>
                  <td><p>Starts:</p></td>
                  <td class="text-end">
                    <p>
                     <a data-bs-target="#engineInfo" data-bs-toggle="modal" href="#engineInfo"><i class="fa fa-info-circle fa-fw"></i><?php echo $_POST["Engine_Starts"]?></a> 
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><p>Engine number:</p></td>
                  <td class="text-end"><p><?php echo $data["EngineNumber"]?></p></td>
                </tr>
                <tr>
                  <td><p>Engine price:</p></td>

                  <td class="text-end"><p><?php echo $_POST["Engine_price"]?></p></td>
                </tr>
              </tbody>
            </table>
          </div>
        <div class="row g-0 justify-content-start">
          <div class="col-lg-6  text-center">
            <h3 class="my-2" id="registration"><?php echo $_SESSION['Vrm']?>
            </h3>
          </div>
          <div class="col-lg-6 text-center">
            <h3 class="my-2" id="registration">VIN: <?php echo $data['Vin']?></h3>
          </div>

        </div>

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
                  <p class="m-1"><?php echo $data['YearOfManufacture'] ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data["EngineCapacity"]?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data2['Transmission'] ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data['FuelType'] ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/car.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data2['BodyStyle'] ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/colour.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data['Colour'];?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/door.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data2['NumberOfDoors'] ?></p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/seat.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1"><?php echo $data['SeatingCapacity'] ?></p>
                </div>
              </div>
              <hr>
              <h2>Comments</h2>
              <div class="container col-10 mt-3 mb-5">
                <p><?php echo $_POST["Comment"]?></p>
              </div>
              <hr>
              <h2>Parts sold</h2>
              <div class="container col-10 mt-3 mb-5">
                <p><?php echo $_POST["Parts_sold"]?></p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
      <div class="div d-flex justify-content-evenly mb-5">
        <a id="back" class="btn btn-secondary w-25" href="delete_Picture.php">Back</a>
        <button type="submit" name="submit" class="btn btn-primary w-25">Submit</button>
      </div>
    </div>

  </div>
</div>
<?php
  include './components/footer.php';
?>