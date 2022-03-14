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
    
  if(isset($_GET['id'])){
    $id = $_GET['id'];

  // sql to delete a record
  $sql = "DELETE FROM products WHERE ID = $id"; 
  
  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Lỗi delete: " . $conn->error;
}

}
  // Close connection
  $conn->close();
  ?>