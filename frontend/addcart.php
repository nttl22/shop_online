<?php 
session_start();
$inqty = $_POST["qty"];
$id = $_POST["id"];
if(isset($_SESSION['cart'][$id]))
{
    if($inqty == 1){
        $qty = $_SESSION['cart'][$id] + 1;
    }else{
        $qty = $_SESSION['cart'][$id] + $inqty;
    }
}
else
{
$qty= $inqty;
}
$_SESSION['cart'][$id]=$qty;
echo '('.count($_SESSION["cart"]).')';
// echo 'Đã thêm vào giỏ hàng';
