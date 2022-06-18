<?php 
     require_once("../../dao/pdo.php");
     require_once("../../dao/thong_ke.php");
     $conn = pdo_get_connection();

     session_start();
     if(!isset($_SESSION['user_name']))
     {
         header("location: ../index.php");
         die ;
     };
    $sql_kh = "SELECT * FROM khach_hang Where user_name = '$_SESSION[user_name]'";
    $khach_hang = pdo_query_one($sql_kh);
    

    $sql = "SELECT MONTH(ngay_dang_ky) thang , YEAR(ngay_dang_ky) nam , COUNT(*) so_luong FROM khach_hang GROUP BY MONTH(ngay_dang_ky) ,YEAR(ngay_dang_ky)";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sl_khach_hang = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
        <section>
            <article>
                <h5>ADMIN THỐNG KÊ NGƯỜI DÙNG THEO THÁNG</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='bieu_do_nguoi_dung.php'" class="btn btn-primary btn-sm me-2">XEM BIỂU ĐỒ</button>
                <button type="button"  onclick=" window.location='thong_ke_nguoi_dung.php'" class="btn btn-success btn-sm me-2">Danh Sách Người Dùng Theo Tháng</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-dark btn-sm me-2">MENU THỐNG KÊ</button>
            </article>
        </section>
        <section>
            <table class="table table-bordered table-striped align-middle table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Tháng</th>
                        <th scope="col">Năm</th>
                        <th scope="col">Số Lượng Người Dùng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sl_khach_hang as $sl_khach_hang): ?>
                    <tr>
                        <th scope="row"><?= $sl_khach_hang['thang'] ?></th>
                        <td><?= $sl_khach_hang['nam'] ?></td>
                        <td><?= $sl_khach_hang['so_luong'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
        </section>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>