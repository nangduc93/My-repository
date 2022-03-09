<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  include_once 'db.php';
    
  // Taking all 4 values from the form data(input)
  $id = $_POST['ID'];
  $TenSanpham = $_POST['TenSanpham'];
  $GiaSanpham = $_POST['GiaSanpham'];
  $AnhSanpham = $_POST['AnhSanpham'];

    // $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    // $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    // $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    
  // Performing insert query execution
  // here our table name is college
  $sql = "UPDATE SanPham SET TenSanpham = '$TenSanpham',
                            AnhSanpham = '$AnhSanpham',
                            GiaSanpham = '$GiaSanpham'
                            WHERE ID = $id";
    
    if ($conn->query($sql) === TRUE) {
      //Nếu kết quả kết nối thành công, trở về trang view.
      header('Location: bangdb.php');
  } else {
      //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo lỗi cần thiết.
      header('Location: suadb.php?error=1');
  }
    
  // Close connection
  $conn->close();
  ?>

</body>
</html>