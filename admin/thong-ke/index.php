<?php 
     
     require_once("../../dao/pdo.php");
     $conn = pdo_get_connection();
     session_start();
     if(!isset($_SESSION['user_name']))
     {
         header("location: ../index.php");
         die ;
     };
    $sql = "SELECT * FROM khach_hang Where user_name = '$_SESSION[user_name]'";
    $khach_hang = pdo_query_one($sql);
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