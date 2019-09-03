<?php

include('user_session.php');
$cart = $_SESSION['cart'];

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$product_sql = "select * from product where id='$product_id'";
$result = mysqli_query($connection, $product_sql);
$product = mysqli_fetch_array($result, MYSQLI_ASSOC);
$is_product_already_in_cart = false;
if (empty($cart)) {
    $cart[$product_id] = [
        'item_name' => $product['name'],
        'item_price' => $product['price'],
        'quantity' => (int) $quantity
    ];
} else {
    if (count($cart[$product_id]) > 0){
        $is_product_already_in_cart = true;
    }

    if ($is_product_already_in_cart) {
        $old_quantity = $cart[$product_id]['quantity'];
        $cart[$product_id] = [
            'quantity' => $old_quantity+$quantity,
            'item_name' => $product['name'],
            'item_price' => $product['price'],
        ];
    } else {
        $cart[$product_id] = [
            'item_name' => $product['name'],
            'item_price' => $product['price'],
            'quantity' => (int)  $quantity
        ];
    }
}

$_SESSION['cart']=$cart;

?>