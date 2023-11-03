<?php
header("Access-Control-Allow-Origin: *");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$results = "";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  if (empty($_FILES["fileToUpload"]["name"])) {
    $results .= "Please upload a photo<br>
    <a href='upload.html'><button>Return to listing page</button></a>"; 
  }

  else {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check == false) {
    $results .= "File is not an image.</br>";
    $uploadOk = 0;}


  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $results .= "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $results .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $results .= "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    $ext = explode('.',$_FILES["fileToUpload"]['name']);
    $extension = $ext[1];
    $newname = $ext[0].'_'.time();
    $full_local_path = $target_dir.$newname.'.'.$extension ;

    if (isset($_GET["listingid"])){
      $listing_id = $_GET["listingid"];

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $full_local_path)) {
        header('Location: create.html?listing_id='.$listing_id.'&upload='.$newname);
      } else {
        $results .= "Sorry, there was an error uploading your file.";
      }
    }

    else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $full_local_path)) {
        header('Location: create.html?upload='.$newname);
      } else {
        $results .= "Sorry, there was an error uploading your file.";
      }
    }
  }
    }
  }
echo $results;
?>