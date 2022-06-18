<?php
require_once '../dao/pdo.php';
$conn = pdo_get_connection() ;

session_start();
$u = $_SESSION['user_name'];
$sql = "SELECT * FROM khach_hang WHERE user_name = '$u' ";

$khach_hang = pdo_query_one($sql);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
 $ho_ten = $_POST['ho_ten'];
 $user_name = $_POST['user_name'];
 $email = $_POST['email'];
 $mat_khau = $_POST['mat_khau'];
 $anh = $_POST['anh'];
 $ma_khach_hang = $_POST['ma_khach_hang'];
 $file = $_FILES['file'];
 $productImgName = $file['name'];
 $productImgSize = $file['size'];
 $div_file = "../../images/";

 $sql = "select * from khach_hang";
 $khach_hang_s = pdo_query($sql);

 for($i=0 ; $i < sizeof($khach_hang_s) ; $i++)
 {

       if($khach_hang_s[$i]['ma_khach_hang'] == $ma_khach_hang)
       {
           continue;
       };
       if($khach_hang_s[$i]['user_name'] == $user_name)
       {
       $errors['user_name'] = "Tên user đã tồn tại";
       } ;

       if($khach_hang_s[$i]['email'] == $email)
       {
       $errors['email'] = "email đã tồn tại";
       } ;
  };

 if ($ho_ten == '') {
     $errors['ho_ten'] = "Bạn chưa nhập tên khách hàng";
 }
 if ($user_name == '') {
     $errors['user_name'] = "Bạn chưa nhập user name";
 }
 if ($email == '') {
   $errors['email'] = "Bạn chưa nhập email";
 }
 if ($mat_khau == '') {
     $errors['mat_khau'] = "Bạn chưa nhập mật khẩu";
 }
 if ($productImgSize > 0) {
   move_uploaded_file($file['tmp_name'], $div_file . $productImgName);
   $anh = $productImgName ;
 }
 if (empty($errors)) {
     $conn = pdo_get_connection();
     $sql = "UPDATE khach_hang SET ho_ten = '$ho_ten' , user_name = '$user_name' , email = '$email' , mat_khau = '$mat_khau' WHERE ma_khach_hang = $ma_khach_hang ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     header('location:thong_tin_tai_khoan.php?mesage=Bạn đã sửa dữ liệu thành công');
     die;
 }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once "./head.php" ?>

</head>

<body>
    <?php require_once "./header.php" ?>
    <main>
    <article class="mt-3 text-center">
        <?php if(isset($_GET['mesage'])) :?>
        <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
        <?php endif ?>
    </article>
    <section class="col-4 card p-4 mb-3 m-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <h5 class="text-center mb-4 text-danger ">Cập Nhập Thông Tin Tài Khoản</h5>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">HỌ TÊN</label>
                    <input style="margin-bottom : 10px;" type="text" name="ho_ten" class="form-control"
                        id="exampleInputPassword1" value="<?=  $khach_hang['ho_ten'] ?>">
                    <span style="color:red;"><?= isset($errors['ho_ten']) ? $errors['ho_ten'] : '' ?></span><br>
                    <input style="margin-bottom : 10px;" type="text" name="ma_khach_hang" class="form-control"
                        id="exampleInputPassword1" value="<?=  $khach_hang['ma_khach_hang'] ?>" hidden>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Hiện Tại</label>
                    <img width="70" src="../images/<?= $khach_hang['anh'] ?>"><br>
                    <input style="margin-bottom : 10px;" type="text" name="anh" hidden class="form-control"
                        id="exampleInputPassword1" value="<?=  $khach_hang['anh'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Thay Thế</label>
                    <input style="margin-bottom : 10px;" type="file" name="file" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['img']) ? $errors['img'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">User name</label>
                    <input style="margin-bottom : 10px;" value="<?=  $khach_hang['user_name'] ?>" type="text"
                        name="user_name" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['user_name']) ? $errors['user_name'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input style="margin-bottom : 10px;" value="<?=  $khach_hang['email'] ?>" type="text" name="email"
                        class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['email']) ? $errors['email'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                    <input style="margin-bottom : 10px;" value="<?=  $khach_hang['mat_khau'] ?>" type="text"
                        name="mat_khau" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></span><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <?php require_once "./footer.php" ?>
</body>

</html>