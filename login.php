<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LC Hughes - vehicle inventory system</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="apple-touch-icon" href="./assets/favicon.ico"/>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/style.css">

        <!-- Google Fonts -->

        
    </head>
    <body>
        <!-- Responsive navbar-->

        <!-- Page content-->
        <div class="container">
          <div class="row justify-content-center mt-5">
            <div class="window">
              <div class="row m-5">
                <img src="assets/L.C. Hughes Logo.png" alt="Logo">
              </div>
              <form action="success.php" method="post">
                <div class="row my-5 mx-3 input_wrap justify-content-start">
                  <input type="text" name="username" id="username" required autocomplete="off" pattern="[A-Za-z]{3,}">
                  <label>Username</label>
                </div>
                <div class="row my-5 mx-3 input_wrap justify-content-start">
                  <input type="password" name="password" id="password" required autocomplete="new-password" pattern="[a-zA-Z0-9-]+">
                  <label>Password</label>
                </div>
                <div class="row my-5 mx-3">
                  <input type="submit" name="password" id="login" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Page content -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <!-- Font Awsome -->
        <script src="https://kit.fontawesome.com/dd12015ad5.js" crossorigin="anonymous"></script>
    </body>
</html>
