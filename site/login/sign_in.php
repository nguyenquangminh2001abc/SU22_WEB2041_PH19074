
<?php
require_once '../../dao/pdo.php';
$conn = pdo_get_connection() ;


if(isset($_POST['bt_submit']))
{
    $error = [];
    $ho_ten = trim($_POST['ho_ten']);
    $email = $_POST['email'];
    $mat_khau = $_POST['pass_word'];
    $vai_tro = 0 ;
    $user_name = $_POST['user_name'];
    $file = $_FILES['file'];
    $productImgName = $file['name'];
    $productImgSize = $file['size'];
    $div_file = "../../images/";
    
    $sql_select = "SELECT * FROM khach_hang";
    $khach_hang = pdo_query($sql_select);
        foreach($khach_hang as $khach_hang)
        {
            if($khach_hang['user_name'] == $user_name)
            {
                $error['user_name'] = "user name đã tồn tại !";
            }
            ;
            if($khach_hang['email'] == $email)
            {
                $error['email'] = "email đã tồn tại";
            };
        };

    if($ho_ten == ''){
        $error['ho_ten'] = "Bạn chưa nhập họ tên hoặc nhập đúng số ký tự";
    }
    if($ho_ten == ''){
        $error['user_name'] = "Bạn chưa nhập username hoặc nhập đúng số ký tự";
    }
    if($email == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error['email'] = "Bạn chưa nhập email hoặc nhập không đúng định dạng";
    }
    if($mat_khau == ""){
        $error['password'] = "Bạn chưa nhập password hoặc nhập đúng số ký tự";
    }
    if ($productImgName == '' || $productImgSize == 0) {
        $error['img'] = "Bạn chưa tải ảnh lên ";
    }
    if(empty($error)){
        move_uploaded_file($file['tmp_name'], $div_file . $productImgName);
        $sql = "INSERT INTO khach_hang (anh,ho_ten,user_name,email,mat_khau,vai_tro) VALUES ('$productImgName','$ho_ten','$user_name','$email','$mat_khau','$vai_tro')";
        $conn->exec($sql);
        header('location: ./index.php?mesage=bạn đã đăng ký tài khoản thành công!');
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
        <form action="" class="col-5 mt-3 mb-3 m-auto border border-secondary rounded p-4" enctype="multipart/form-data" method="post">
            <article class="text-center"><i class="fa fa-user"></i>
                <span>ĐĂNG KÝ TÀI KHOẢN</span>
            </article>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" name="ho_ten" id="exampleFormControlInput1" placeholder="Họ Tên">
                <span style="color:red;"><?=isset($error['ho_ten'])? $error['ho_ten'] :''?></span><br>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User Name</label>
                <input type="text" class="form-control" name="user_name" id="exampleFormControlInput1" placeholder="user đăng nhập">
                <span style="color:red;"><?=isset($error['user_name'])? $error['user_name'] :''?></span><br>
            </div>
            <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?=isset($error['img'])? $error['img'] :''?></span><br>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
                <span style="color:red;"><?=isset($error['email'])? $error['email'] :''?></span><br>
            </div>
            <div class="mb-3">


                <label for="exampleFormControlTextarea1" class="form-label">Pass word</label>
                <input type="password" name="pass_word" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Pass word">
                <span style="color:red;"><?=isset($error['password'])? $error['password'] :''?></span><br>
                <button type="submit" name='bt_submit' class="btn btn-outline-danger col-12 mt-3 m-auto">Tạo Tài Khoản</button>
                <h4 class="mt-3 text-center text-dark">Hoặc</h4>
                <a href="index.php"  class="btn btn-outline-success col-12 mt-4 m-auto">Đăng Nhập</a>

            </div>
        </form>
    </main>
    <?php require_once "./footer.php" ?>
</body>

</html>