<?php
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     if(isset($_GET['id'])){
        $ma_hh = $_GET['id'];
        $sql = "DELETE FROM hang_hoa WHERE ma_hang_hoa = $ma_hh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:index.php?mesage=Bạn đã xóa thành công');
        die;
    }
?>