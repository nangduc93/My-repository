<?php
<!-- // include 'C:/xampp/htdocs/addcart/connect.php'; -->

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "addcart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

if(isset($_POST['upload'])) {
  if(isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $images = 'thuanh/'.basename( $_FILES['file']['name']);
    move_uploaded_file( $_FILES['file']['tmp_name'], $images);

      $sql = "INSERT INTO upanh (anh) VALUES ('$images');";
      $query = $conn->query($sql);
      if($query === TRUE){
      echo "Up anh thành công";
      } else {
      echo "Lỗi: ";
      }
  };
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="formFile" class="form-label">upload file</label>
  <input class="form-control" type="file" id="formFile" name="file">
</div>
  <button type="submit" class="btn btn-primary" name="upload">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>