<?php
   require_once("../dao/pdo.php");
   require_once("../global.php");
   $conn = pdo_get_connection();
    if(isset($_POST['sub'])){
        $error = [];
        $ho_ten = trim($_POST['ho_ten']);
        $email = $_POST['email'];
        $mat_khau = $_POST['mat_khau'];
        $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
        $vai_tro = 1 ;
        $user_name = $_POST['user_name'];
        $file = $_FILES['file'];
        $productImgName = $file['name'];
        $productImgSize = $file['size'];
        $div_file = "images/";

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
        if($user_name == ''){
            $error['user_name'] = "Bạn chưa nhập username hoặc nhập đúng số ký tự";
        }
        if($email == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Bạn chưa nhập email hoặc nhập không đúng định dạng";
        }
        if($mat_khau == ""){
            $error['password'] = "Bạn chưa nhập password hoặc nhập đúng số ký tự";
        }
        if($xac_nhan_mat_khau == ''|| $mat_khau != $xac_nhan_mat_khau){
            $error['confirmPassword'] = "Xác nhận password không trùng với password";
        }
        if ($productImgName == '' || $productImgSize == 0) {
            $error['img'] = "Bạn chưa tải ảnh lên ";
        }
        if(empty($error)){
            move_uploaded_file($file['tmp_name'], $div_file . $productImgName);
            $sql = "INSERT INTO khach_hang (anh,email,user_name,ho_ten,mat_khau,vai_tro) VALUES ('$productImgName','$email','$user_name','$ho_ten','$mat_khau','$vai_tro')";
            $conn->exec($sql);
            header('location: ./index.php?mesage=bạn đã đăng ký tài khoản thành công!');
            die;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./signin.css">
</head>

<body class="container" onresize="BodyWidth()">
    <section class="sign_in">
        <div>
            <h5 id="question-title">Đăng ký tài khoản Admin</h5>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Nhập Họ Tên</label>
                    <input type="text" name="ho_ten" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                    <span style="color:red;"><?=isset($error['ho_ten'])? $error['ho_ten'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">User name</label>
                    <input type="text" name="user_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                    <span style="color:red;"><?=isset($error['user_name'])? $error['user_name'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?=isset($error['img'])? $error['img'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                    <span style="color:red;"><?=isset($error['email'])? $error['email'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">mật Khẩu</label>
                    <input type="password" name="mat_khau" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?=isset($error['password'])? $error['password'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="xac_nhan_mat_khau" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?=isset($error['confirmPassword'])? $error['confirmPassword'] :''?></span><br>
                </div>
                
                <button type="submit" name="sub" class="btn btn-primary w-100">Đăng Ký</button><br>
                <p class="mt-4 mb-0 " style="text-align:center ;" >HOẶC</p><br>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-secondary w-100">Đăng Nhập</button>
                
            </form>
        </div>
    </section>
</body>

</html>