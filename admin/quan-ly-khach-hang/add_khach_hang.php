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
    $khach_hang_s = pdo_query_one($sql_kh);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $name_khach_hang = $_POST['name_khach_hang'];
      $user_name = $_POST['user_name'];
      $email = $_POST['email'];
      $mat_khau = $_POST['mat_khau'];
      $vai_tro = $_POST['vai_tro'];
      $file = $_FILES['file'];
      $productImgName = $file['name'];
      $productImgSize = $file['size'];
      $div_file = "../../images/";
      
      $sql = "select * from khach_hang";
      $khach_hang = pdo_query($sql);

      for($i=0 ; $i < sizeof($khach_hang) ; $i++)
      {
           if($khach_hang[$i]['user_name'] == $user_name)
           {
            $errors['user_name'] = "Tên user đã tồn tại";
           } ;

           if($khach_hang[$i]['email'] == $email)
           {
            $errors['email'] = "email đã tồn tại";
           } ;

      };

      if ($name_khach_hang == '') {
          $errors['name_khach_hang'] = "Bạn chưa nhập tên khách hàng";
      }
      if ($user_name == '') {
          $errors['user_name'] = "Bạn chưa nhập user name";
      }
      if ($email == '') {
        $errors['email'] = "Bạn chưa nhập email";
      }
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Bạn nhập email không đúng định dạng";
      }
      if ($mat_khau == '') {
          $errors['mat_khau'] = "Bạn chưa nhập mật khẩu";
      }
      if ($vai_tro == '') {
          $errors['vai_tro'] = "Bạn chưa nhập vai trò";
      }
      if (!($vai_tro == 0 || $vai_tro == 1)) {
      $errors['vai_tro'] = "Vui lòng Nhập Đúng Vai Trò : 1 là quản trị , 0 là người dùng ";
       }
      if ($productImgName == '' || $productImgSize == 0) {
          $errors['img'] = "Bạn chưa tải ảnh lên ";
      }
      if (empty($errors)) {
          move_uploaded_file($file['tmp_name'], $div_file . $productImgName);
          $sql = "INSERT INTO khach_hang (ho_ten,user_name,email,anh,mat_khau,vai_tro)
              VALUES('$name_khach_hang','$user_name','$email','$productImgName','$mat_khau','$vai_tro')";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          header('location:add_khach_hang.php?mesage=Bạn đã thêm dữ liệu thành công');
          die;
      }
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php" ?>
</head>

<body>
    <header>
        <?php require_once "user.php" ?>
        <?php require_once "menu.php" ?>
    </header>
    <main class="main">
        <section>
            <article>
                <h5>ADMIN QUẢN LÝ KHÁCH HÀNG</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" class="btn btn-primary btn-sm">+Add khách Hàng</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-success btn-sm">Danh
                    Sách</button>
            </article>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên Khách Hàng</label>
                    <input style="margin-bottom : 10px;" type="text" name="name_khach_hang" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['name_khach_hang']) ? $errors['name_khach_hang'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">User đăng nhập</label>
                    <input style="margin-bottom : 10px;" type="text" name="user_name" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['user_name']) ? $errors['user_name'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input style="margin-bottom : 10px;" type="text" name="email" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['email']) ? $errors['email'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input style="margin-bottom : 10px;" type="file" name="file" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['img']) ? $errors['img'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                    <input style="margin-bottom : 10px;" type="text" name="mat_khau" class="form-control"
                        id="exampleInputPassword1">
                    <span
                        style="color:red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Vai Trò</label>
                    <input style="margin-bottom : 10px;" type="number" name="vai_tro" class="form-control"
                        id="exampleInputPassword1">
                    <span
                        style="color:red;"><?= isset($errors['vai_tro']) ? $errors['vai_tro'] : '' ?></span><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>

</html>