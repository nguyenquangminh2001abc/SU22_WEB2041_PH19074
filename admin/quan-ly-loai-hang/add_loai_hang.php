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

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $name_loai_hang = $_POST['name_loai_hang'];

      $sql = "select * from loai_hang";
      $loai_hang = pdo_query($sql);

      for($i=0 ; $i < sizeof($loai_hang) ; $i++)
      {
           if($loai_hang[$i]['user_name'] == $name_loai_hang )
           {
            $errors['name'] = "Tên Loại hàng đã tồn tại";
           } ;
      };
      
      if ($name_loai_hang == '') {
          $errors['name'] = "Bạn chưa nhập tên Loại Hàng";
      }
      if (empty($errors)) {
          $sql = "INSERT INTO Loai_hang (ten_loai_hang) VALUES('$name_loai_hang')";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          header('location:add_loai_hang.php?mesage=Bạn đã thêm dữ liệu thành công');
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
    <title>Thêm Loại Hàng</title>
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
                <button type="button" class="btn btn-primary btn-sm">+Add Loại Hàng</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-success btn-sm">Danh
                    Sách</button>
            </article>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên Loại Hàng</label>
                    <input style="margin-bottom : 10px;" type="text" name="name_loai_hang" class="form-control"
                        id="exampleInputPassword1">
                    <span style="color:red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>

</html>