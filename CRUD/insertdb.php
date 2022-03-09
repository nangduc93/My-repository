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
    
  // Taking all 3 values from the form data(input)
  $TenSanpham = mysqli_real_escape_string($conn, $_REQUEST['TenSanpham']);
  $GiaSanpham = mysqli_real_escape_string($conn, $_REQUEST['GiaSanpham']);
  $AnhSanpham = mysqli_real_escape_string($conn, $_REQUEST['AnhSanpham']);

    // $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    // $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    // $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    
  // Performing insert query execution
  // here our table name is college
  $sql = "INSERT INTO SanPham (TenSanpham, AnhSanpham, GiaSanpham) VALUES ('$TenSanpham', 
      '$AnhSanpham', '$GiaSanpham')";
    
  if(mysqli_query($conn, $sql)){
      echo "<h3>data stored in a database successfully." 
          . " Please browse your localhost php my admin" 
          . " to view the updated data</h3>"; 

      echo nl2br("\n$TenSanpham\n $GiaSanpham\n "
          . "$AnhSanpham");
  } else{
      echo "ERROR: Hush! Sorry $sql. " 
          . mysqli_error($conn);
  }

  // if ($conn->multi_query($sql) === TRUE) {
//   echo "Các bản ghi mới đã được tạo thành công";
// } else {
//   echo "Lỗi: " . $sql . "<br>" . $conn->error;
// }
    
  // Close connection
  $conn->close();
  ?>
  
  <?php
  // include_once 'db.php';

  // $firstname = 'Hello';
  //    $lastname = 'Test';
  //    $mobile = '9874561230';
 
  //    $sql = "INSERT INTO users (firstname,lastname,mobile)
  //    VALUES ('$name','$email','$mobile')";
 
  //    if (mysqli_query($conn, $sql)) {
  //       echo "New record has been added successfully !";
  //    } else {
  //       echo "Error: " . $sql . ":-" . mysqli_error($conn);
  //    }
  ?>
</body>
</html>