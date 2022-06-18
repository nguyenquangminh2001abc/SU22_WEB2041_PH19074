
    <section class="slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../images/banner_ao.png" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../images/banner-giay.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../images/banner-xiaomi.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="containt_product">
        <article class="wrap_sort_product row">
            <section class="sort_product col-lg-3">
                <span>Sắp Xếp:</span>
                <div class="dropdown">
                    <select class="option_sort">
                        <option value="">Giá thấp đến cao</option>
                        <option value="">giá cao đến thấp</option>
                        <option value="">sản phẩm mới nhất</option>
                        <option value="">sản phẩm bán chạy</option>
                        <option value="">còn hàng</option>
                    </select>
                </div>
                <i id="search_sort_product" class="fa fa-search"></i>
                <i id="closer_search_sort" class="fa fa-close"></i>
            </section>
            <section class="price_search_freeship col-lg-7">
                <article class="wrap_input_sort">
                    <span>Từ Khóa</span>
                    <input type="text" placeholder="Nhập từ khóa" class="input_sort">
                </article>
                <article class="chose_price">
                    <span>Khoảng giá</span>
                    <input type="text" class="about_price" value="100000">
                    <span>~</span>
                    <input type="text" class="to_price" value="1000000">
                </article>
                <article class="free_ship">
                    <input type="radio" name="">
                    <span>Free Ship</span>
                </article>
            </section>
            <section class="submit_sort col-md-12 col-lg-2 col-xs-12">
                <a href="#" class="blt_submit_sort btn btn-primary">Search</a>
            </section>

        </article>
        <section class="wrap_price_search_freeship_show">
            <section class="price_search_freeship_show col-lg-7">
                <article class="wrap_input_sort">
                    <span>Từ Khóa</span>
                    <input type="text" placeholder="Nhập từ khóa" class="input_sort">
                </article>
                <article class="chose_price">
                    <span>Khoảng giá</span>
                    <input type="text" class="about_price" value="100000">
                    <span>~</span>
                    <input type="text" class="to_price" value="1000000">
                </article>
                <article class="free_ship">
                    <input type="radio" name="">
                    <span>Free Ship</span>
                </article>
            </section>
            <section class="submit_sort">
                <a href="#" class="blt_submit_sort btn btn-primary">Search</a>
            </section>
        </section>
        <section class="fill_product_show row">
            <div class="fill_product ">
                <span>Lọc Sản Phẩm :</span>
                <i id="filter_product" class="fa fa-filter"></i>
                <i id="closer_fil" class="fa fa-close"></i>
            </div>
            <aside class="aside_ribon aside_ribon1 col-lg-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                SẢN PHẨM CỦA SHOP
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list_danh_muc_sp_aside">
                                    <li class="list-group-item">Giày Dép</li>
                                    <li class="list-group-item">Quần Áo</li>
                                    <li class="list-group-item">Điện Thoại</li>
                                    <li class="list-group-item">Laptop</li>
                                    <li class="list-group-item">Loa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                THƯƠNG HIỆU
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                MENU HOME
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group menu_home_aside">
                                    <li class="list-group-item"><a href="./index.html">HOME</a></li>
                                    <li class="list-group-item"><a href="./blog.html">BLOG</a></li>
                                    <li class="list-group-item"><a href="./san_pham_cua_shop.html">SẢN PHẨM CỦA SHOP</a>
                                    </li>
                                    <li class="list-group-item"><a href="./dat_hang.html">ĐẶT HÀNG</a></li>
                                    <li class="list-group-item"><a href="./lien_he.html">LIÊN HỆ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapsefore" aria-expanded="false"
                                aria-controls="flush-collapsefore">
                                TOP SALES
                            </button>
                        </h2>
                        <div id="flush-collapsefore" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingfore" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"></div>
                        </div>
                    </div>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group">
                        <li class="list-group-item title_list_group">Trạng Thái</li>
                        <li class="list-group-item">
                            <input type="radio" name="status">
                            <span>Còn trong kho</span><br>
                            <input type="radio" name="status">
                            <span>Còn trong cửa hàng</span><br>
                        </li>
                        <li class="list-group-item title_list_group"> Loại Hàng</li>
                        <li class="list-group-item">
                            <input type="checkbox" value="quần áo"> Quần áo<br>
                            <input type="checkbox" value="giày dép"> Giày dép<br>
                            <input type="checkbox" value="Điện thoại"> Điện Thoại<br>
                            <input type="checkbox" value="laptop"> Laptop<br>
                            <input type="checkbox" value="đồng hồ"> Đồng Hồ<br>
                            <input type="checkbox" value="Loa"> Loa<br>
                            <input type="checkbox" value="Tai Nghe"> Tai Nghe<br>
                            <input type="checkbox" value="Tai Nghe"> Box tv<br>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group">
                        <li class="list-group-item title_list_group">Tình Trạng Sản Phẩm</li>
                        <li class="list-group-item">
                            <input type="checkbox" value="mới"> Mới<br>
                            <input type="checkbox" value="đã qua sử dụng"> Đã qua sử dụng<br>
                            <input type="checkbox" value="mới ra mắt "> Mới ra mắt gần đây<br>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group delivery">
                        <li class="list-group-item title_list_group">Giao Hàng</li>
                        <li class="list-group-item lisst">
                            <input type="radio" class="chose_ship" value="nhanh" name="ship">
                            <span class="cap_toc">Cấp tốc 30k</span>
                            <input type="radio" class="chose_ship" value="chậm" name="ship">
                            <span>chậm 15k</span>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group delivery">
                        <a href="" class="btn btn-primary">LỌC</a>
                    </ul>
                </div>
            </aside>
        </section>
        <section class="wrap_aside_product row">
            <aside class="aside_ribon aside_ribon2 col-lg-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                SẢN PHẨM CỦA SHOP
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list_danh_muc_sp_aside">
                                    <li class="list-group-item">Giày Dép</li>
                                    <li class="list-group-item">Quần Áo</li>
                                    <li class="list-group-item">Điện Thoại</li>
                                    <li class="list-group-item">Laptop</li>
                                    <li class="list-group-item">Loa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                THƯƠNG HIỆU
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                MENU HOME
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group menu_home_aside">
                                    <li class="list-group-item"><a href="./index.html">HOME</a></li>
                                    <li class="list-group-item"><a href="./blog.html">BLOG</a></li>
                                    <li class="list-group-item"><a href="./san_pham_cua_shop.html">SẢN PHẨM CỦA SHOP</a>
                                    </li>
                                    <li class="list-group-item"><a href="./dat_hang.html">ĐẶT HÀNG</a></li>
                                    <li class="list-group-item"><a href="./lien_he.html">LIÊN HỆ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapsefore" aria-expanded="false"
                                aria-controls="flush-collapsefore">
                                TOP SALES
                            </button>
                        </h2>
                        <div id="flush-collapsefore" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingfore" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"></div>
                        </div>
                    </div>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group">
                        <li class="list-group-item title_list_group">Trạng Thái</li>
                        <li class="list-group-item">
                            <input type="radio" name="status">
                            <span>Còn trong kho</span><br>
                            <input type="radio" name="status">
                            <span>Còn trong cửa hàng</span><br>
                        </li>
                        <li class="list-group-item title_list_group"> Loại Hàng</li>
                        <li class="list-group-item">
                            <input type="checkbox" value="quần áo"> Quần áo<br>
                            <input type="checkbox" value="giày dép"> Giày dép<br>
                            <input type="checkbox" value="Điện thoại"> Điện Thoại<br>
                            <input type="checkbox" value="laptop"> Laptop<br>
                            <input type="checkbox" value="đồng hồ"> Đồng Hồ<br>
                            <input type="checkbox" value="Loa"> Loa<br>
                            <input type="checkbox" value="Tai Nghe"> Tai Nghe<br>
                            <input type="checkbox" value="Tai Nghe"> Box tv<br>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group">
                        <li class="list-group-item title_list_group">Tình Trạng Sản Phẩm</li>
                        <li class="list-group-item">
                            <input type="checkbox" value="mới"> Mới<br>
                            <input type="checkbox" value="đã qua sử dụng"> Đã qua sử dụng<br>
                            <input type="checkbox" value="mới ra mắt "> Mới ra mắt gần đây<br>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group delivery">
                        <li class="list-group-item title_list_group">Giao Hàng</li>
                        <li class="list-group-item lisst">
                            <input type="radio" class="chose_ship" value="nhanh" name="ship">
                            <span class="cap_toc">Cấp tốc 30k</span>
                            <input type="radio" class="chose_ship" value="chậm" name="ship">
                            <span>chậm 15k</span>
                        </li>
                    </ul>
                </div>
                <div class="wrap_list_gruop_aside">
                    <ul class="list-group delivery">
                        <a href="" class="btn btn-primary">LỌC</a>
                    </ul>
                </div>
            </aside>
            <section class="list_product col-lg-9">
                <div class="title_list_product">
                    <h3>SẢN PHẨM CỦA X-SHOP</h3>
                </div>
                <?php foreach($hang_hoa as $hang_h) : ?>
                <div class="container_list_product">
                    <article class="product">
                        <img class="img_product img-fluid" src="../../images/<?= $hang_h['anh']?>" alt="">
                        <h3 class="name_product"><?= $hang_h['ten_hang_hoa']?></h3>
                        <span class="price_product"><?= $hang_h['gia_da_giam']?></span><br>
                        <a href="#" class="btn btn-primary buy_now_product">Xem Chi Tiết</a>
                    </article>
                </div>
                <?php ?>
            </section>
        </section>
        <section class="order_page row col-lg-12">
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
    </section>
