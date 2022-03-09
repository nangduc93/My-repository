<?php
   // session_start();

   // if( isset( $_SESSION['counter'] ) )
   // {
   //    $_SESSION['counter'] += 1;
   // }
   // else
   // {
   //    $_SESSION['counter'] = 1;
   // }
   // $msg = "Bạn đã truy cập trang này ".  $_SESSION['counter'];
   // $msg .= " lần trong session này.";
?>
<!-- <html>

   <head>
      <title>Thiết lập session trong PHP</title>
   </head>

   <body> -->
      <?php
      // echo ( $msg );
      ?>
   <!-- </body>

</html> -->

<?php
// $value = isset($_POST['item']) ? $_POST['item'] : 1; //to be displayed
// if(isset($_POST['incqty'])){
//    $value += 1;
// }

// if(isset($_POST['decqty'])){
//    $value -= 1;                                            
// }
?>

<!-- <form method='post' action='<?=$_SERVER['PHP_SELF']; ?>'> -->
   <!--<input type='hidden' name='item'/> Why do you need this?-->
   <!-- <td>
       <button name='incqty'>+</button>
       <input type='text' size='1' name='item' value='<?= $value; ?>'/>
       <button name='decqty'>-</button>
   </td>
</form> -->

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../cart/css/demo.css" type="text/css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="demo.php?action=empty">Empty Cart</a>
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
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" style="width: 15%;"/><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="demo.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
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
  <?php
	      $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	      if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){
	      ?>
  <form method="post" action="demo.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
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
            <td><?php echo $product_array[$key]["name"]; ?></td>
            <td><?php echo "$".$product_array[$key]["price"]; ?></td>
            <td><button type="submit" class='add-to-cart btn btn-primary btnAddAction'>
            <i class='fa-solid fa-cart-shopping' style='font-size:20px'></i>
            </button>
            </td>
            <td>
              <button class='minus-item input-group-addon btn btn-primary' name='decqty'>-</button>
              <input type="text" class="product-quantity" name="quantity" value="1" size="1" />
              <button class='minus-item input-group-addon btn btn-primary' name='incqty'>+</button>
            </td>
            <td><img src="<?php echo $product_array[$key]["image"]; ?>" style="width: 20%;"></td>
            <td><button class='btn btn-success btn-xs btn-edit'>
              <i class='fa-solid fa-pen-to-square' style='font-size:20px'></i></button>
              <button class='btn btn-danger btn-xs btn-delete'>
              <i class='fa-solid fa-trash-can' style='font-size:20px'></i></button></td>
          </tr>
        </tbody>
      </table>
		</form>
    <?php
		          }
	          }
	        ?>
<!-- <form method='post' action='<?= $_SERVER['PHP_SELF']; ?>'>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
      <button class='minus-item input-group-addon btn btn-primary' name='decqty'>-</button>
      <input type="text" class="product-quantity" name="item" value='<?= $value; ?>'/>
      <button class='minus-item input-group-addon btn btn-primary' name='incqty'>+</button>
      <input type="submit" value="Add to Cart" class="btnAddAction" /></td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
</form> -->
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>