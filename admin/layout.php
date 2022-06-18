<?php 
    require_once("../dao/pdo.php");
    require_once("../global.php");
    $conn = pdo_get_connection();
    session_start();
    $user_n = $_SESSION['user_name'];
    $sql = "SELECT * FROM khach_hang WHERE user_name ='$user_n' ";

    $khach_hang = pdo_query_one($sql) ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./header.php" ?>

</head>

<body>
    <header>
        <?php require_once "user.php" ?>
        <!-- infomation user -->
        <nav class="row">
          <?php require_once "menu.php" ?>
        </nav>
        <!-- menu -->
    </header>
</body>

</html>