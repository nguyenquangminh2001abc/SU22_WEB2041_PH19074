<?php 
     require_once("../../dao/pdo.php");
     require_once("../../dao/thong_ke.php");
     $conn = pdo_get_connection();
    
     session_start();
     if(!isset($_SESSION['user_name']))
     {
         header("location: ../index.php");
         die ;
     };
    $sql_kh = "SELECT * FROM khach_hang Where user_name = '$_SESSION[user_name]'";
    $khach_hang = pdo_query_one($sql_kh);

     $sql = "SELECT hh.ma_hang_hoa , hh.ten_hang_hoa , COUNT(*) so_luong , MIN(bl.thoi_gian) cu_nhat , MAX(bl.thoi_gian) moi_nhat FROM binh_luan bl JOIN hang_hoa hh ON bl.ma_hang_hoa_bl = hh.ma_hang_hoa GROUP BY hh.ma_hang_hoa , hh.ten_hang_hoa HAVING so_luong > 0";

     $stmt = $conn->prepare($sql);
     $stmt->execute();
 
     $binh_luan = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./header.php"  ?>
</head>

<body>
    <header>
        <?php require_once "./user.php" ?>
        <?php require_once "./menu.php" ?>
    </header>
    <main class="main">
        <section>
            <article>
                <h5>ADMIN THỐNG KÊ HÀNG HÓA THEO TỪNG LOẠI</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='bieu_do_binh_luan.php'"
                    class="btn btn-primary btn-sm me-2">XEM BIỂU ĐỒ</button>
                <button type="button" onclick=" window.location='thong_ke_binh_luan.php'" class="btn btn-success btn-sm me-2">Danh Sách Bình Luận Theo Hàng Hóa</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-dark btn-sm me-2">MENU THỐNG KÊ</button>
            </article>
        </section>
        <section>
            <h5>Biểu Đồ Số Lượng Bình Luận Trên Hàng Hóa</h5>

            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
          
            // Load google charts
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Tên Hàng Hóa', 'Số Lượng'],
                    <?php 
                    foreach($binh_luan as $loai_h){ 
                        echo "['$loai_h[ten_hang_hoa]',$loai_h[so_luong]]," ; } 
                        ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Tỷ Lệ Bình Luận',
                    'width': 550,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
            </script>
        </section>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>