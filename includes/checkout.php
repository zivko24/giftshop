<?php
include('user_session.php');

$cart = $_SESSION['cart'];
$order_price = 0;

$step1 = false;
$step2 = false;
$step3 = false;
$step4 = false;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];

    if ($cart) {

        $ORDER_SQL = "INSERT INTO `orders` (`id`, `user_id`, `order_status`, `order_date`) 
    VALUES (NULL, '$user_id', 'ordered', now());";
        $SELECT_SQL = "SELECT LAST_INSERT_ID() as inserted_id";

        $result = mysqli_query($connection, $ORDER_SQL);
        if ($result) {
            $step1 = true;
        }
        $result = mysqli_query($connection, $SELECT_SQL);
        if ($result) {
            $step2 = true;
        }

        $response = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $order_id = $response['inserted_id'];

        foreach ($cart as $index => $cart_item) {
            $item_name = $cart_item['item_name'];
            $item_price = (float) $cart_item['item_price'];
            $quantity = (int) $cart_item['quantity'];

            $ORDER_ITEM_SQL = "INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`) 
                    VALUES (NULL, '$order_id', '$index', '$quantity')
        ";

            $result = mysqli_query($connection, $ORDER_ITEM_SQL);
            if ($result) {
                $step3 = true;
            }
            $order_price = $order_price + $item_price * $quantity;
        }

        $UPDATE_SQL = "UPDATE `orders` SET `price` = '$order_price' WHERE `orders`.`id` = '$order_id';";

        $result = mysqli_query($connection, $UPDATE_SQL);
        if ($result) {
            $step4 = true;
        }

        if ($step1 && $step2 && $step3 && $step4) {
            $_SESSION['cart'] = [];
            echo "success";
        }
    }
} else {
    echo "user_error";
}
