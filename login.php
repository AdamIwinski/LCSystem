<?php
  session_start();
  if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in'] ==true)){
    header('Location: list.php');
    exit();
  }

  include './components/header.php';
?>
        <!-- Responsive navbar-->

        <!-- Page content-->
        <div class="container">
          <div class="row justify-content-center mt-5">
            <div class="window">
              <div class="row m-5">
                <img src="assets/L.C. Hughes Logo.png" alt="Logo">
              </div>
              <form action="loginSuccess.php" method="post">
                <div class="row">
                  <?php
                    if(isset($_SESSION['error'])){
                      echo $_SESSION['error'];
                    } 
                  ?>
                </div>
                <div class="row my-5 mx-3 input_wrap justify-content-start">
                  <input type="text" name="username" id="username" required autocomplete="off" pattern="[A-Za-z]{3,}">
                  <label>Username</label>
                </div>
                <div class="row my-5 mx-3 input_wrap justify-content-start">
                  <input type="password" name="password" id="password" required autocomplete="new-password" pattern="[a-zA-Z0-9-]+">
                  <label>Password</label>
                </div>
                <div class="row my-5 mx-3">
                  <input type="submit" name="submit" id="main" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Page content -->
<?php
  include './components/footer.php';
?>