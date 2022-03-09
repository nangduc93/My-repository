<?php
//  $servername = "localhost:3306";
//  $username = "root";
//  $password = "";
//  $dbname = "DBtest";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT TenSanpham, GiaSanpham, AnhSanpham FROM SanPham";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "<tr><td>".$row["TenSanpham"]."</td><td>".$row["GiaSanpham"]."</td><td>".$row["AnhSanpham"]."</td></tr>";
//   }
// } else {
//   echo "0 results";
// }
// $conn->close();
?>

<?php 
//  $servername = "localhost:3306";
//  $username = "root";
//  $password = "";
//  $dbname = "DBtest";
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT TenSanpham, GiaSanpham, AnhSanpham FROM SanPham";
// $result = $conn->query($sql);

// echo '<table border="0" cellspacing="2" cellpadding="2"> 
//       <tr> 
//           <td> <font face="Arial">Value1</font> </td> 
//           <td> <font face="Arial">Value2</font> </td> 
//           <td> <font face="Arial">Value3</font> </td> 
//       </tr>';

// if ($result = $mysqli->query($query)) {
//     while ($row = $result->fetch_assoc()) {
//         $field1name = $row["col1"];
//         $field2name = $row["col2"];
//         $field3name = $row["col3"];

//         echo '<tr> 
//                   <td>'.$field1name.'</td> 
//                   <td>'.$field2name.'</td> 
//                   <td>'.$field3name.'</td> 
//               </tr>';
//     }
//     $result->free();
// } 
?>

<?php
// $servername = "localhost:3306";
// $username = "username";
// $password = "password";
// $dbname = "DBtest";
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT TenSanpham, GiaSanpham, AnhSanpham FROM SanPham";
// $result = $conn->query($sql);

// // $result = mysqli_query($con,"SELECT * FROM Persons");

// echo "<table border='1'>
// <tr>
// <th>TenSanpham</th>
// <th>GiaSanpham</th>
// <th>AnhSanpham</th>
// </tr>";

// while($row = mysqli_fetch_array($result))
// {
// echo "<tr>";
// echo "<td>" . $row['TenSanpham'] . "</td>";
// echo "<td>" . $row['GiaSanpham'] . "</td>";
// echo "<td>" . $row['AnhSanpham'] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

// mysqli_close($con);
?>

<?php foreach ($result as $row) {?>
            <td><?php echo $row["TenSanpham"]; ?></td>
            <td><?php echo $row["AnhSanpham"]; ?></td>
            <td><?php echo $row["GiaSanpham"]; ?></td>
            <td><button>Update</button>
            <button>Delete</button></td>
<?php
  }
?>

<?php
//Code xử lý, insert dữ liệu vào table
$sql     = "SELECT * FROM tin_xahoi";
$ket_qua = $connect->query($sql);

//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if (!$ket_qua) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
    exit();
}

//Dùng vòng lặp while truy xuất các phần tử trong table
while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
    echo "<p>ID: " . $row['id'] . "</p>";
    echo "<p>Tiêu đề: " . $row['title'] . "</p>";
    echo "<p>Ngày: " . $row['date'] . "</p>";
    echo "<p>Mô tả: " . $row['description'] . "</p>";
    echo "<p>Nội dung: " . $row['content'] . "</p>";

    //Truyền tham số id tới trang update.php
    echo "<p><a href='update.php?id=" . $row['id'] . "'>Update</a></p>";
    echo "<hr>";
}
?>