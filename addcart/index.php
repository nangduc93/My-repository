<?php
include "header.php";
include "connect.php";

if(isset($_POST['id'])) {
  $id = $_POST['id'];
}

if(!empty($_GET["action"])) {
  switch($_GET["action"]) {
     case "add":
      $so = $_POST['so'];
       $add = $conn->query("INSERT INTO addcart (id_product, soluong) VALUES ($id, $so) ON DUPLICATE KEY UPDATE soluong = soluong + 1");
        break;
 case "update":
     $sol = $_POST['soedit'];
     $edit = $conn->query("UPDATE addcart SET soluong = $sol WHERE id_product = $id");
     break;
 case "delete":
     $del = $conn->query("DELETE FROM addcart WHERE id_product = $id");
     break;
  case "remove":
     $rem = $conn->query("DELETE FROM addcart");
     break;	
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
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<div class="container-fluid">
  <div class="card">
    <div class="container">
    <h1>Shoping Cart</h1>
    <div class="row">
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Thành tiền</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
           <?php
           $total_item = 0;
           $total_price = 0;
           ?>
            <?php
               $sql1 = "SELECT products.id, products.ten, products.anh, addcart.id_product, addcart.soluong, products.gia FROM products JOIN addcart ON products.id = addcart.id_product";
               $result1 = $conn->query($sql1);
            foreach ($result1 as $row) {
                $total_item += $row['soluong'];
                $total_price += ($row['gia'] * $row['soluong']);
            ?>
            <tr>
                <td><?php echo $row['id_product'] ?></td>
                <td><img src="images/<?php echo $row['anh'] ?>" alt="" width="100px"></td>
                <td><?php echo $row['ten'] ?></td>
                <td>
                    <form action="index.php?action=update"  method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id_product'] ?>">
                    <input type="text" name="soedit" value="<?php echo $row['soluong'] ?>">
                    <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
                    </form>
                </td>
                <td><?php echo $row['gia'] ?></td>
                <td><?php echo number_format($row['gia'] * $row['soluong']) ?></td>
                <td><form action="index.php?action=delete" method="post">
                        <input type="hidden" name="id" value="<?php
                        echo $table['id_product']
                        ?>">
                    <button type="submit" name="delete" class="btn btn-danger">Xoa</button>
                    </form></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Tong</td>
                <td colspan="2"></td>
                <td class="bg-success text-center">Don hang: <?php echo $total_item; ?></td>
                <td class="bg-info text-center" colspan="2">
                    <?php echo $total_price; ?> VND</td>
                <td><form action="index.php?action=remove" method="post">
                    <button type="submit" name="remove" class="btn btn-danger">Trong</button>
                    </form></td>
            </tr>
        </tbody>
    </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="container">
    <h1>Danh sach san pham</h1>
    <div class="row">
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    foreach ($result as $form) {
      ?>
      <div class="col">
        <form action="index.php?action=add" method="post">
          <div class="card" style="width: 18rem;">
            <img src="images/<?php echo $form["anh"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $form["ten"]; ?></h5>
              <input type="hidden" name="id" value="<?php echo $form["id"]; ?>">
              <p class="card-text"><?php echo "$".$form["gia"]; ?></p>
              <input type="hidden" name="so" value="1">
              <button type="submit" class="btn btn-primary" name="add">Thêm giỏ</button>
            <div class="edit-del">
              <button class="btn btn-success"><a href="form-update.php?id=<?php echo $form["id"]; ?>" class="text-reset">Edit</a></button>
              <button class="btn btn-danger"><a href="delete.php?id=<?php echo $form["id"]; ?>" class="text-reset">Del</a></button>
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
