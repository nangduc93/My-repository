<?php
include 'connect.php';

if(isset($_POST['upload'])) {
  if(isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $forder = 'images/'.$file_name;

    move_uploaded_file(  $file_tmp, $forder);

      $sql = "INSERT INTO upanh (anh) VALUES ('$file_name');";
      $query = $conn->query($sql);
      if($query === TRUE){
        header('Location: view-anh.php');
      } else {
      echo "Lỗi: ";
      }
  };
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="magnific-popup/magnific-popup.css">

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="magnific-popup/jquery.magnific-popup.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3" id="hasimg">
  <label for="formFile" class="form-label">upload file</label>
  <input class="form-control" type="file" id="inputImg" name="file">
</div>
  <button type="submit" class="btn btn-primary" name="upload">Submit</button>
</form>
    </div>
    <script>
  $(document).ready(function() {
        var input = $('#inputImg');

  $('.container').magnificPopup({
    delegate: 'lightbox',
    type: 'image'
  });

  input.on('change', function preview() {
    var file = $('#inputImg').get(0).files[0];
    if(file) {
      var reader = new FileReader();
      reader.onload = function() {
        if($('#preview').length) {
          $('#preview').attr('src', reader.result);
        } else {
          var preview = $('#hasimg').append("<a class='lightbox' href='"+reader.result+"'><img id='previewImg' src='"+reader.result+"' alt='Placeholder' width='20%' height='20%'></a>");
        }
      }
      reader.readAsDataURL(file);
    }
  });
});
    </script>
</body>
</html>