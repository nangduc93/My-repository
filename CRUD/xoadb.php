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
    
  if(isset($_GET['id'])){
    $id = $_GET['id'];

  // sql to delete a record
  $sql = "DELETE FROM SanPham WHERE ID = $id"; 
  
  if ($conn->query($sql) === TRUE) {
    header('Location: bangdb.php');
} else {
    echo "Lỗi delete: " . $conn->error;
}

}
  // Close connection
  $conn->close();
  ?>
</body>
</html>