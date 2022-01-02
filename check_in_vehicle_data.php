<?php
  session_start();
  include './components/restrict.php';

  if(!isset($_SESSION['data'])){
    header('Location: list.php');
    exit();
  }
  
  include './components/header.php';
  include './components/navbar.php';
?>
<!-- Page content-->
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="window">
      <form enctype="multipart/form-data" action="submit.php" method="post">
        <div class="row my-4 mx-3 input_wrap justify-content-start">
          <input class="registration" type="text" name="registration" id="registration" autocomplete="off" readonly value="<?PHP echo $_SESSION['Vrm'] ?>">
        </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Milage" id="Milage" autocomplete="off" 
            value="<?php if(isset($_SESSION['Milage'])){echo $_SESSION['Milage'];}?>">
            <label>Milage</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Price" id="Price" autocomplete="off"
            value="<?php if(isset($_SESSION['Price'])){echo $_SESSION['Price'];}?>">
            <label>Price</label>
          </div>
          <?php if(isset($_SESSION['Message'])){echo $_SESSION['Message'];}?>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input class="form-control" type="file" id="formFile" name="fileUpload" accept="image/*" onchange="loadFile(event)" onclick="clearError()">
            <label>Picture</label>
            <img class="img-fluid mt-2" style="object-fit:cover;" id="output"/>
          </div>
          
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <select name="Engine_Starts" aria-label="Engine_Starts">
              <option value="Yes" selected>Yes</option>
              <option value="No">No</option>
              <option value="Unknown">Unknown</option>
            </select>
            <label>Engine starts</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <input type="number" name="Engine_price" id="Engine_price" autocomplete="off" 
            value="<?php if(isset($_SESSION['Engine_price'])){echo $_SESSION['Engine_price'];}?>">
            <label>Engine price</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <textarea name="Comment" style="width:100%; height: 80px; padding-top: 10px;" type="text" id="Comment" autocomplete="off"><?php if(isset($_SESSION['Comment'])){echo $_SESSION['Comment'];}?></textarea>
            <label>Comment</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <textarea name="Parts_sold" style="width:100%; height: 80px; padding-top: 10px;" type="text" id="Parts_sold" autocomplete="off"><?php if(isset($_SESSION['Parts_sold'])){echo $_SESSION['Parts_sold'];}?></textarea>
            <label>Parts sold</label>
          </div>
          <div class="row my-4 mx-3 input_wrap justify-content-start">
            <select name="Location" aria-label="Location">
              <option value="Depolution" selected>Depolution</option>
              <option value="Compound">Compound</option>
              <option value="For sale">For Sale</option>
              <option value="Yard">Yard</option>
            </select>
            <label>Location*</label>
          </div>
        <div class="row my-4 mx-3">
          <input type="submit" name="submit" id="main" value="Check in">
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
