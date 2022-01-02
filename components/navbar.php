<?php
include 'variables.php';

if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
echo

'<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <h4>Hello '.$username.'</h4>
      <!-- Left links -->
      <div class="d-flex align-items-center">
        <a class="m-2" href="javascript:history.back()"><i class="fas fa-arrow-left fa-lg"data-bs-toggle="tooltip" data-bs-placement="bottom" title="back"></i></a>
        <a class="m-2" href="check_in.php"><i class="fas fa-plus fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="add vehicle"></i></a>
        <a class="m-2" href="targets.php"><i class="fas fa-bullseye fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="targets"></i></a>
        <a class="m-2" href="sold.php"><i class="fas fa-pound-sign fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="sold"></i></a>
        <a class="m-2" href="recycled.php"><fa-lg class="fas fa-recycle fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="recycled"></i></a>
        <a class="m-2" href="list.php"><i class="fas fa-car fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="list of cars"></i></a>
        <a class="m-2" href="logout.php"><i class="fas fa-sign-out-alt fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="logout"></i></a>
      </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->';
// '<nav class="navbar sticky-top navbar-light bg-light justify-content-center">
//   <span class="navbar-brand" > Hello '.$username.'</span>
//   <a href="javascript:history.back()"><i class="fas fa-arrow-left fa-lg m-3"></i></a>
//   <a href="list.php"><i class="fas fa-home fa-lg m-3"></i></a>
//   <a href="logout.php"><i class="fas fa-sign-out-alt fa-lg m-3"></i></a>
// </nav>';
}
else{
  echo
'<nav class="navbar sticky-top navbar-light bg-light justify-content-end px-4 py-3">
  <a class="m-2" href="javascript:history.back()"><i class="fas fa-arrow-left fa-lg"data-bs-toggle="tooltip" data-bs-placement="bottom" title="back"></i></a>
  <a class="m-2" href="https://lc-hughes.co.uk/"><i class="fas fa-home fa-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Main"></i></a>
  <a class="m-2" href="login.php"><i class="fas fa-sign-in-alt fa-lg"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"></i></a>
</nav>';
}