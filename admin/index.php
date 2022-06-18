<?php
    require_once("../dao/pdo.php");
    require_once("../global.php");
    $conn = pdo_get_connection();
    session_start();
    if(isset($_SESSION['user_name']))
    {
        header("location: ./layout.php");
        die;
    };
    if(isset($_POST['sub'])){
        $error = [];
        $user_name = $_POST['user_name'];
        $mat_khau = $_POST['mat_khau'];
        $sql = "SELECT * FROM khach_hang WHERE user_name = '$user_name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetch((PDO:: FETCH_ASSOC));
        if(!empty($users)){
            if($users['vai_tro'] != 1)
            {
                $error['tai_khoan'] = "Tài Khoản này không phải là tài khoản quản trị viên";
            }
            else if($mat_khau == $users['mat_khau']){
                $_SESSION['user_name'] = $user_name;
                header("location: ./layout.php");
                die;
            }else{
                $error['mat_khau'] = "Tên tài khoản hoặc mật khẩu không đúng";
                $error['tai_khoan'] = "Tên tài khoản hoặc mật khẩu không đúng";
            }
        }else{
            $error['tai_khoan'] = "Tên tài khoản hoặc mật khẩu không đúng";
            $error['mat_khau'] = "Tên tài khoản hoặc mật khẩu không đúng";
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
    <article class="mt-3">
        <?php if(isset($_GET['mesage'])) :?>
        <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
        <?php endif ?>
    </article>
        <div>
            <p id="question-title">Đăng nhập tài khoản quản trị</p>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Quản Trị</label>
                    <input type="text" name="user_name" class="form-control" id="exampleInputEmail1">
                    <span style="color:red;"><?=isset($error['tai_khoan'])? $error['tai_khoan'] :''?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">mật Khẩu</label>
                    <input type="password" name="mat_khau" class="form-control" id="exampleInputPassword1">
                    <span style="color:red;"><?=isset($error['mat_khau'])? $error['mat_khau'] :''?></span><br>
                </div>
                <a href="#">Quên mật khẩu?</a><br>
                
                <button type="submit" name="sub" class="btn btn-secondary w-100">Đăng Nhập</button>
                <p class="mt-4 mb-0 " style="text-align:center ;" >HOẶC</p><br>
                <button type="button" onclick=" window.location='signin.php'"  class="btn btn-primary w-100">Đăng Ký</button><br>
            </form>

        </div>
    </section> 
</body>

</html>
