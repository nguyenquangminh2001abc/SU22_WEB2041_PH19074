<?php
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     if(isset($_GET['id'])){
        $ma_hh = $_GET['id'];
        $id2 = $_GET['id2'];
        $sql = "DELETE FROM binh_luan WHERE ma_binh_luan = $ma_hh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("location:chi_tiet_binh_luan.php?mesage=Bạn đã xóa thành công&id2=$id2");
        die;
    }
?>