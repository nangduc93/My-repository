<?php
session_start();
?>

<?php
$value = isset($_POST['item']) ? $_POST['item'] : 1; //to be displayed
if(isset($_POST['incqty'])){
   $value += 1;
}

if(isset($_POST['decqty'])){
   $value -= 1;                                            
}
?>

<!-- <form method='post' action='<?=$_SERVER['PHP_SELF']; ?>'>
   <input type='hidden' name='item'/> Why do you need this?
 <td>
       <button name='decqty'>-</button>
       <input type='text' size='1' name='item' value='<?= $value; ?>'/>
       <button name='incqty'>+</button>
   </td>
</form> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid"></div>
	<div class="txt-heading">Products</div>
  <form method="post" action="<?=$_SERVER['PHP_SELF']; ?>">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Cart</th>
            <th scope="col">Quantily</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>First</td>
            <td>10.00</td>
            <td><button type="submit" name="cart" class='add-to-cart btn btn-primary btnAddAction'>
            <i class='fa-solid fa-cart-shopping' style='font-size:20px'></i>
            </button>
            </td>
            <td>
              <button class='minus-item input-group-addon btn btn-primary' name='decqty'>-</button>
              <input type='text' size='1' name='item' value='<?= $value; ?>' />
              <button class='minus-item input-group-addon btn btn-primary' name='incqty'>+</button>
            </td>
            <td><img src="../cart/product-images/camera.jpg" style="width: 20%;"></td>
            <td><button class='btn btn-success btn-xs btn-edit'>
              <i class='fa-solid fa-pen-to-square' style='font-size:20px'></i></button>
              <button class='btn btn-danger btn-xs btn-delete'>
              <i class='fa-solid fa-trash-can' style='font-size:20px'></i></button></td>
          </tr>
          <tr>
            <td>Last</td>
            <td>80.00</td>
            <td><button type="submit" class='add-to-cart btn btn-primary btnAddAction'>
            <i class='fa-solid fa-cart-shopping' style='font-size:20px'></i>
            </button>
            </td>
            <td>
              <button class='minus-item input-group-addon btn btn-primary' name='decqty'>-</button>
              <input type='text' size='1' name='item' value='<?= $value; ?>' />
              <button class='minus-item input-group-addon btn btn-primary' name='incqty'>+</button>
            </td>
            <td><img src="../cart/product-images/external-hard-drive.jpg" style="width: 20%;"></td>
            <td><button class='btn btn-success btn-xs btn-edit'>
              <i class='fa-solid fa-pen-to-square' style='font-size:20px'></i></button>
              <button class='btn btn-danger btn-xs btn-delete'>
              <i class='fa-solid fa-trash-can' style='font-size:20px'></i></button></td>
          </tr>
          <tr>
            <td>Now</td>
            <td>50.00</td>
            <td><button type="submit" class='add-to-cart btn btn-primary btnAddAction'>
            <i class='fa-solid fa-cart-shopping' style='font-size:20px'></i>
            </button>
            </td>
            <td>
              <button class='minus-item input-group-addon btn btn-primary' name='decqty'>-</button>
              <input type='text' size='1' name='item' value='<?= $value; ?>' />
              <button class='minus-item input-group-addon btn btn-primary' name='incqty'>+</button>
            </td>
            <td><img src="../cart/product-images/external-hard-drive.jpg" style="width: 20%;"></td>
            <td><button class='btn btn-success btn-xs btn-edit'>
              <i class='fa-solid fa-pen-to-square' style='font-size:20px'></i></button>
              <button class='btn btn-danger btn-xs btn-delete'>
              <i class='fa-solid fa-trash-can' style='font-size:20px'></i></button></td>
          </tr>
        </tbody>
      </table>
		</form>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>