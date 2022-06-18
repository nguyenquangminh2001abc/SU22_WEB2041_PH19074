<section>
    <article>
        <h5>ADMIN QUẢN LÝ LOẠI HÀNG</h5>
    </article>
    <article class="mt-3">
        <?php if(isset($_GET['mesage']) && empty($errors) ) :?>
        <h5 style="color: red;"><?= $_GET['mesage'] ?></h5>
        <?php endif ?>
    </article>
    <article>
        <button type="button" onclick=" window.location='add_loai_hang.php'" class="btn btn-primary btn-sm">+Add
            Loại Hàng</button>
        <button type="button" class="btn btn-success btn-sm">Danh Sách</button>
    </article>
</section>
<section>
    <table class="table table-bordered table-striped align-middle table-responsive">
        <thead>
            <tr>
                <th scope="col">Mã Loại Hàng</th>
                <th scope="col">Tên Loại Hàng</th>
                <th scope="col">Sửa</th>
                <th scope="col">xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($loai_hang as $loai_h): ?>
            <tr>
                <th scope="row"><?= $loai_h['ma_loai_hang'] ?></th>
                <td><?= $loai_h['ten_loai_hang'] ?></td>
                <td><a style="font-size : 23px ; display :flex ; text-decoration: none ;"
                        href="sua_loai_hang.php?id=<?= $loai_h['ma_loai_hang'] ?>"><i
                            style="margin:auto ; text-decoration: none" class="fa fa-pencil"></i></a></td>
                <td><a onclick="return confirm('Bạn có chắn chắn muôn xóa không')"
                        style="text-decoration: none ; font-size : 23px ; color:red ; display :flex ;"
                        href="xoa_loai_hang.php?id=<?= $loai_h['ma_loai_hang'] ?>"><i
                            style="margin:auto ; text-decoration: none" class="fa fa-trash"></i></a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
</section>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <?php if($curent_page>1): ?>
            <a class="page-link" href="index.php?curent_page=<?php echo $curent_page-1?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            <?php else : ?>
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            <?php endif ?>
        </li>
        <?php for($i=1 ; $i <= $total_page ; $i++) : ?>
        <li
            <?php if($i == $curent_page) : echo 'class="page-item active"' ; else : echo 'class="page-item"' ; endif  ?>>
            <a class="page-link" href="index.php?curent_page=<?=$i?>"><?= $i ?></a>
        </li>
        <?php endfor ?>
        <li class="page-item">
            <?php if($curent_page <$total_page): ?>
            <a class="page-link" href="index.php?curent_page=<?php echo $curent_page+1 ?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            <?php else : ?>
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            <?php endif ?>
        </li>
    </ul>
</nav>
</section>