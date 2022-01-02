<?php
  session_start();
  include './components/header.php';
  include './components/navbar.php';
  include './components/restrict.php';
  include './components/clear.php';

?>
<!-- Page content-->
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="window">
      <div class="row m-5">
        <img src="assets/L.C. Hughes Logo.png" alt="Logo">
      </div>
      <form action="fetch.php" method="post">
        <div class="row my-5 mx-3 input_wrap justify-content-start">
          <?php
            if(isset($_SESSION['error'])){
              echo '<div class="text-center p-3 alert-danger">'.$_SESSION["error"].'</div>';
              unset($_SESSION['error']);
            }
          ?>
          <input class="registration mt-4" type="text" name="registration" id="registration" required autocomplete="off" pattern="[a-zA-Z0-9 ]+">
        </div>
        <div class="row my-5 mx-3">
          <input type="submit" name="submit" id="main" value="Check in">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Page content -->
<?php
  include './components/footer.php';
?>