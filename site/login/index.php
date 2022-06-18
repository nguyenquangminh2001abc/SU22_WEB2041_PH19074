<?php
require_once '../../dao/pdo.php';
$conn = pdo_get_connection() ;

session_start();
    if(isset($_SESSION['user_name_user']) || isset($_SESSION['user_name']))
    {
        header("location: ../index.php");
        die;
    };
    if(isset($_POST['bt_submit'])){
        $error = [];
        $user_name = $_POST['user_name'];
        $mat_khau = $_POST['mat_khau'];
        $sql = "SELECT * FROM khach_hang WHERE user_name = '$user_name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetch((PDO:: FETCH_ASSOC));
        if(!empty($users)){
            
            if($mat_khau == $users['mat_khau']){
                if($users['vai_tro']==1)
                {
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_name_user'] = $user_name;
                    header("location: ../index.php");
                    die;
                }
                else{
                $_SESSION['user_name_user'] = $user_name;
                header("location: ../index.php");
                die;
            }
            }
            else{
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
        <form action="" class="col-5 mt-3 mb-3 m-auto border border-secondary rounded p-4" method="post">
            <article class="text-center"><i class="fa fa-user"></i>
                <span>ĐĂNG NHẬP</span>
            </article>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User name</label>
                <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="user đăng nhập">
                <span style="color:red;"><?=isset($error['tai_khoan'])? $error['tai_khoan'] :''?></span><br>
            </div>
            <div class="mb-3">


                <label for="exampleFormControlTextarea1" class="form-label">Pass word</label>
                <input type="text" name="mat_khau" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Pass word">
                <span style="color:red;"><?=isset($error['mat_khau'])? $error['mat_khau'] :''?></span><br>
                <a href="quen_mat_khau.php" class="mt-3 mb-3">quên mật khẩu ?</a>
                <button type="submit" name="bt_submit" class="btn btn-outline-success col-12 mt-4 m-auto">Đăng Nhập</button>
                <h4 class="mt-3 text-center text-dark">Hoặc</h4>
                <a href="sign_in.php" class="btn btn-outline-danger col-12 mt-3 m-auto">Tạo Tài Khoản</a>
            </div>
        </form>
    </main>
    <?php require_once "./footer.php" ?>
</body>

</html>