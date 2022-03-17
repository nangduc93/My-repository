<?php
include "header.php";
include "connect.php";

if(isset($_POST['upload'])) {
  $ten = $_POST['ten'];
  // $anh = $_POST['anh'];
  if(isset($_FILES['anh'])) {
      $anh = $_FILES['anh']['name'];
      $anh_tmp = $_FILES['anh']['tmp_name'];
      $anh_path = 'images/'.( $anh);
  };
  $gia = $_POST['gia'];

  $sql = "INSERT INTO products (ten, anh, gia) VALUES ('$ten', '$anh', '$gia')";
  $query = $conn->query($sql);
  move_uploaded_file( $anh_tmp, $anh_path);
  if($query === TRUE){
    header("location: index.php");
  } else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <legend>Them moi san pham</legend>
  <div class="mb-3">
    <label for="ten" class="form-label">Ten</label>
    <input type="text" class="form-control" id="ten" name="ten">
  </div>
  <div class="mb-3" id="hasimg">
  <label for="img" class="form-label">Anh</label>
  <input class="form-control" type="file" id="img" name="anh">
</div>
<div class="mb-3">
  <label for="gia" class="form-label">Gia</label>
    <input type="text" class="form-control" id="gia" name="gia">
  </div>
  <button type="submit" class="btn btn-primary" name="upload">Submit</button>
</form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        var input = $('#img');

  input.on('change', function preview() {
    var file = $('#img').get(0).files[0];
    if(file) {
      var reader = new FileReader();
      reader.onload = function() {
        if($('#preview').length) {
          $('#preview').attr('src', reader.result);
        } else {
          var preview = $('#hasimg').append("<img id='previewImg' src='"+reader.result+"' alt='Placeholder' width='20%' height='20%'>");
        }
      }
      reader.readAsDataURL(file);
    }
  });
});
    </script>
</body>
</html>