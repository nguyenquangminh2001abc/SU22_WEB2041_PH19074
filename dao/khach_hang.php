<?php
//truy vấn ds loai đã nhập
function loai_selectall(){
    $sql="select * from khach_hang";
    return pdo_query($sql);

}

// thêm mới loại
function loai_insert($ten_loai)
{
    $sql="insert into khach_hang(ten_loai_hang) values('?')";
    pdo_execute($sql,$ten_loai);
}

// xóa loại
function loai_delete($ma_loai)
{
    $sql="delete from loai_hang where ma_loai_hang=?";
    pdo_execute($sql,$ma_loai);
}

// lấy thông tin 1 mã loại

function loai_getinfo($ma_loai)
{
    $sql="select * from loai_hang where ma_loai=?";
   return pdo_query_one($sql,$ma_loai);
}

function loai_update($ma_loai,$ten_loai)
{
    $sql="update loai_hang set ten_loai_hang=? where ma_loai_hang=?";
    pdo_execute($sql,$ten_loai,$ma_loai);
}
?>