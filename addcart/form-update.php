<?php
include "header.php";
include "connect.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];
  // $sql = "UPDATE * FROM products WHERE id = '$id'";
  $result = $conn->query("SELECT * FROM products WHERE id = '$id'");
  while ($row = $result->fetch_assoc()) {
    $ten = $row['ten'];
    $anh = $row['anh'];
    $gia = $row['gia'];
   }
}

if(isset($_POST['update'])) {
  $ten = $_POST['ten'];
  $gia = $_POST['gia'];
  if(isset($_FILES['anh'])) {
  $anh = $_FILES['anh']['tmp_name'];
  $ten_anh = $_FILES['anh']['name'];
  $diachi = "images/".$ten_anh;
  move_uploaded_file(  $anh, $diachi);
           
  $sql = "UPDATE products SET ten = '$ten', anh = '$ten_anh', gia = '$gia' WHERE id = $id";
  $query = $conn->query($sql);
  if($query === TRUE){
    header('Location: index.php');
  } else {
  echo "Lỗi: ";
    }
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
        <legend>Sua san pham</legend>
  <div class="mb-3">
    <label for="ten" class="form-label">Ten</label>
    <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $ten; ?>">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Anh</label>
  <input class="form-control" type="file" id="formFile" name="anh" value="">
  <img src="images/<?php echo $anh; ?>" alt="">
</div>
<div class="mb-3">
  <label for="gia" class="form-label">Gia</label>
    <input type="text" class="form-control" id="gia" name="gia" value="<?php echo $gia; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Submit</button>
</form>
    </div>
</body>
</html>