<?php
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     session_start();

     if(isset($_GET['key'])){
        $key = $_GET['key'];
        unset($_SESSION['gio_hang'][$key]);
        header('location:index.php?mesage=Bạn đã xóa thành công');
        die;
    }
?>