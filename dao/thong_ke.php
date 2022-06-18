<?php 
      require_once "pdo.php";

      function thong_ke_hang_hoa()
      {
          $sql = "SELECT lo.ma_loai_hang , lo.ten_loai_hang , COUNT(*) so_luong , MIN(hh.gia_niem_yet) gia_min , MAX(hh.gia_niem_yet) gia_max , AVG(hh.gia_niem_yet) gia_avg  FROM loai_hang lo JOIN hang_hoa hh ON lo.ma_loai_hang = hh.ma_loai_hang GROUP BY lo.ma_loai_hang , lo.ten_loai_hang ";
          return pdo_query($sql);
      }
      ;

      function thong_ke_binh_luan(){
        $sql = "SELECT hh.ma_hang_hoa , hh.ten_hang_hoa , COUNT(*) so_luong , MIN(bl.thoi_gian) cu_nhat , MAX(bl.thoi_gian) moi_nhat FROM binh_luan bl JOIN hang_hoa hh ON bl.ma_hang_hoa_bl = hh.ma_hang_hoa GROUP BY hh.ma_hang_hoa , hh.ten_hang_hoa ";
        return pdo_query($sql);
      }


?>