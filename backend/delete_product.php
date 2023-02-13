<?php
$id = $_GET["productid"];
include 'connect.php';
$sql = "SELECT * FROM product WHERE product_id=$id";
$kq = $connect->query($sql);
$row = $kq->fetch_assoc();
$sql = "DELETE FROM product WHERE product_id=$id";
if ($connect->query($sql)) {
    unlink('images/' . $row['product_img'] . '');
    header('location:all_product.php');
} else {
    echo "<script type='text/javascript'>alert('Không xoá được');</script>";
}
