<?php
// include_once 'connect.php';

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "addcart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $ten = $_POST['ten'];
    $ma = $_POST['ma'];
    if(isset($_FILES['anh'])) {
        $anh = $_FILES['anh']['name'];
        $anh_tmp = $_FILES['anh']['tmp_name'];
        $anh_path = 'images/'.basename( $anh);
        move_uploaded_file( $anh_tmp, $anh_path);
    };
    $gia = $_POST['gia'];

    $sql = "UPDATE products SET ten = '$ten', ma = '$ma', anh = '$anh_path', gia = '$gia' WHERE id = '$id'";
    $query = $conn->query($sql);
    if($query === TRUE){
      header("location: index.php");
    } else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
}
$conn->close();
?>