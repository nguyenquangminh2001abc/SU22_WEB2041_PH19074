<?php
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     if(isset($_GET['id'])){
        $ma_hh = $_GET['id'];
        $sql = "DELETE FROM khach_hang WHERE ma_khach_hang = $ma_hh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:index.php?mesage=Bạn đã xóa thành công');
        die;
    }
?>