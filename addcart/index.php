<?php
include "header.php";
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<?php
  // $servername = "localhost:3306";
  // $username = "root";
  // $password = "";
  // $dbname = "addcart";
  
  // // Create connection
  // $conn = mysqli_connect($servername, $username, $password, $dbname);
  // // Check connection
  // if (!$conn) {
  //   die("Kết nối thất bại: " . mysqli_connect_error());
  // }

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<div class="container-fluid">
  <div class="card">
    <div class="container">
      <h1>Danh sach san pham</h1>
    </div>
  </div>
  <div class="card">
    <div class="container">
    <div class="row">
    <?php foreach ($result as $row) { ?>
      <div class="col">
        <form action="cart.php?id=<?php echo $row["id"] ?>" method="post">
          <div class="card" style="width: 18rem;">
            <img src="images/<?php echo $row["anh"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["ten"]; ?></h5>
              <p class="card-text"><?php echo "$".$row["gia"]; ?></p>
              <button type="submit" class="btn btn-primary" name="submit">Thêm giỏ</button>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <div class="edit-del">
              <button class="btn btn-success"><a href="form-update.php?id=<?php echo $row["id"]; ?>" class="text-reset">Edit</a></button>
              <button class="btn btn-danger"><a href="delete.php?id=<?php echo $row["id"]; ?>" class="text-reset">Del</a></button>
            </div>
            </div>
          </div>
        </form>
      </div>
    <?php } ?>
  </div>
    </div>
  </div>
</div>




<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>