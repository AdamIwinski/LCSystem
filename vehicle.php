<?php
  session_start();
  include './components/header.php';
  include './components/navbar.php';
?>
<div class="container col col-md-10">
  <div class="row g-0 justify-content-center">
    <div class="col-md-8 card mb-3 sale-frame">
      <div class="card-header mb-4 sale">
          <div>For Sale</div>
      </div>
      <div class="container col-10">
        <h2>AUDI A4 SPORT ULTRA TDI</h2>
        <div class="row mt-4">
          <div class="col-lg-6"><img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt=""></div>
          <div class="col-lg-6">
            <table class="table table-hover">
              <tbody class="table-hover">
                <tr>
                  <td><h3>Price:</h3></td>
                  <td class="text-end"><h3>£2000</h3></td>
                </tr>
                <tr>
                  <td><p>Milage:</p></td>
                  <td class="text-end"><p>130.000 miles</p></td>
                </tr>
                <tr>
                  <td><p>Starts:</p></td>
                  <td class="text-end">
                    <p>
                     <a data-bs-target="#engineInfo" data-bs-toggle="modal" href="#engineInfo"><i class="fa fa-info-circle fa-fw"></i>Yes</a> 
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><p>Engine number:</p></td>
                  <td class="text-end"><p>DEUA047393</p></td>
                </tr>
                <tr>
                  <td><p>Engine price:</p></td>
                  <td class="text-end"><p><?php echo $callForPrice ?></p></td>
                </tr>
              </tbody>
            </table>
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
                  <p class="m-1">2000</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/car.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Sedan</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/colour.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Blue</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/door.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">5</p>
                </div>
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center my-2">
                  <p class="m-1"><img src="./assets/icons/seat.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">5</p>
                </div>
              </div>
              <hr>
              <h2>Comments</h2>
              <div class="container col-10 mt-3 mb-5">
                <p>None</p>
              </div>
              <hr>
              <h2>Parts sold</h2>
              <div class="container col-10 mt-3 mb-5">
                <p>None</p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
      <div class="div d-flex justify-content-evenly mb-5">
        <a type="button" href="list.php" class="btn btn-secondary w-25">Close</a>
      </div>

      <div class="card-footer text-muted d-flex justify-content-between">
        <small>Ref: 10</small>
        <small>Arrived 3 mins ago</small>
      </div>
    </div>

  </div>
</div>
<?php
  include './components/footer.php';
?>