<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Page</title>
  <style>
    body{
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-weight: 200;
    }
    h1,h2,p{
      text-align: center;
    }
    h1{
      font-size: 200px;
      font-weight: 400;
      color: #ff7c6280;
      margin: 0;
      padding: 0;
    }
    h2{
      font-size: 26px;
      font-weight: 400;
    }
    p{
      font-size: 18px;
    }
    a{
      color: #FF7B62;
      text-decoration: none;
      border-bottom: 1px dashed #ff7068;
      font-weight: 400;
    }

    .container {
      height: 100vh;
      position: relative;
      
    }

    .vertical-center {
      width: 360px;
      margin:0;
      margin: 0;
      position: absolute;
      top:50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);

    }
  </style>
</head>
<body>
    <div class="container">
      <div class="vertical-center">
        <h1>404</h1>
        <h2>OOPS! NOTHING WAS FOUND</h2>
        <P>The page you are looking for might have been removed, had its name changed or is temporarily unaviable.<br><br>
          <a href="list.php">Return to homepage.</a></P>
      </div>
    </div>
  </main>
</body>
</html>

';