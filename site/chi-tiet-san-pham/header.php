<header class="header">
    <section class="contait_menu_cart_logo_header">
        <article class="logo_bar_header">
            <i id="bar_header" class="fa fa-bars"></i>
            <i id="close_bar" class="fa fa-close"></i>
            <?php  if(isset($_SESSION['user_name'])) :?>
             <button type="button" onclick="window.location='../../admin'" class="btn btn-outline-danger btn-sm">Trang quản trị</button>
            <?php endif ?>
        </article>
        <nav class="menu_heder">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="">BLOG</a></li>
                <li><a href="">GIỚI THIỆU</a></li>
                <li><a href="">LIÊN HỆ</a></li>
            </ul>
            <a href="../gio_hang" class="mt-3 me-5"><i style="font-size:29px;" class="fa fa-cart-arrow-down"></i></a>
        </nav>
        <article class=" cart_login_header">
        
            <?php if(isset($_SESSION['user_name_user'])) : ?>
            <section class="logo_user_header ">
                <div class="card-body mt-1">
                    <h6 class="card-subtitle mb-0 text-muted"><img width="25" class="me-2 mt-1"
                            style="border-radius:50% ;" src="../../images/<?= $khach_hang['anh'] ?>"
                            alt=""><?= $khach_hang['user_name'] ?></h6>
                    <button type="button" onclick="window.location='thong_tin_tai_khoan.php'"
                        class="btn btn-outline-primary btn-sm">Thông Tin Tài Khoản</button>
                    <button type="button" onclick="window.location='logout.php?id_hh=<?=$hang_hoa['ma_hang_hoa'] ?>'"
                        class="btn btn-outline-danger btn-sm">Đăng Xuất</button>
                </div>
            </section>
            <?php else : ?>
            <button onclick="window.location='../login/sign_in.php'"
                class="btn btn-outline-danger position-absolute start-7  " style="top:15px;"><i
                    class="fa fa-user-plus"></i>Tạo Tài Khoản</button>
            <button onclick="window.location='../login'" class="btn btn-outline-success position-absolute "
                style="top:15px; right: 35px ;"><i class="fa fa-user"></i>Đăng Nhập</button>
            <?php endif ?>
        </article>
    </section>
</header>
<div class="menu_bar_header">
    <ul>
        <li><a href="../index.php">HOME</a></li>
        <li><a href="">BLOG</a></li>
        <li><a href="">GIỚI THIỆU</a></li>
        <li><a href="">LIÊN HỆ</a></li>
    </ul>
</div>