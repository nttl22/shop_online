<?php
session_start();
include 'connect.php';

if (isset($_SESSION["idkh"])) {

    $id = $_POST["id"];
    $idkh = $_SESSION["idkh"];
    $nd = $_POST["noidung"];
    $time = $_POST["time"];
    $name = $_SESSION["name"];

    $sql = "INSERT INTO comment(`user_id`, `product_id`, `cmt_content`, `cmt_time`) VALUES($idkh, $id, '$nd', '$time')";
    $connect->query($sql);
    echo '<div class="cmt-head">';
    echo '  <span class="cmt-img"> ' . $name[0] . ' </span>';
    echo '<div class="cmt-name">';
    echo '  <div>' . $name . '</div>';
    echo '  <div class="cmt-time"><small>Nhận xét vào ' . $time . '</small></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="cmt-body">' . $nd . '</div>';
    echo '<hr>';
    echo '<script type="text/javascript"> document.getElementById("nd").value = "";</script>';
} else {
    echo "<script type='text/javascript'>alert('Vui lòng đăng nhập');</script>";
}
