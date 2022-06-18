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
        <article class="mt-3 ms-4">
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
        </article>
        <div class="card mt-3 ms-3" style="width: 20rem;">
           <h4 class="mt-2 m-auto mb-4">Thông Tin Tài Khoản</h4>
            <div class="card-body">
                <img width="70" class="mb-3" style="border-radius:50% ;" src="../images/<?= $khach_hang['anh'] ?>" alt="">
                <h5 class="card-title mb-3 text-muted">Họ Tên : <?= $khach_hang['ho_ten'] ?></h5>
                <h6 class="card-subtitle mb-3 text-muted">User Name : <?= $khach_hang['user_name'] ?></h6>
                <h6 class="card-subtitle mb-3 text-muted">Email : <?= $khach_hang['email'] ?></h6>
                <h6 class="card-subtitle mb-3 text-muted">Vai Trò : Quản Trị</h6>
                <h6 class="card-subtitle mb-3 text-muted">Mật Khẩu : <?= $khach_hang['mat_khau'] ?></h6>
                <h6 class="card-subtitle mb-3 text-muted">Ngày Tạo Tài Khoản : <?= $khach_hang['ngay_dang_ky'] ?></h6>
                <button type="button" onclick="window.location='cap_nhap_thong_tin_tai_khoan.php?user=<?= $khach_hang['user_name'] ?>'" class="btn btn-outline-primary">Cập Nhập Thông Tin</button>
                <button type="button" onclick="window.location='logout.php'" class="btn btn-outline-danger">Đăng Xuất</button>
            </div>
        </div>
    </header>
</body>

</html>