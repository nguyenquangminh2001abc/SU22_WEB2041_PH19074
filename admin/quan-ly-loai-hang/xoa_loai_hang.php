<?php
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     session_start();
     if(!isset($_SESSION['user_name']))
     {
         header("location: ../index.php");
         die ;
     };
    $sql_kh = "SELECT * FROM khach_hang Where user_name = '$_SESSION[user_name]'";
    $khach_hang = pdo_query_one($sql_kh);
    
     if(isset($_GET['id'])){
        $ma_hh = $_GET['id'];
        $sql = "DELETE FROM loai_hang WHERE ma_loai_hang = $ma_hh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:index.php?mesage=Bạn đã xóa thành công');
        die;
    }
?>