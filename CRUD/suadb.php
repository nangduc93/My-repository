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

//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM SanPham WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $ten = $row['TenSanpham'];
        $anh = $row['AnhSanpham'];
        $gia = $row['GiaSanpham'];
?>

<form action="update.php" method="post">
<p>
                <label for="ID">ID:</label>
                <input type="id" name="ID" id="ID" value="<?php echo $id; ?>">
            </p>

<p>
                <label for="TenSanpham">Ten San Pham:</label>
                <input type="text" name="TenSanpham" id="TenSanpham" value="<?php echo $ten; ?>">
            </p>

<p>
                <label for="GiaSanpham">Gia San Pham:</label>
                <input type="number" name="GiaSanpham" id="GiaSanpham" value="<?php echo $gia; ?>">
            </p>

<p>
                <label for="AnhSanpham">Anh San Pham:</label>
                <input type="text" name="AnhSanpham" id="AnhSanpham" value="<?php echo $anh; ?>">
            </p>

<p>
                <img id="previewImg" src="" alt="Placeholder" width="20%" height="20%">
            </p>
  

            <input type="submit" value="Submit">
        </form>
        <?php
          }
        }
        ?>
</body>
</html>