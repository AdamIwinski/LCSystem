<?php
  session_start();
  $title = "LC Hughes Vehicle Stock List";
  include './components/header.php';
  include './components/navbar.php';
?>
<?php
if(isset($_SESSION['username'])){
  echo
  '
  <div class="row g-0 justify-content-center mt-4">
    <div class="col-md-8 text-center mb-5">
        <button class="btn btn-primary filter-button" data-filter="All">All</button>
        <button class="btn btn-primary filter-button" data-filter="sale-frame">For sale</button>
        <button class="btn btn-primary filter-button" data-filter="Compound-frame">Compound</button>
        <button class="btn btn-primary filter-button" data-filter="Depolution-frame">Depolution</button>
        <button class="btn btn-primary filter-button" data-filter="Yard-frame">Yard</button>
    </div>
  </div>

    <div class="row g-0 justify-content-center">
      <div class="col-md-8 card mb-3 Depolution-frame filter">
        <a href="">
        <div class="card-header d-flex justify-content-between Depolution">
          <div>Depolution</div>
          <div class="price">£2000</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-3 col-xl-4">
            <img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-9 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">opel</h5>
              <div class="d-flex justify-content-around mt-5">
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">2000</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>Ref: 10</small>
            <small>Arrived 3 mins ago</small>
        </div>
        </a>
      </div>
    </div>
        
        <div class="row g-0 justify-content-center">
      <div class="col-md-8 card mb-3 Compound-frame filter">
        <a href="">
        <div class="card-header d-flex justify-content-between Compound">
          <div>Compound</div>
          <div class="price">£2000</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-3 col-xl-4">
            <img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-9 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">AUDI A4 SPORT ULTRA TDI</h5>
              <div class="d-flex justify-content-around mt-5">
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">2000</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>Ref: 10</small>
            <small>Arrived 3 mins ago</small>
        </div>
        </a>
      </div>';


}
?>
  <!-- Vehicle card -->
    <div class="row g-0 justify-content-center">
      <div class="col-md-8 card mb-3 sale-frame filter">
        <a href="vehicle.php">
        <div class="card-header d-flex justify-content-between sale">
          <div>For sale</div>
          <div class="price">£2000</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-3 col-xl-4">
            <img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-9 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">AUDI A4 SPORT ULTRA TDI</h5>
              <div class="d-flex justify-content-around mt-5">
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">2000</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>Ref: 10</small>
            <small>Arrived 3 mins ago</small>
        </div>
        </a>
      </div>
    </div>
  <!-- end card -->
<!-- usun -->
    <div class="row g-0 justify-content-center">
      <div class="col-md-8 card mb-3 Yard-frame filter">
        <a href="">
        <div class="card-header d-flex justify-content-between Yard">
          <div>Yard</div>
          <div class="price">£2000</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-3 col-xl-4">
            <img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-9 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">AUDI A4 SPORT ULTRA TDI</h5>
              <div class="d-flex justify-content-around mt-5">
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">2000</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>Ref: 10</small>
            <small>Arrived 3 mins ago</small>
        </div>
        </a>
      </div>
    </div>

    </div>
        <div class="row g-0 justify-content-center">
      <div class="col-md-8 card mb-3 sale-frame filter">
        <a href="">
        <div class="card-header d-flex justify-content-between sale">
          <div>For sale</div>
          <div class="price">£2000</div>
        </div>
        <div class="row g-0">
          <div class="col-12 col-lg-3 col-xl-4">
            <img src="uploaded_files/car1.jpg" class="img-fluid" style="object-fit:cover; height:100%;" alt="">
          </div>
          <div class="col-12 col-lg-9 col-xl-8">
            <div class="card-body">
              <h5 class="card-title">AUDI A4 SPORT ULTRA TDI</h5>
              <div class="d-flex justify-content-around mt-5">
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/year.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">2000</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/engine.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">1998 cc</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/gearbox.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Manual</p>
                </div>
                <div class="col d-flex align-middle align-items-center">
                  <p class="m-1"><img src="./assets/icons/fuel.svg" style="height:30px; width:30px;" alt=""></p>
                  <p class="m-1">Diesel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <small>Ref: 10</small>
            <small>Arrived 3 mins ago</small>
        </div>
        </a>
      </div>
    </div>

<!-- usun -->


</div>

<?php
  include './components/footer.php';
?>