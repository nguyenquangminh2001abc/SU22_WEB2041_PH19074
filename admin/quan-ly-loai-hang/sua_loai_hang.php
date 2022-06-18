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
    $khach_hang = pdo_query_one($sql_kh);
    
    $loai_hang;
    $id;
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $sql = "SELECT * FROM loai_hang WHERE ma_loai_hang = $id ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $loai_hang = $stmt->fetch(PDO::FETCH_ASSOC);

    };


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id_loai_hang = $_POST['id_loai_hang'];
      $ten_loai_hang = $_POST['ten_loai_hang'];
      if ($ten_loai_hang == '') {
          $errors['name'] = "Bạn chưa nhập tên Loại Hàng";
      }
      if (empty($errors)) {
          $conn = pdo_get_connection();
          $sql = "UPDATE loai_hang SET ten_loai_hang = '$ten_loai_hang' WHERE ma_loai_hang = $id_loai_hang ";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          header('location:index.php?mesage=Bạn đã sửa dữ liệu thành công');
          die;
      }
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php" ?>
    <title>Sửa loại hàng</title>
</head>

<body>
    <header>
        <?php require_once "user.php" ?>
        <?php require_once "menu.php" ?>
    </header>
    <main class="main">
        <section>
            <article>
                <h5>ADMIN QUẢN LÝ LOẠI HÀNG</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='add_product.php'" class="btn btn-primary btn-sm">+Add
                    Loại Hàng</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-success btn-sm">Danh
                    Sách</button>
            </article>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên Loại Hàng</label>
                    <input style="margin-bottom : 10px;" type="text" name="ten_loai_hang" class="form-control"
                        id="exampleInputPassword1" value="<?=  $loai_hang['ten_loai_hang'] ?>">
                    <span style="color:red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span><br>
                    <input style="margin-bottom : 10px;" type="text" hidden name="id_loai_hang" class="form-control"
                        id="exampleInputPassword1" value="<?=  $loai_hang['ma_loai_hang'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>

</html>