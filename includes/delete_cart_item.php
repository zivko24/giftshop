<?php
session_start();
include('includes/db_config.php');
$product_id = $_POST['product_id'];

$cart = $_SESSION['cart'];
unset($cart[$product_id]);

$_SESSION['cart']=$cart;
?>