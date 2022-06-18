<section>
    <article>
        <h5>ADMIN THỐNG KÊ</h5>
    </article>
    <article class="mt-3">
        <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
        <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
        <?php endif ?>
    </article>
    <article>
        <button type="button" onclick=" window.location='thong_ke_hang_hoa.php'" class="btn btn-primary btn-sm me-2">Thống Kê Hàng Hóa Từng Loại</button>
        <button type="button" onclick=" window.location='thong_ke_binh_luan.php'" class="btn btn-dark btn-sm me-2">Thống Kê Bình Luận</button>
        <button type="button" onclick=" window.location='thong_ke_nguoi_dung.php'" class="btn btn-danger btn-sm me-2">Thống Kê Người Dùng</button>
    </article>
</section>
