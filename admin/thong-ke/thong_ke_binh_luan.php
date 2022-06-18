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

    $sql = "SELECT hh.ma_hang_hoa , hh.ten_hang_hoa , COUNT(*) so_luong , MIN(bl.thoi_gian) cu_nhat , MAX(bl.thoi_gian) moi_nhat FROM binh_luan bl JOIN hang_hoa hh ON bl.ma_hang_hoa_bl = hh.ma_hang_hoa GROUP BY hh.ma_hang_hoa , hh.ten_hang_hoa HAVING so_luong > 0";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $binh_luan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


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
                <h5>ADMIN THỐNG KÊ BÌNH LUẬN THEO HÀNG HÓA</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='bieu_do_binh_luan.php'" class="btn btn-primary btn-sm me-2">XEM BIỂU ĐỒ</button>
                <button type="button"  onclick=" window.location='thong_ke_binh_luan.php'" class="btn btn-success btn-sm me-2">Danh Sách Bình Luận Theo Hàng Hóa</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-dark btn-sm me-2">MENU THỐNG KÊ</button>
            </article>
        </section>
        <section>
            <table class="table table-bordered table-striped align-middle table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Mã Hàng Hóa</th>
                        <th scope="col">Tên Hàng Hóa</th>
                        <th scope="col">Số Lượng Bình Luận</th>
                        <th scope="col">Cũ Nhất</th>
                        <th scope="col">Mới Nhất</th>
                        <th scope="col">Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($binh_luan as $binh_l): ?>
                    <tr>
                        <th scope="row"><?= $binh_l['ma_hang_hoa'] ?></th>
                        <td><?= $binh_l['ten_hang_hoa'] ?></td>
                        <td><?= $binh_l['so_luong'] ?></td>
                        <td><?= $binh_l['cu_nhat'] ?></td>
                        <td><?= $binh_l['moi_nhat'] ?></td>
                        <td><a style="font-size : 23px ; display :flex ; text-decoration: none ;"
                        href="chi_tiet_binh_luan.php?id2=<?= $binh_l['ma_hang_hoa'] ?>"><i
                            style="margin:auto ; text-decoration: none" class="fa fa-pencil"></i></a></td>
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