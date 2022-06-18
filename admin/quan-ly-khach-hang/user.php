<section class="logo_user_header ">
    <div class="logo_header">
        <img src="../../content/logo_X_shop.png" alt="">
    </div>
    <div class="card position-absolute end-0 " style="width: 15.1rem; top:10px; right:5px;">
        <div class="card-body p-1 ">

            <h6 class="card-subtitle mb-1 text-muted"><img width="30" class="me-3 mt-1" style="border-radius:50% ;"
                    src="../../images/<?= $khach_hang_s['anh'] ?>" alt=""><?= $khach_hang_s['user_name'] ?></h6>
            <button type="button" onclick="window.location='../thong_tin_tai_khoan.php'"
                class="btn btn-outline-primary btn-sm">Thông Tin Tài Khoản</button>
            <button type="button" onclick="window.location='../logout.php'" class="btn btn-outline-danger btn-sm">Đăng
                Xuất</button>
        </div>
    </div>
    </div>
</section>