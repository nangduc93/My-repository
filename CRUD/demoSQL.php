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
//     $servername = "localhost:3306";
//     $username = "root";
//     $password = "";
// // Create connection
//     $conn = new mysqli($servername, $username, $password);
// // Check connection
//     if ($conn->connect_error) {
//         die("Kết nối thất bại: " . $conn->connect_error);
//     }

// // Create database
//     $sql = "CREATE DATABASE Demo";
//         if ($conn->query($sql) === TRUE) {
//     echo "Cơ sở dữ liệu được tạo thành công";
//         } else {
//     echo "Lỗi khi tạo cơ sở dữ liệu: " . $conn->error;
//         }

//     $conn->close();
    ?>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Demo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

// sql to create table
// $kh = "CREATE TABLE SanPham (
// ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// TenSanpham VARCHAR(30) NOT NULL,
// AnhSanpham VARCHAR(30) NOT NULL,
// GiaSanpham VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// $dh = "CREATE TABLE DonHang (
//     OrderID INT(6) PRIMARY KEY,
//     CustomerID INT(2) NOT NULL, 
//     EmployeeID INT(2) NOT NULL,
//     OrderDate DATE,
//     ShipperID INT(1)
//     )";

// $ct = "CREATE TABLE ChiTiet (
//     OrderDetailID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     OrderID INT(6) NOT NULL,
//     ProductID INT(2) NOT NULL,
//     Quantity INT(3)
//     )";

// if (mysqli_query($conn, $kh)) {
//   echo "Table  được tạo thành công";
// } else {
//   echo "Kết nối thất bại: " . mysqli_error($conn);
// }

// if (mysqli_query($conn, $dh)) {
//     echo "Table  được tạo thành công";
//   } else {
//     echo "Kết nối thất bại: " . mysqli_error($conn);
//   }

//   if (mysqli_query($conn, $ct)) {
//     echo "Table  được tạo thành công";
//   } else {
//     echo "Kết nối thất bại: " . mysqli_error($conn);
//   }


// $sql1 = "INSERT INTO KhachHang (CustomerName, ContactName, AddressName, City, PostalCode, Country)
// VALUES ('Nguyen Van A', 'Maria Anders', 'Obere Str. 57', 'Seattle', '98128', 'USA');";
// $sql1 .= "INSERT INTO KhachHang (CustomerName, ContactName, AddressName, City, PostalCode, Country)
// VALUES ('Dang Thi B', 'Ana Trujillo', 'Mataderos 2312', 'Helsinki', '21240', 'Finland');";
// $sql1 .= "INSERT INTO KhachHang (CustomerName, ContactName, AddressName, City, PostalCode, Country)
// VALUES ('Le Chi C', 'Antonio Moreno', '120 Hanover Sq.', 'Walla', '01-012', 'Poland')";

// $sql2 = "INSERT INTO DonHang (OrderID, CustomerID, EmployeeID, OrderDate, ShipperID)
// VALUES ('10248', '1', '5', '1996-07-04', '3');";
// $sql2 .= "INSERT INTO DonHang (OrderID, CustomerID, EmployeeID, OrderDate, ShipperID)
// VALUES ('10249', '2', '6', '1996-07-05', '1');";
// $sql2 .= "INSERT INTO DonHang (OrderID, CustomerID, EmployeeID, OrderDate, ShipperID)
// VALUES ('10250', '3', '4', '1996-07-08', '2')";

// $sql3 = "INSERT INTO ChiTiet (OrderID, ProductID, Quantity)
// VALUES ('10248', '11', '12');";
// $sql3 .= "INSERT INTO ChiTiet (OrderID, ProductID, Quantity)
// VALUES ('10249', '14', '9');";
// $sql3 .= "INSERT INTO ChiTiet (OrderID, ProductID, Quantity)
// VALUES ('10250', '41', '10')";


// if ($conn->multi_query($sql1) === TRUE) {
//   echo "Các bản ghi mới đã được tạo thành công";
// } else {
//   echo "Lỗi: " . $sql1 . "<br>" . $conn->error;
// }

// if ($conn->multi_query($sql2) === TRUE) {
//   echo "Các bản ghi mới đã được tạo thành công";
// } else {
//   echo "Lỗi: " . $sql2 . "<br>" . $conn->error;
// }

// if ($conn->multi_query($sql3) === TRUE) {
//   echo "Các bản ghi mới đã được tạo thành công";
// } else {
//   echo "Lỗi: " . $sql3 . "<br>" . $conn->error;
// }


// $sql = "SELECT id, ho, ten FROM BangCuaToi";
// $result = $conn->query($sql);

// $sql = "SELECT DonHang.OrderID, KhachHang.CustomerName FROM DonHang INNER JOIN KhachHang ON DonHang.CustomerID = KhachHang.CustomerID";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   echo "<table><tr><th>ID</th><th>Ten</th></tr>";
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "<tr><td>".$row["OrderID"]."</td><td>".$row["CustomerName"]."</td></tr>";
//   }
//   echo "</table>";
// } else {
//   echo "0 results";
// }

// $sql = "SELECT
// -- COUNT(OrderDetailID) AS NumberOfOrders,
// ChiTiet.OrderDetailID, DonHang.OrderID, KhachHang.CustomerName
// FROM ((DonHang
// INNER JOIN KhachHang ON DonHang.CustomerID = KhachHang.CustomerID)
// INNER JOIN ChiTiet ON DonHang.OrderID = ChiTiet.OrderID)
// -- WHERE OrderDetailID=2
// -- ORDER BY OrderDetailID DESC
// -- LIMIT 2
// GROUP BY OrderDetailID;
// ";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   echo "<table><tr><th>OrderDetailID</th><th>OrderID</th><th>CustomerName</th></tr>";
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "<tr><td>".$row["OrderDetailID"]."</td><td>".$row["OrderID"]."</td><td>".$row["CustomerName"]."</td></tr>";
//   }
//   echo "</table>";
// } else {
//   echo "0 results";
// }

// $sql = "UPDATE BangCuaToi SET ten='Thi D' WHERE id=2";

// if ($conn->query($sql) === TRUE) {
//   echo "Đã cập nhật bản ghi thành công";
// } else {
//   echo "Lỗi khi cập nhật bản ghi: " . $conn->error;
// }


// // sql to delete a record
// $sql = "DELETE FROM BangCuaToi WHERE id=3";

// if ($conn->multi_query($sql) === TRUE) {
//   echo "Các bản ghi mới đã xóa thành công";
// } else {
//   echo "Lỗi: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
  ?>
</body>
</html>