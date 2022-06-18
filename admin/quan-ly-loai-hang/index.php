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
    
    $total_product_on_page = 6;
    if(isset($_GET['curent_page'])):
    $curent_page = $_GET['curent_page'];
    else : $curent_page = 1 ; endif ;

    $limit_start = ($total_product_on_page - 1)*($curent_page-1) ;

    $sql_sl_loai_hang = "SELECT count(ma_loai_hang) as sl_loai_hang FROM loai_hang";
    $stmt = $conn->prepare($sql_sl_loai_hang);
    $stmt->execute();
    
    $sl_loai_hang = $stmt->fetch(PDO::FETCH_ASSOC);

    

    $total_page = ceil($sl_loai_hang['sl_loai_hang']/$total_product_on_page) ;

    $sql = "SELECT * FROM loai_hang LIMIT $limit_start,$total_product_on_page";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $loai_hang = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./header.php"  ?>
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