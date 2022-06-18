<?php
     require_once("../../dao/pdo.php");
     session_start();
     if(!isset($_SESSION['user_name']))
     {
         header("location: ../index.php");
         die ;
     };
    $sql_kh = "SELECT * FROM khach_hang Where user_name = '$_SESSION[user_name]'";
    $khach_hang_s = pdo_query_one($sql_kh);
    
     $conn = pdo_get_connection();
     if(isset($_GET['id'])){
        $ma_hh = $_GET['id'];
        $sql = "DELETE FROM binh_luan WHERE ma_binh_luan = $ma_hh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:index.php?mesage=Bạn đã xóa thành công');
        die;
    }
?>