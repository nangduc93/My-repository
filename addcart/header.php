<?php
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

  session_start();
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
<nav class="navbar navbar-expand navbar-light bg-light">
<div class="container-fluid">
<a href="" class="navbar-brand">Title</a>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">San pham</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="form-insert.php">Them san pham</a>
        </li>
    </ul>
</div>
</nav>
<body>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
