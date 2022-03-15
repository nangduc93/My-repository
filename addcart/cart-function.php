<?php
function total_price($cart) {
    $total_price = 0;
    foreach ($cart as $key => $value) {
        $total_price += ($value['gia'] * $value['quantity']);
  }
  return $total_price;
}

  function total_item($cart) {
    $total_item = 0;
    foreach ($cart as $key => $value) {
        $total_item += $value['quantity'];
  }
  return $total_item;
}
?>