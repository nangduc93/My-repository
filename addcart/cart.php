<?php
// include "connect.php";

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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    }

$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
// var_dump($_GET);
// echo $action;
// die;

    $sql = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($sql);

$row = $result -> fetch_assoc();

$item = [
    'id'=>$row['id'],
    'ten'=>$row['ten'],
    'anh'=>$row['anh'],
    'gia'=>$row['gia'],
    'quantity'=>$quantity
];

if($action == 'add') {
if(isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += $quantity;
    // $quantity
} else {
    $_SESSION['cart'][$id] = $item;
}
}

if($action == 'update') {
    $_SESSION['cart'][$id]['quantity'] = $quantity;
}

if($action == 'delete') {
    unset($_SESSION['cart'][$id]);
}

header('Location: addcart.php');
// echo "<pre>";
// print_r($_SESSION['cart'][$id]);
?>