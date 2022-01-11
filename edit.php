<?php
  session_start();
  include './components/restrict.php';
  include './components/header.php';
  include './components/navbar.php';

  if(isset($_SESSION['Id'])){
    $Id = $_SESSION['Id'];

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

      try{
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        if($connection -> connect_errno!=0)
          {
            throw new Exception(mysqli_connect_errno());
          }
          else{
            $sql = $connection->query("SELECT * FROM cars WHERE id = '$Id'");
            $car = $sql-> fetch_assoc();

            // print_r($car);
            $connection->close();
          }
      }
      catch(Exception $e)
      {
        echo '<span style="color:red;">error</span>';
        echo'<br> informacja dev:'.$e;
      }  
} 
$_SESSION['Path'] = $car['Path'];
$_SESSION['Time'] = $car['time'];
$data = json_decode($car['Data'], true);
$_SESSION['Model'] = $data['Response']['DataItems']['VehicleRegistration']['Model'];
$_SESSION['Make'] = $data['Response']['DataItems']['VehicleRegistration']['Make'];

if (isset($_POST['submit'])){
  if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
    $fileName = $_FILES['fileUpload']['name'];
    $fileSize = $_FILES['fileUpload']['size'];
    $fileType = $_FILES['fileUpload']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg','jpeg','png');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'pictures/';
      $dest_path = $uploadFileDir . $newFileName;
    
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      { 
        $file_pointer = $_SESSION['Path'];
        unlink($file_pointer);
        $message ='File is successfully uploaded.';
        $_SESSION['Path'] = $dest_path;
        $_SESSION['Id'] = $_POST['Id'];
        $_SESSION['Vrm'] = $_POST['Vrm'];
        $_SESSION['Milage'] = $_POST['Milage'];
        $_SESSION['Price'] = $_POST['Price'];
        $_SESSION['Engine_price'] = $_POST['Engine_price'];
        $_SESSION['Engine_Starts'] = $_POST['Engine_Starts'];
        $_SESSION['Comment'] = $_POST['Comment'];
        $_SESSION['Parts_sold'] = $_POST['Parts_sold'];
        $_SESSION['Location'] = $_POST['Location'];
        header('Location: push.php');

      }
      else 
      {
        $message = '<div id="error" class="text-center mx-3 p-3 alert-danger">There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.</div>';

        $_SESSION['Message'] = $message;
        echo $message;
      }
    }
    else
    {
      $message = '<div id="error" class="text-center mx-3 p-3 alert-danger">Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions).'</div>';

      $_SESSION['Message'] = $message;
      echo $message;
    }
  }else{
        $_SESSION['Path'] = $car['Path'];
        $_SESSION['Id'] = $_POST['Id'];
        $_SESSION['Vrm'] = $_POST['Vrm'];
        $_SESSION['Milage'] = $_POST['Milage'];
        $_SESSION['Price'] = $_POST['Price'];
        $_SESSION['Engine_price'] = $_POST['Engine_price'];
        $_SESSION['Engine_Starts'] = $_POST['Engine_Starts'];
        $_SESSION['Comment'] = $_POST['Comment'];
        $_SESSION['Parts_sold'] = $_POST['Parts_sold'];
        $_SESSION['Location'] = $_POST['Location'];
        header('Location: push.php');
  }
}

?>
<!-- Page content-->
<div class="container">
  <div class="row justify-content-center my-5">
    <div class="window">
      <form enctype="multipart/form-data" action="edit.php" method="post">
        <div class="row my-4 mx-3 input_wrap justify-content-start">
          <input class="registration" type="text" name="Vrm" id="registration" autocomplete="off" readonly value="<?PHP echo $car['Vrm'] ?>">
        </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Milage" id="Milage" autocomplete="off" 
            value="<?php echo $car['Milage']?>">
            <label>Milage</label>
          </div>
          <input type="hidden" name="Id" id="Id" autocomplete="off" 
            value="<?php echo $car['id']?>">
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Price" id="Price" autocomplete="off"
            value="<?php echo $car['Price']?>">
            <label>Price</label>
          </div>
          <?php if(isset($_SESSION['Message'])){echo $_SESSION['Message'];}?>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input class="form-control" type="file" id="formFile" name="fileUpload" accept="image/*" onchange="loadFile(event)" onclick="clearError()">
            <label>Change Picture</label>
            <img src="<?php echo $car['Path']?>" class="img-fluid mt-2" style="object-fit:cover;" id="output"/>
          </div>
          
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <select name="Engine_Starts" aria-label="Engine_Starts">
              <option value="<?php echo $car['Engine_Starts']?>"><?php echo $car['Engine_Starts']?></option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
              <option value="Unknown">Unknown</option>
            </select>
            <label>Engine starts</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Engine_price" id="Engine_price" autocomplete="off" 
            value="<?php echo $car['Engine_price']?>">
            <label>Engine price</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <textarea name="Comment" style="width:100%; height: 80px; padding-top: 10px;" type="text" id="Comment" autocomplete="off"><?php echo $car['Comment']?></textarea>
            <label>Comment</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <textarea name="Parts_sold" style="width:100%; height: 80px; padding-top: 10px;" type="text" id="Parts_sold" autocomplete="off"><?php echo $car['Parts_sold']?></textarea>
            <label>Parts sold</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <select name="Location" aria-label="Location">
              <option value="<?php echo $car['Location']?>"><?php echo $car['Location']?></option>
              <option value="Depolution">Depolution</option>
              <option value="Compound">Compound</option>
              <option value="For sale">For Sale</option>
              <option value="Yard">Yard</option>
              <option value="Sold">Sold</option>
              <option value="Recycled">Recycled</option>
            </select>
            <label>Location*</label>
          </div>
        <div class="row my-4 mx-3">
          <input type="submit" name="submit" id="main" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Page content -->
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    };
  };

  function clearError(){
    document.getElementById('error').style.display = 'none';
  }
</script>
<?php
  include './components/footer.php';;
?>
