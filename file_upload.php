<?php

$message = ''; 
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
        $message ='File is successfully uploaded.';
        // echo $message;
      }
      else 
      {
        $message = '<div id="error" class="text-center mx-3 p-3 alert-danger">There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.</div>';

        $_SESSION['Message'] = $message;
        header('Location: check_in_vehicle_data.php');
      }
    }
    else
    {
      $message = '<div id="error" class="text-center mx-3 p-3 alert-danger">Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions).'</div>';

      $_SESSION['Message'] = $message;
      header('Location: check_in_vehicle_data.php');
    }
  }
  else
  {
    $dest_path = "pictures/Default.png";
    // $message = 'There is some error in the file upload. Please check the following error.<br>';
    // $message .= 'Error:' . $_FILES['fileUpload']['error'];
    
    // $_SESSION['Message'] = '<div class="text-center mx-3 p-3 alert-danger">'.$message.'</div>';
    // header('Location: check_in_vehicle_data.php');
  }
}
// echo $message;
// echo $dest_path;

$_SESSION['Path'] = $dest_path;
