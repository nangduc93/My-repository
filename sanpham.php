<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="nhapdb.php" method="post">
<p>
                <label for="TenSanpham">Ten San Pham:</label>
                <input type="text" name="TenSanpham" id="TenSanpham">
            </p>

<p>
                <label for="GiaSanpham">Gia San Pham:</label>
                <input type="number" name="GiaSanpham" id="GiaSanpham">
            </p>

<p>
                <label for="AnhSanpham">Anh San Pham:</label>
                <input type="text" name="AnhSanpham" id="AnhSanpham">
            </p>

<p>
                <img id="previewImg" src="" alt="Placeholder" width="20%" height="20%">
            </p>
  

            <input type="submit" value="Submit">
        </form>

</body>
</html>