<?php
include "header.php";
include "connect.php";

//   $servername = "localhost:3306";
//   $username = "root";
//   $password = "";
//   $dbname = "addcart";
  
//   // Create connection
//   $conn = mysqli_connect($servername, $username, $password, $dbname);
//   // Check connection
//   if (!$conn) {
//     die("Kết nối thất bại: " . mysqli_connect_error());
//   }

session_start();

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
echo "<pre>";
print_r($cart);
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
    <div class="container">
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
           $total_price = 0;
           ?>
            <?php
            foreach ($cart as $key => $value) {
                $total_price += $value['gia'] * $value['quanlity'];
            ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><img src="<?php echo $value['anh'] ?>" alt="" width="100px"></td>
                <td><?php echo $value['ten'] ?></td>
                <td>
                    <form action="cart.php" class="form-inline">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                    <input type="text" name="quantity" value="<?php echo $value['quantity'] ?>">
                    <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td><?php echo $value['gia'] ?></td>
                <td><?php echo number_format($value['gia'] * $value['quantity']) ?></td>
                <td><a href="cart.php?id=<?php echo $value["id"] ?>&action=delete" class="btn btn-danger">Xóa</a></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Tong tien</td>
                <td class="bg-info text-center" colspan="6">
                    <?php echo number_format($total_price) ?>VND</td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>