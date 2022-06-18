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


    $sql = "SELECT lo.ma_loai_hang , lo.ten_loai_hang , COUNT(*) so_luong , MIN(hh.gia_niem_yet) gia_min , MAX(hh.gia_niem_yet) gia_max , AVG(hh.gia_niem_yet) gia_avg  FROM loai_hang lo JOIN hang_hoa hh ON lo.ma_loai_hang = hh.ma_loai_hang GROUP BY lo.ma_loai_hang , lo.ten_loai_hang";

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
        <section>
            <article>
                <h5>ADMIN THỐNG KÊ HÀNG HÓA THEO LOẠI</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='bieu_do_hang_hoa.php'" class="btn btn-primary btn-sm me-2">XEM BIỂU ĐỒ</button>
                <button type="button"  onclick=" window.location='thong_ke_hang_hoa.php'" class="btn btn-success btn-sm me-2">Danh Sách Thống Kê Hàng Hóa Theo Loại</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-dark btn-sm me-2">MENU THỐNG KÊ</button>
            </article>
        </section>
        <section>
            <table class="table table-bordered table-striped align-middle table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Mã Loại Hàng</th>
                        <th scope="col">Tên Loại Hàng</th>
                        <th scope="col">Số Lượng Hàng Hóa</th>
                        <th scope="col">Giá Nhỏ Nhất</th>
                        <th scope="col">Giá Cao Nhất</th>
                        <th scope="col">Giá Trung Bình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($loai_hang as $loai_h): ?>
                    <tr>
                        <th scope="row"><?= $loai_h['ma_loai_hang'] ?></th>
                        <td><?= $loai_h['ten_loai_hang'] ?></td>
                        <td><?= $loai_h['so_luong'] ?></td>
                        <td><?= $loai_h['gia_min'] ?></td>
                        <td><?= $loai_h['gia_max'] ?></td>
                        <td><?=$loai_h['gia_avg'] ?></td>
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