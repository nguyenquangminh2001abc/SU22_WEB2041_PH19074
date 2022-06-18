<?php
require_once '../../dao/pdo.php';
$conn = pdo_get_connection() ;
session_start();


$arr_hang_hoa_gio_hang = [];
if(!empty($_SESSION['gio_hang']))
{
    $arr_hang_hoa_gio_hang = $_SESSION['gio_hang'];
}
else {
$arr_hang_hoa_gio_hang = [];
};
// thêm hàng hóa vào session .

if(isset($_GET['id'])){
$arr_hang_hoa_gio_hang[] = $_GET['id'];

$_SESSION['gio_hang'] = $arr_hang_hoa_gio_hang;

header("location: ../chi-tiet-san-pham/index.php?id_hh=$_GET[id]&mesage=thêm vào giỏ hàng thành công! ");
die;



}

$khach_hang;
if(isset($_SESSION['user_name_user']))
{
$user_n = $_SESSION['user_name_user'];
    $sql_kh = "SELECT * FROM khach_hang WHERE user_name ='$user_n' ";

$khach_hang = pdo_query_one($sql_kh) ;
};

$sql = "SELECT * FROM hang_hoa";

$hang_hoa = pdo_query($sql) ;
 

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
            <h2 class="title_payment mt-2 p-2 bg-secondary text-center text-light">Giỏ Hàng</h2>
            <table class="table table-bordered table-striped  table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Tên Hàng Hóa</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá đã giảm</th>
                        <th scope="col">xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($hang_hoa as $hang_h): ?>
                    <?php for($i = 0 ; $i < sizeof($_SESSION['gio_hang']) ; $i++): ?>
                    <?php if($_SESSION['gio_hang'][$i] == $hang_h['ma_hang_hoa']): ?>
                    <tr>
                        <td><?= $hang_h['ten_hang_hoa'] ?></td>
                        <td><img width="60" src="../../images/<?= $hang_h['anh'] ?>"></td>
                        <td><?= $hang_h['gia_da_giam'] ?></td>
                        <td><a onclick="return confirm('Bạn có chắn chắn muôn xóa không')"
                                style="text-decoration: none ; font-size : 23px ; color:red ; display :flex ;"
                                href="delete_gio_hang.php?key=<?= $i ?>"><i style="margin:auto ; text-decoration: none"
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php endif ?>
                    <?php endfor ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php require_once "footer.php" ?>
</body>

</html>