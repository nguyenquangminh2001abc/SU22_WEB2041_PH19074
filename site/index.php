<?php
require_once '../dao/pdo.php';
$conn = pdo_get_connection() ;
session_start();


$total_product_on_page = 9;
if(isset($_GET['curent_page'])):
$curent_page = $_GET['curent_page'];
else : $curent_page = 1 ; endif ;

$limit_start = ($total_product_on_page - 1)*($curent_page-1) ;
$sql_sl_hang_hoa = "SELECT count(ma_hang_hoa) as sl_hang_hoa FROM hang_hoa";
$sl_hang_hoa = pdo_query_one($sql_sl_hang_hoa);
$ma_loai ;

if(isset($_GET['ma_loai_hang']))
{
    $ma_loai ="WHERE ma_loai_hang = ". $_GET['ma_loai_hang'] ;
}
else
{
    $ma_loai = "";
};
$sap_xep = "" ;
$tim_kiem = "" ;
if(isset($_POST['bt_search']))
{
    if($_POST['sort']== 1)
    {
        $_SESSION['sap_xep'] = " ORDER BY gia_niem_yet";
        $sap_xep = $_SESSION['sap_xep'] ;
    }
    else if($_POST['sort']== 2)
    {
        $_SESSION['sap_xep'] = " ORDER BY gia_niem_yet DESC";
        $sap_xep = $_SESSION['sap_xep'] ;
    }
    else if($_POST['sort']== 3)
    {
        $_SESSION['sap_xep'] = " ORDER BY ngay_nhap";
        $sap_xep = $_SESSION['sap_xep'] ;
    };
    if(isset($_GET['sort'])){
        $sap_xep = $_GET['sort'];
    };

    if($_POST['tim']=="")
    {
        $tim_kiem = "";
    }
    else
    {
        $tim_kiem = "WHERE ten_hang_hoa LIKE '%$_POST[tim]%'";
        $ma_loai = "";
    };
}
else
{
    $sap_xep = "";
};
$total_page = ceil($sl_hang_hoa['sl_hang_hoa']/$total_product_on_page) ;
$sql = "SELECT * FROM hang_hoa $ma_loai $tim_kiem $sap_xep  LIMIT $limit_start,$total_product_on_page";
$hang_hoa = pdo_query($sql) ;
$sql_loai_hang = "SELECT * FROM loai_hang";
$loai_hang = pdo_query($sql_loai_hang) ;

$khach_hang;
if(isset($_SESSION['user_name_user']))
{
$user_n = $_SESSION['user_name_user'];
    $sql_kh = "SELECT * FROM khach_hang WHERE user_name ='$user_n' ";

$khach_hang = pdo_query_one($sql_kh) ;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "head.php" ?>
</head>

<body>
    <?php require_once "header.php" ?>
    <div class="menu_bar_header">
        <ul>
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./blog.html">BLOG</a></li>
            <li><a href="./san_pham_cua_shop.html">SẢN PHẨM CỦA SHOP</a></li>
            <li><a href="">ĐẶT HÀNG</a></li>
            <li><a href="">THANH TOÁN</a></li>
        </ul>
    </div>
    <main class="main">
        <section>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/banner_ao.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/banner_ao_2.png" class="d-block w-100" alt="...">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="containt_product">
            <form action="index.php" method="post" class="wrap_sort_product row">
                <section class="sort_product col-lg-3">
                    <span>Sắp Xếp:</span>
                    <div class="dropdown">
                        <select name="sort" class="option_sort">
                            <option value=""></option>
                            <option value="1">Giá Thấp Đến Cao</option>
                            <option value="2">Giá Cao Đến Thấp</option>
                            <option value="3">Sản Phẩm Mới Nhất</option>
                        </select>
                    </div>
                    <i id="search_sort_product" class="fa fa-search"></i>
                    <i id="closer_search_sort" class="fa fa-close"></i>
                </section>
                <section class="price_search_freeship col-lg-7">
                    <article class="wrap_input_sort">
                        <span>Từ Khóa</span>
                        <input type="text" name="tim" placeholder="Nhập từ khóa" class="">
                    </article>
                </section>
                <section class="submit_sort col-md-12 col-lg-2 col-xs-12">
                    <input type="submit" name="bt_search" value="tìm kiếm" class="blt_submit_sort btn btn-primary">
                </section>

            </form>
            <section class="wrap_price_search_freeship_show">

            </section>
            <section class="fill_product_show row">
                <div class="fill_product ">
                    <span>Lọc Sản Phẩm :</span>
                    <i id="filter_product" class="fa fa-filter"></i>
                    <i id="closer_fil" class="fa fa-close"></i>
                </div>
                <aside class="aside_ribon aside_ribon1 col-lg-3">
                    <div class="accordion" id="accordionFlushExample">
                        <ul class="list-group list_danh_muc_sp_aside">
                            <li class="list-group-item disabled">
                                <h5>DANH MỤC</h5>
                            </li>
                            <?php foreach($loai_hang as $loai_h) : ?>
                            <li type="button"
                                onclick="window.location='index.php?ma_loai_hang=<?= $loai_h['ma_loai_hang'] ?>'"
                                class="list-group-item"><?= $loai_h['ten_loai_hang'] ?></li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                    <div class="wrap_list_gruop_aside">
                        <ul class="list-group list_danh_muc_sp_aside">
                            <li class="list-group-item disabled">
                                <h5>TOP SẢN PHẨM</h5>
                            </li>
                            <li class="list-group-item">Giày Dép</li>
                            <li class="list-group-item">Quần Áo</li>
                            <li class="list-group-item">Điện Thoại</li>
                            <li class="list-group-item">Laptop</li>
                            <li class="list-group-item">Loa</li>
                        </ul>
                    </div>
                </aside>
            </section>
            <section class="wrap_aside_product row">
                <aside class="aside_ribon aside_ribon2 col-lg-3">
                    <div class="accordion" id="accordionFlushExample">
                        <ul class="list-group list_danh_muc_sp_aside">
                            <li class="list-group-item disabled">
                                <h5>DANH MỤC</h5>
                            </li>
                            <?php foreach($loai_hang as $loai_h) : ?>
                            <li type="button"
                                onclick="window.location='index.php?ma_loai_hang=<?= $loai_h['ma_loai_hang'] ?>'"
                                class="list-group-item"><?= $loai_h['ten_loai_hang'] ?></li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                    <div class="wrap_list_gruop_aside">
                        <ul class="list-group list_danh_muc_sp_aside">
                            <li class="list-group-item disabled">
                                <h5>TOP 5 SẢN PHẨM</h5>
                            </li>
                            <li class="list-group-item">Sản Phẩm Mới Nhất</li>
                            <li onclick="window.location='top-san-pham/san_pham_nhieu_comment_nhat.php'" class="list-group-item">Sản Phẩm Được Nhiều Người Đánh Giá Nhất</li>
                            <li class="list-group-item">Top Sản Phẩm Đắt Nhất</li>
                            <li class="list-group-item">Sản Phẩm Rẻ Nhất</li>
                        </ul>
                    </div>
                </aside>
                <section class="list_product col-lg-9">
                    <div class="title_list_product">
                        <h4 class="mt-2 ms-3">TẤT CẢ SẢN PHẨM</h4>
                    </div>
                    <div class="container_list_product">
                        <?php foreach($hang_hoa as $hang_h) : ?>
                        <article class="product">
                            <img class="img_product img-fluid" src="../images/<?= $hang_h['anh'] ?>" alt="">
                            <h5 type="button" class="name_product mt-2"><?= substr($hang_h['ten_hang_hoa'],0,17) ?></h5>
                            <span
                                class="price_product text-danger"><?= number_format($hang_h['gia_da_giam']) ?>đ</span><br>
                            <a href="./chi-tiet-san-pham?id_hh=<?= $hang_h['ma_hang_hoa'] ?>"
                                class="btn btn-primary buy_now_product">XEM CHI TIẾT</a>
                        </article>
                        <?php endforeach ?>
                    </div>
                </section>
            </section>
            <section class="order_page row col-lg-12">
                <?php require_once "page.php" ?>
            </section>
        </section>
    </main>
    <?php require_once "footer.php" ?>
</body>

</html>