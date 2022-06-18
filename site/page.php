<nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
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