<?php
  session_start();
  
  if(isset($_POST['email']))
  {
    // udana walidacja
    $All_OK=true;

    // sprawdz poprawnosc nickname
    $nick = $_POST['nick'];

    // sprawdzenie dlugosci nicka
    if((strlen($nick)<3) || (strlen($nick)>20))
    {
      $All_OK = false;
      $_SESSION['e_nick']="Nick musi posiadac od 3 do 20 znakow!";
    }

    if(ctype_alnum($nick)==false)
    {
      $All_OK = false;
      $_SESSION['e_nick']="nick litery i cyfry bez pl znakow";
    };
    
    // email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
      $All_OK = false;
      $_SESSION['e_email'] = "podaj poprawny adres email";
    }
    // hasla
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if((strlen($haslo1)<8)||(strlen($haslo1)>20))
    {
      $All_OK = false;
      $_SESSION['e_haslo'] = "haslo musi posiadac od 8 do 20 znakow";      
    }

    if($haslo1!=$haslo2)
    {
      $All_OK = false;
      $_SESSION['e_haslo'] = "podane hasla nie sa identyczne";
    }
    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    // checkbox
    if(!isset($_POST['regulamin'])){
      $_SESSION['e_regulamin'] = "potwierdz akceptacje regulaminu";
    }

    // recaptcha
    $secret = '6LfkaC0cAAAAAEkq-2oql3ZoTsiXUzi5QqoQVczn';
    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

    $response = json_decode($sprawdz);

    if($response->success==false){
      $All_OK = false;
      $_SESSION['e_bot'] = "potwierdz ze nie jestes botem";
    }


    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try{
      $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
      if($polaczenie -> connect_errno!=0)
        {
          throw new Exception(mysqli_connect_errno());
        }
        else
        {
          // czy email juz istnieje
          $rezultat = $polaczenie-> query("SELECT id FROM uzytkownicy WHERE email='$email'");

          if(!$rezultat) throw new Exception($polaczenie->error);

          $ile_takich_maili = $rezultat->num_rows;
          if($ile_takich_maili>0)
          {
            $All_OK = false;
            $_SESSION['e_email'] = "istnieje juz to konto przypiusane do tego adresu meailowego";
          }

          // czy nick juz istnieje 
          $rezultat = $polaczenie-> query("SELECT id FROM uzytkownicy WHERE user='$nick'");

          if(!$rezultat) throw new Exception($polaczenie->error);
          $ile_takich_nickow = $rezultat->num_rows;
          if($ile_takich_nickow>0)
          {
            $All_OK = false;
            $_SESSION['e_nick'] = "istnieje juz gracz o takim niku";
          }
          if($All_OK == true)
          {
      
          // all ok
          if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$nick','$haslo_hash','$email',100,100,100,14)")){
            $_SESSION['udana_rejestracja'] = true;
            header('Location: witamy.php');
            exit();
          }
          else{
            throw new Exception($polaczenie->error);
          }
          }
          $polaczenie->close();
        }
    }
    catch(Exception $e)
    {
      echo '<span style="color:red;">error</span>';
      // echo'<br> informacja dev:'.$e;
    }  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zaloz darmowe konto</title>
  <!-- reCaptcha -->
</script>
<script src="https://www.google.com/recaptcha/api.js"
    async defer>
</script>
<style>
  .error{
    color:red;
    margin-bottom: 10px;
    margin-top: 10px;
  }
</style>
</head>
<body>
  <form method="post">
    nickname: <br> 
    <input type="text" name="nick"  id=""> <br>
      <?php
      if (isset($_SESSION['e_nick']))
      {
        echo'<div class="error">'.$_SESSION ['e_nick'].'</div>';
        unset($_SESSION['e_nick']);
      }
      ?>
    e-mail: <br> 
    <input type="email" name="email"  id=""><br>
      <?php
      if (isset($_SESSION['e_email']))
      {
        echo'<div class="error">'.$_SESSION ['e_email'].'</div>';
        unset($_SESSION['e_email']);
      }
      ?>
    haslo <br> 
    <input type="password" name="haslo1"  id=""><br>
    <?php
      if (isset($_SESSION['e_haslo']))
      {
        echo'<div class="error">'.$_SESSION ['e_haslo'].'</div>';
        unset($_SESSION['e_haslo']);
      }
      ?>
    powtórz haslo <br> 
    <input type="password" name="haslo2"  id=""><br>
    <label>
      <input type="checkbox" name="regulamin"  id=""> Akceptuje Regulamin
    </label>
    <?php
      if (isset($_SESSION['e_regulamin']))
      {
        echo'<div class="error">'.$_SESSION ['e_regulamin'].'</div>';
        unset($_SESSION['e_regulamin']);
      }
      ?>

    <div class="g-recaptcha" data-sitekey="6LfkaC0cAAAAALi05-ekWqDJfA9hHVwmFy29bIbg"></div>
    <br/>
    <?php
      if (isset($_SESSION['e_bot']))
      {
        echo'<div class="error">'.$_SESSION ['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
      }
      ?>
      <input type="submit" value="Zarejestruj">
  </form>
  
  
</body>
</html>