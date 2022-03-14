<?php
include "header.php";
include "connect.php";

// if(isset($_POST['name'])) {
//     $name = $_POST['name'];
//     $ma = $_POST['ma'];
//     if(isset($_FILES['file'])) {
//       $anh = $_FILES['file']['name'];
//       move_uploaded_file( $_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']);
//   };
//     $gia = $_POST['gia'];

//     $sql = "INSERT INTO products (ten, ma, anh, gia) VALUES ('$name', '$ma', '$anh', '$gia')";
//     $query = mysqli_query($conn, $sql);
//     if($query){
//       header("location: index.php");
//     } else {
//     echo "Lỗi: ";
//     }
//   }
$conn->close();
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
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <legend>Them moi san pham</legend>
  <div class="mb-3">
    <label for="ten" class="form-label">Ten</label>
    <input type="text" class="form-control" id="ten" name="ten">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Anh</label>
  <input class="form-control" type="file" id="formFile" name="anh">
</div>
<div class="mb-3">
  <label for="gia" class="form-label">Gia</label>
    <input type="text" class="form-control" id="gia" name="gia">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</body>
</html>