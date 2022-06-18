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

    $ma_hang_hoa = $_GET['id2'];

    $sql_sl_binh_luan = "SELECT count(ma_binh_luan) as sl_binh_luan FROM binh_luan WHERE ma_hang_hoa_bl = $ma_hang_hoa";
    $stmt = $conn->prepare($sql_sl_binh_luan);
    $stmt->execute();
    
    $sl_binh_luan = $stmt->fetch(PDO::FETCH_ASSOC);

    

    $total_page = ceil($sl_binh_luan['sl_binh_luan']/$total_product_on_page) ;

    $sql = "SELECT * FROM binh_luan WHERE ma_hang_hoa_bl = $ma_hang_hoa LIMIT $limit_start,$total_product_on_page";

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
                        <th scope="col">Mã Bình Luận</th>
                        <th scope="col">Nội Dung</th>
                        <th scope="col">Mã Hàng Hóa</th>
                        <th scope="col">Mã Khách Hàng Bình Luận</th>
                        <th scope="col">Thời Gian</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($binh_luan as $binh_l): ?>
                    <tr>
                        <th scope="row"><?= $binh_l['ma_binh_luan'] ?></th>
                        <td><?= $binh_l['noi_dung'] ?></td>
                        <td><?= $binh_l['ma_hang_hoa_bl'] ?></td>
                        <td><?= $binh_l['ma_kh_bl'] ?></td>
                        <td><?= $binh_l['thoi_gian'] ?></td>
                        <td><a style="font-size : 23px ; display :flex ; text-decoration: none ;"
                                href="sua_binh_luan.php?id=<?= $binh_l['ma_binh_luan'] ?>&id2=<?= $binh_l['ma_hang_hoa_bl'] ?>"><i
                                    style="margin:auto ; text-decoration: none" class="fa fa-pencil"></i></a></td>
                        <td><a onclick="return confirm('Bạn có chắn chắn muôn xóa không')"
                                style="text-decoration: none ; font-size : 23px ; color:red ; display :flex ;"
                                href="xoa_binh_luan.php?id=<?= $binh_l['ma_binh_luan'] ?>&id2=<?= $binh_l['ma_hang_hoa_bl'] ?>"><i
                                    style="margin:auto ; text-decoration: none" class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
        </section>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <?php if($curent_page>1): ?>
                    <a class="page-link" href="index.php?curent_page=<?php echo $curent_page-1?>&id2=<?= $binh_l['ma_hang_hoa_bl'] ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    <?php else : ?>
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    <?php endif ?>
                </li>
                <?php for($i=1 ; $i <= $total_page ; $i++) : ?>
                <li
                    <?php if($i == $curent_page) : echo 'class="page-item active"' ; else : echo 'class="page-item"' ; endif  ?>>
                    <a class="page-link" href="index.php?curent_page=<?=$i?>&id2=<?= $binh_l['ma_hang_hoa_bl'] ?>"><?= $i ?></a>
                </li>
                <?php endfor ?>
                <li class="page-item">
                    <?php if($curent_page <$total_page): ?>
                    <a class="page-link" href="index.php?curent_page=<?php echo $curent_page+1 ?>&id2=<?= $binh_l['ma_hang_hoa_bl'] ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php else : ?>
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php endif ?>
                </li>
            </ul>
        </nav>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>