<?php 
    include 'connect.php';
    $id = $_GET["galleryid"];
    $sql = "SELECT * FROM gallery WHERE gallery_id=$id";
    $kq = $connect->query($sql);
    $row = $kq->fetch_assoc();
    $sql = "DELETE FROM `gallery` WHERE gallery_id=$id";
    if($connect->query($sql)){
        unlink('images/gallery/'.$row['img'].'');
        echo '<script language="javascript">alert("Đã xoá !!!");</script>';
        header('location:gallery.php?productid='.$row['product_id'].'');
    }
