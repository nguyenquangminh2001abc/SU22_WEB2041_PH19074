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
    

    $sql = "SELECT MONTH(ngay_dang_ky) thang , YEAR(ngay_dang_ky) nam , COUNT(*) so_luong FROM khach_hang GROUP BY MONTH(ngay_dang_ky) ,YEAR(ngay_dang_ky)";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $khach_hang_s = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
                <h5>ADMIN THỐNG KÊ NGƯỜI DÙNG THEO THÁNG</h5>
            </article>
            <article>
                <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
                <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
                <?php endif ?>
            </article>
            <article>
                <button type="button" onclick=" window.location='bieu_do_nguoi_dung.php'"
                    class="btn btn-primary btn-sm me-2">XEM BIỂU ĐỒ</button>
                <button type="button" onclick=" window.location='thong_ke_nguoi_dung.php'" class="btn btn-success btn-sm me-2">Danh Sách Người Dùng Theo Tháng</button>
                <button type="button" onclick=" window.location='index.php'" class="btn btn-dark btn-sm me-2">MENU THỐNG KÊ</button>
            </article>
        </section>
        <section>
            <h5>Biểu Đồ Số Lượng Người Dùng Theo Tháng</h5>

            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
          
            // Load google charts
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Tháng', 'SỐ LƯỢNG'],
                    <?php 
                    foreach($khach_hang_s as $khach_h){ 
                        echo "['$khach_h[thang]-$khach_h[nam]',$khach_h[so_luong]]," ; } 
                        ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Tỷ Lệ Người Dùng',
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