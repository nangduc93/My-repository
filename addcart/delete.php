<?php
  include_once 'connect.php';

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

  ?>