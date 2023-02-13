<?php 
    include 'connect.php';
    $category_id = $_GET["categoryid"];
    $sql = "DELETE FROM category WHERE category_id=$category_id";

    if($connect->query($sql)){
        header('location:all_category.php');
        echo "<script type='text/javascript'>alert('Xoá thành công');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Không xoá được');</script>";
    }

?>