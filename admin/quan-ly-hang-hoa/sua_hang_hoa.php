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
    
    $hang_hoa;
    $id;
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $sql = "SELECT * FROM hang_hoa WHERE ma_hang_hoa = $id ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $hang_hoa = $stmt->fetch(PDO::FETCH_ASSOC);

    };

     $sql = "SELECT * FROM loai_hang ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $loai_hang = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $productName = $_POST['name_hang_hoa'];
      $gia_niem_yet = $_POST['gia_niem_yet'];
      $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
      $ma_loai_hang = $_POST['ma_loai_hang'];
      $mo_ta = $_POST['mo_ta'];
      $anh = $_POST['anh'];
      $id_hang_hoa = $_POST['id_hang_hoa'];
      $ngay_nhap = $_POST['ngay_nhap'];
      $trang_thai = $_POST['trang_thai'];
      $file = $_FILES['file'];
      $productImgName = $file['name'];
      $productImgSize = $file['size'];
      $div_file = "../../images/";
      if ($productName == '') {
          $errors['name'] = "Bạn chưa nhập tên hàng hóa";
      }
      if ($gia_niem_yet == '') {
          $errors['gia_niem_yet'] = "Bạn chưa nhập giá niêm yết";
      }
      if ($gia_khuyen_mai == '') {
        $errors['gia_khuyen_mai'] = "Bạn chưa nhập giá khuyến mại";
      }
      if ($ma_loai_hang == '') {
          $errors['ma_loai_hang'] = "Bạn chưa nhập mã loại hàng";
      }
      if ($mo_ta == '') {
          $errors['mo_ta'] = "Bạn chưa nhập mô tả ";
      }
      if ($ngay_nhap == '') {
        $errors['ngay_nhap'] = "Bạn chưa nhập ngày nhập ";
       }
      if ($trang_thai == '') {
      $errors['trang_thai'] = "Bạn chưa nhập trạng thái ";
       }
      if ($productImgSize > 0) {
        move_uploaded_file($file['tmp_name'], $div_file . $productImgName);
        $anh = $productImgName ;
      }
      if (empty($errors)) {
          $conn = pdo_get_connection();
          $sql = "UPDATE hang_hoa SET anh = '$anh' , gia_da_giam = '$gia_khuyen_mai' , gia_niem_yet = '$gia_niem_yet' , ma_loai_hang = '$ma_loai_hang',mo_ta = '$mo_ta',ngay_nhap = '$ngay_nhap',ten_hang_hoa = '$productName',trang_thai='$trang_thai' WHERE ma_hang_hoa = $id_hang_hoa ";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="add_product.css">
    <title>Thêm Sản Phẩm</title>
</head>

<body>
    <header>
        <?php require_once "user.php" ?>
        <?php require_once "menu.php" ?>
    </header>
    <main class="main">
        <section>
        <article>
        <h5>ADMIN QUẢN LÝ HÀNG HÓA</h5>
    </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='add_product.php'" class="btn btn-primary btn-sm">+Add
                    Hàng Hóa</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-success btn-sm">Danh
                    Sách</button>
            </article>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên Hàng Hóa</label>
                    <input style="margin-bottom : 10px;" type="text" name="name_hang_hoa" class="form-control"
                        id="exampleInputPassword1" value="<?=  $hang_hoa['ten_hang_hoa'] ?>"  >
                    <span style="color:red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span><br>
                    <input style="margin-bottom : 10px;" type="text" name="id_hang_hoa" class="form-control"
                        id="exampleInputPassword1" value="<?=  $hang_hoa['ma_hang_hoa'] ?>" hidden  >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Hiện Tại</label>
                    <img width="70" src="../../images/<?= $hang_hoa['anh'] ?>"><br>
                    <input style="margin-bottom : 10px;" type="text" name="anh" hidden class="form-control"
                        id="exampleInputPassword1" value="<?=  $hang_hoa['anh'] ?>"  >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh Thay Thế</label>
                    <input style="margin-bottom : 10px;" type="file" name="file" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['img']) ? $errors['img'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá Niêm yết</label>
                    <input style="margin-bottom : 10px;" value="<?=  $hang_hoa['gia_niem_yet'] ?>" type="text" name="gia_niem_yet" class="form-control"
                        id="exampleInputPassword1">
                    <span
                        style="color:red;"><?= isset($errors['gia_niem_yet']) ? $errors['gia_niem_yet'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá Khuyến Mãi</label>
                    <input style="margin-bottom : 10px;" value="<?=  $hang_hoa['gia_da_giam'] ?>" type="text" name="gia_khuyen_mai" class="form-control"
                        id="exampleInputPassword1">
                    <span
                        style="color:red;"><?= isset($errors['gia_khuyen_mai']) ? $errors['gia_khuyen_mai'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Loại Hàng</label>
                    <select style="margin-bottom : 10px;" name="ma_loai_hang" class="form-select">
                        
                        <?php foreach($loai_hang as $loai_h) :  ?>
                        <option <?php if($loai_h['ma_loai_hang'] == $id ) : echo "selected" ; endif ?> value="<?= $loai_h['ma_loai_hang'] ?>"><?= $loai_h["ten_loai_hang"] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span
                        style="color:red;"><?= isset($errors['ma_loai_hang']) ? $errors['ma_loai_hang'] : '' ?></span><br>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô Tả</label>
                    <input style="margin-bottom : 10px;" value="<?=  $hang_hoa['mo_ta'] ?>" type="text" name="mo_ta" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['mo_ta']) ? $errors['mo_ta'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Trạng Thái</label>
                    <input style="margin-bottom : 10px;" type="text" value="<?=  $hang_hoa['trang_thai'] ?>" name="trang_thai" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['trang_thai']) ? $errors['trang_thai'] : '' ?></span><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ngày nhập</label>
                    <input style="margin-bottom : 10px;" type="datetime" value="<?=  $hang_hoa['ngay_nhap'] ?>" name="ngay_nhap" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['ngay_nhap']) ? $errors['ngay_nhap'] : '' ?></span><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>

</html>