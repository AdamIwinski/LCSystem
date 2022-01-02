<?php
  session_start();
  if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] ==true)){
    $header = $_SESSION['user'];
    header("Location: $header.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Babon projects login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-5 p-b-20">
				<form class="login100-form" action="login.php" method="POST">
					<span class="login100-form-title p-b-50">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<a href="http://www.babon.co.uk"><img src="images/avatar-01.jpg" alt="AVATAR"></a><img src="images/avatar-01.jpg" alt="AVATAR">
					</span>
          <span style=
          "width:100%;
          display: flex;
          justify-content: center;
          margin-top: 35px">
<?php
    if(isset($_SESSION['blad'])) 
    echo $_SESSION['blad'];
  ?>
          </span>
  					<div class="wrap-input100 m-t-25 m-b-35">
						<input class="input100" placeholder="Username"type="text" name="login">
          </div>
					<div class="wrap-input100 m-b-50" >
						<input class="input100"  placeholder="Password" type="password" name="password">
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>