<?php
session_start();
include 'connect.php';

$user_id = $_SESSION["idkh"];
$checkout_last_name = $_POST["checkout_last_name"];
$checkout_name = $_POST["checkout_name"];
$checkout_address = $_POST["checkout_address"];
$checkout_phone = $_POST["checkout_phone"];
$checkout_email = $_POST["checkout_email"];
$date = date('d-m-Y');
$check = $_POST["radio"];

$sql = "INSERT INTO `orderx`(`user_id`, `date`, `lastname`, `name`, `address`, `phone`, `email`) 
            VALUES ($user_id, '$date', '$checkout_last_name', '$checkout_name', '$checkout_address',$checkout_phone,'$checkout_email')";

$connect->query($sql);
$order_id = $connect->insert_id;

foreach ($_SESSION['cart'] as $key => $value) {
    $item[] = $key;
}
$str = implode(",", $item);
$sql2 = "select * from product where product_id in ($str)";
$query = $connect->query($sql2);
while ($row = mysqli_fetch_array($query)) {
    $product_id = $row['product_id'];
    $product_name = $row['product_name'];
    $product_price = $row['product_discount'];
    $qty = $_SESSION["cart"][$row['product_id']];

    $sql3 = "INSERT INTO order_detail(`order_id`, `product_id`, `product_name`, `product_price`, `qty`) 
        VALUES ($order_id , $product_id, '$product_name', $product_price, $qty)";
    $connect->query($sql3);
}
unset($_SESSION['cart']);
header("location:index.php");
