<?php 
    require_once("../../dao/pdo.php");
    $conn = pdo_get_connection();
    
    $loai_hang;
    $id;
    $id2 = $_GET['id2'] ;
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $sql = "SELECT * FROM binh_luan WHERE ma_binh_luan = $id ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $binh_luan = $stmt->fetch(PDO::FETCH_ASSOC);

    };


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $ma_binh_luan = $_POST['ma_binh_luan'];
      $noi_dung = $_POST['noi_dung'];
      if ($noi_dung == '') {
          $errors['noi_dung'] = "Bạn chưa nhập Nội Dung";
      }
      if (empty($errors)) {
          $conn = pdo_get_connection();
          $sql = "UPDATE binh_luan SET noi_dung = '$noi_dung' WHERE ma_binh_luan = $ma_binh_luan ";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          header("location:chi_tiet_binh_luan.php?mesage=Bạn đã sửa dữ liệu thành công&id2=$id2");
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
                <h5>ADMIN QUẢN LÝ BÌNH LUẬN</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-success btn-sm">Danh
                    Sách</button>
            </article>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nội Dung</label>
                    <input style="margin-bottom : 10px;" type="text" name="noi_dung" class="form-control"
                        id="exampleInputPassword1" value="<?=  $binh_luan['noi_dung'] ?>">
                    <span style="color:red;"><?= isset($errors['noi_dung']) ? $errors['noi_dung'] : '' ?></span><br>
                    <input style="margin-bottom : 10px;" type="text" hidden name="ma_binh_luan" class="form-control"
                        id="exampleInputPassword1" value="<?=  $binh_luan['ma_binh_luan'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>

</html>