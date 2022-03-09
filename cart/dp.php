<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
// Create connection
    $conn = new mysqli($servername, $username, $password);
// Check connection
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

// Create database
    $sql = "CREATE DATABASE blog_samples";
        if ($conn->query($sql) === TRUE) {
    echo "Cơ sở dữ liệu được tạo thành công";
        } else {
    echo "Lỗi khi tạo cơ sở dữ liệu: " . $conn->error;
        }

    $conn->close();
    ?>

<?php
// $servername = "localhost:3306";
// $username = "root";
// $password = "";
// $dbname = "blog_samples";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Kết nối thất bại: " . mysqli_connect_error());
// }

// sql to create table
// $cart = "CREATE TABLE IF NOT EXISTS `tbl_cart` (
//     `id` int(11) NOT NULL AUTO_INCREMENT,
//     `product_id` int(11) NOT NULL,
//     `quantity` int(11) NOT NULL,
//     `member_id` int(11) NOT NULL,
//     PRIMARY KEY (`id`),
//     ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

// if (mysqli_query($conn, $cart)) {
//   echo "Table  được tạo thành công";
// } else {
//   echo "Kết nối thất bại: " . mysqli_error($conn);
// }

// $pro = "CREATE TABLE IF NOT EXISTS `tbl_product` (
//     `id` int(8) NOT NULL AUTO_INCREMENT,
//     `name` varchar(255) NOT NULL,
//     `code` varchar(255) NOT NULL,
//     `image` text NOT NULL,
//     `price` double(10,2) NOT NULL,
//     PRIMARY KEY (`id`),
//     UNIQUE KEY `code` (`code`)
//     ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

// if (mysqli_query($conn, $pro)) {
//   echo "Table  được tạo thành công";
// } else {
//   echo "Kết nối thất bại: " . mysqli_error($conn);
// }

// $sql1 = "INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`) VALUES
// (1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
// (2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
// (3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);";

// if ($conn->multi_query($sql1) === TRUE) {
//   echo "Các bản ghi mới đã được tạo thành công";
// } else {
//   echo "Lỗi: " . $sql1 . "<br>" . $conn->error;
// }
?>