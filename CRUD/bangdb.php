<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
  include_once 'db.php';

$sql = "SELECT * FROM SanPham";
$result = $conn->query($sql);
?>

<table border='2' cellspacing='2' cellpadding='1'>
  <thead>
    <tr>
      <td>Ten San pham</td>
      <td>Anh San pham</td>
      <td>Gia San pham</td>
      <td>Gio Hang</td>
      <td>Thao Tac</td>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) { ?>
    <tr>
      <td><?php echo $row["TenSanpham"]; ?></td>
      <td><?php echo $row["AnhSanpham"]; ?></td>
      <td><?php echo $row["GiaSanpham"]; ?></td>
      <td><button><a href='#' class='add-to-cart btn btn-primary'><i class='fa fa-shopping-cart' style='font-size:20px'></i></a></button></td>
      <td><button><a href="suadb.php?id=<?php echo $row["ID"]; ?>">Edit</a></button>
          <button><a href="xoadb.php?id=<?php echo $row["ID"]; ?>">Del</a></button></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</body>
</html>