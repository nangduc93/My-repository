<?php
include "header.php";
include "connect.php";
?>

!DOCTYPE html>
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
<?php
  // include_once 'connect.php';

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

//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // $sql = "UPDATE * FROM products WHERE id = '$id'";
    $result = $conn->query("SELECT * FROM products WHERE id = '$id'");

    while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        $id = $row['id'];
        $ten = $row['ten'];
        $anh = $row['anh'];
        $gia = $row['gia'];

?>

    <form action="update.php?id=<?php echo $row["id"]; ?>" method="post" enctype="multipart/form-data">
        <legend>Them moi san pham</legend>
  <div class="mb-3">
    <label for="ten" class="form-label">Ten</label>
    <input type="text" class="form-control" id="ten" name="name" value="<?php echo $ten; ?>">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">anh</label>
  <input class="form-control" type="file" id="formFile" name="file" value="<?php echo $anh; ?>">
</div>
<div class="mb-3">
  <label for="gia" class="form-label">Gia</label>
    <input type="text" class="form-control" id="gia" name="gia" value="<?php echo $gia; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php
          }
        }
    $conn->close();
        ?>
    </div>
</body>
</html>