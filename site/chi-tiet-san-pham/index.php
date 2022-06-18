<?php
require_once '../../dao/pdo.php';
$conn = pdo_get_connection() ;
session_start();

if(isset($_GET['id_hh'])){
$hh = $_GET['id_hh'];
$sql = "SELECT * FROM hang_hoa Where ma_hang_hoa = '$hh' ";

$hang_hoa = pdo_query_one($sql) ;
 
$sql_binh_luan = "SELECT kh.user_name , kh.anh , bl.noi_dung , hh.ma_hang_hoa , bl.thoi_gian FROM (( khach_hang kh JOIN binh_luan bl ON bl.ma_kh_bl = kh.ma_khach_hang ) JOIN hang_hoa hh ON bl.ma_hang_hoa_bl = hh.ma_hang_hoa ) Where hh.ma_hang_hoa = '$hh'";

$binh_luan = pdo_query($sql_binh_luan);

if(isset($_POST['btn_s']))
{
         $user_name = $_SESSION['user_name_user'];
         $sql_user = "SELECT * FROM khach_hang Where user_name = '$user_name'";
         $khach_hang = pdo_query_one($sql_user) ;
    
      if(!empty($_POST['comment']))
      {
          $comment = $_POST['comment'];
          $sql = "INSERT INTO binh_luan (noi_dung,ma_hang_hoa_bl,ma_kh_bl) VALUES ('$comment','$hang_hoa[ma_hang_hoa]','$khach_hang[ma_khach_hang]')";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          header("location: index.php?id_hh=$hang_hoa[ma_hang_hoa]");
          
        
      }
      
}

$khach_hang;
if(isset($_SESSION['user_name_user']))
{
$user_n = $_SESSION['user_name_user'];
    $sql_kh = "SELECT * FROM khach_hang WHERE user_name ='$user_n' ";

$khach_hang = pdo_query_one($sql_kh) ;
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once "../head.php" ?>

</head>

<body>
    <?php require_once "header.php" ?>
    <main>
        <div class="containt_payment">
            <article class="mt-3">
                <?php if(isset($_GET['mesage'])) :?>
                <h5 class="text-center" style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <h2 class="title_payment mt-2 p-2 bg-secondary text-center text-light">THÔNG TIN SẢN PHẨM</h2>
            <div class="payment row pe-4">
                <div class="img_payment p-4 ps-4 col-5">
                    <img src="../../images/<?= $hang_hoa['anh'] ?>" class="img_pay_ment img-fluid m-auto d-block"
                        alt="">
                </div>
                <div class="info_product_payment col-7 border border-danger mt-4 mb-4 p-2">
                    <form action="" class="form_payment mt-3 ms-3">
                        <h3 class="title_form_payment"><?= $hang_hoa['ten_hang_hoa'] ?></h3>
                        <div>
                            <span>Giá Tiền : </span>
                            <span
                                class="price_product_form_payment text-danger"><?= $hang_hoa['gia_niem_yet'] ?>đ</span>
                        </div>
                        <p class="mt-2">Mô Tả Sản Phẩm : <?= $hang_hoa['mo_ta'] ?></p>
                    </form>
                    <article class="commit_form mt-4 ms-3">
                        <h3 class='text-danger'>CAM KẾT SẢN PHẨM</h3>
                        <div>
                            <p>Tư vấn màu sắc mẫu áo phù hợp với thị trường</p>
                        </div>
                        <div>

                            <p>- Giao hàng tận nơi trên toàn quốc</p>
                        </div>
                        <div>
                            <p>- Giảm giá trực tiếp theo số lượng đơn hàng, cụ thể:</p>
                        </div>
                        <div>
                            <p> + Giảm ngay 10% trên tổng hóa đơn nếu mua từ 30 sản phẩm trở lên.</p>
                        </div>
                        <div>
                            <p> + Giảm ngay 5% trên tổng hóa đơn nếu mua từ 10 sản phẩm trở lên.</p>
                        </div>
                        <div>
                            <p>+ Từ 100 sản phẩm trở lên: Giá cả thương lượng tùy theo hợp đồng.</p>
                        </div>
                        <button onclick="window.location='../gio_hang?id=<?= $hang_hoa['ma_hang_hoa'] ?>'"
                      class="btn btn-outline-danger" style="top:15px;">THêm Vào Giỏ Hàng</button>
                    </article>
                </div>
            </div>
            <div class="row ">
                <div class="mb-3 col-6 pe-4 ps-4 ">
                    <label for="" class="mb-4">* Danh Sách Comment *</label>
                    <hr class="">
                    <?php foreach($binh_luan as $binh_l): ?>
                     <div class="row pe-2 ps-2  mt-2">
                         <aside class="col-1">
                             <img src="../../images/<?= $binh_l['anh'] ?>" width="50" class="mt-1" style="border-radius:50%" alt="">
                         </aside>
                         <section class="col-4 ms-2">
                             <h5 class="mb-3"><?= $binh_l['user_name'] ?></h5>
                             <p class="mb-3"><?= $binh_l['noi_dung'] ?></p>
                             <span class="mb-3" style="color:grey ;"> <?= $binh_l['thoi_gian'] ?></span>
                         </section>
                         <hr class="mt-3">
                     </div>
                     <?php endforeach ?>
                </div>
            </div>
            <?php if(isset($_SESSION['user_name_user'])) : ?>
            <div class="row ">
                <form action="" method="post">
                <div class="mb-3 col-6 pe-3 ps-2 ">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>

                <div class="col-12 ps-2">
                    <button type="submit" name="btn_s" class="btn btn-primary mb-3">Gửi</button>
                </div>
                </form>
            </div>
            <?php else : ?> 
                <div class="row ps-2 ">
               
                <div class="mb-3 col-6 ">
                    <label for="exampleFormControlTextarea1" class="form-label">* Đăng Nhập Để Comment *</label>
                </div>
            </div>
            <?php endif ?> 
        </div>
    </main>
    <?php require_once "footer.php" ?>
</body>

</html>