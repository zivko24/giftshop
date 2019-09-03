<?php
session_start();
include('db_config.php');
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$cart = $_SESSION['cart'];

$cart[$product_id]['quantity']=$quantity;

$_SESSION['cart']=$cart;
?>