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
    $khach_hang_s = pdo_query_one($sql_kh);

    $total_product_on_page = 6;
    if(isset($_GET['curent_page'])):
    $curent_page = $_GET['curent_page'];
    else : $curent_page = 1 ; endif ;

    $limit_start = ($total_product_on_page - 1)*($curent_page-1) ;

    $sql_sl_binh_luan = "SELECT count(ma_binh_luan) as sl_binh_luan FROM binh_luan";
    $stmt = $conn->prepare($sql_sl_binh_luan);
    $stmt->execute();
    
    $sl_binh_luan = $stmt->fetch(PDO::FETCH_ASSOC);

    

    $total_page = ceil($sl_binh_luan['sl_binh_luan']/$total_product_on_page) ;

    $sql = "SELECT * FROM binh_luan LIMIT $limit_start,$total_product_on_page";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $binh_luan = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"  ?>
</head>

<body>
    <header>
        <?php require_once "./user.php" ?>
        <?php require_once "./menu.php" ?>
    </header>
    <main class="main">
        <?php require_once "./home.php" ?>
    </main>
    <footer>
       
    </footer>
</body>

</html>